<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\EducationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller {
    
    public function list() {

        $data = array(
            'education' => EducationModel::allEducation()
        );

        return view('admin/education/list', $data);

    }

    public function newEducation() {
        return view('admin/education/new');
    }

    public function saveEducation(Request $request) {

        $validator = Validator::make($request->all(), [
            'edu_place' => 'required',
            'edu_title' => 'required'
        ],[
            'edu_place.required' => 'Please complete this field',
            'edu_title.required' => 'Please complete this field'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/education/new')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            'edu_place' => $request->get('edu_place'),
            'edu_title' => $request->get('edu_title'),
            'edu_description' => $request->get('edu_description'),
            'edu_month_start' => $request->get('edu_month_start'),
            'edu_year_start' => $request->get('edu_year_start'),
            'edu_month_finish' => $request->get('edu_month_finish'),
            'edu_year_finish' => $request->get('edu_year_finish'),
            'edu_current' => ($request->get('edu_current') ? 1 : 0)
        );
        
        $edu_id = EducationModel::educationSave($data);

        return redirect()->route('education.detail', $edu_id)->with('success', 'New record.');
    }

    public function detailEducation($edu_id) {
        
        $data = array(
            'education' => EducationModel::educationGet($edu_id)
        );

        return view('admin/education/detail', $data);

    }

    public function editEducation($edu_id) {
        
        $data = array(
            'education' => EducationModel::educationGet($edu_id)
        );

        return view('admin/education/edit', $data);

    }

    public function updateEducation(Request $request, $edu_id) {

        $validator = Validator::make($request->all(), [
            'edu_place' => 'required',
            'edu_title' => 'required'
        ],[
            'edu_title.place' => 'Please complete this field',
            'edu_title.required' => 'Please complete this field'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/education/'.$edu_id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            'edu_place' => $request->get('edu_place'),
            'edu_title' => $request->get('edu_title'),
            'edu_description' => $request->get('edu_description'),
            'edu_month_start' => $request->get('edu_month_start'),
            'edu_year_start' => $request->get('edu_year_start'),
            'edu_month_finish' => $request->get('edu_month_finish'),
            'edu_year_finish' => $request->get('edu_year_finish'),
            'edu_current' => ($request->get('edu_current') ? 1 : 0)
        );

        EducationModel::educationUpdate($data, $edu_id);

        return redirect()->route('education.detail', $edu_id)->with('success', 'Modified record.');

    }

    public function deleteEducation($edu_id) {

        EducationModel::deleteEducation($edu_id);


        return redirect()->route('educations')->with('error', 'Deleted information');
    }

    public function statusEducation(Request $request, $edu_id) {

        $active_status = ($request->get('data') == "true") ? 1 : 0;

        $data = array(
            'edu_status' => $active_status
        );

        EducationModel::educationUpdate($data, $edu_id);

    }

    public function orderEducation(Request $request) {

        $data = $request->get("data");
		parse_str($data, $order);
        $item = $order["ord"];
        
		foreach ($item as $edu_order => $edu_id) {
            EducationModel::orderEducation($edu_id, $edu_order);
        }
        
        return response()->json($item);
    }

}
