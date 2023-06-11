<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\ExperienceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller {
    
    public function list() {

        $data = array(
            'experience' => ExperienceModel::allExperience()
        );

        return view('admin/experience/list', $data);

    }

    public function newExperience() {
        return view('admin/experience/new');
    }

    public function saveExperience(Request $request) {

        $validator = Validator::make($request->all(), [
            'exp_title' => 'required',
            'exp_description' => 'required'
        ],[
            'exp_title.required' => 'Por favor completa este campo',
            'exp_description.required' => 'Por favor completa este campo'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/experience/new')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            'exp_title' => $request->get('exp_title'),
            'exp_description' => $request->get('exp_description'),
            'exp_month_start' => $request->get('exp_month_start'),
            'exp_year_start' => $request->get('exp_year_start'),
            'exp_month_finish' => $request->get('exp_month_finish'),
            'exp_year_finish' => $request->get('exp_year_finish'),
            'exp_current' => ($request->get('exp_current') ? 1 : 0)
        );
        
        $exp_id = ExperienceModel::experienceSave($data);

        return redirect()->route('experience.detail', $exp_id)->with('success', 'New record.');
    }

    public function detailExperience($exp_id) {
        
        $data = array(
            'experience' => ExperienceModel::experienceGet($exp_id)
        );

        return view('admin/experience/detail', $data);

    }

    public function editExperience($exp_id) {
        
        $data = array(
            'experience' => ExperienceModel::experienceGet($exp_id)
        );

        return view('admin/experience/edit', $data);

    }

    public function updateExperience(Request $request, $exp_id) {

        $validator = Validator::make($request->all(), [
            'exp_title' => 'required',
            'exp_description' => 'required'
        ],[
            'exp_title.required' => 'Por favor completa este campo',
            'exp_description.required' => 'Por favor completa este campo'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/experience/'.$exp_id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            'exp_title' => $request->get('exp_title'),
            'exp_description' => $request->get('exp_description'),
            'exp_month_start' => $request->get('exp_month_start'),
            'exp_year_start' => $request->get('exp_year_start'),
            'exp_month_finish' => $request->get('exp_month_finish'),
            'exp_year_finish' => $request->get('exp_year_finish'),
            'exp_current' => ($request->get('exp_current') ? 1 : 0)
        );

        ExperienceModel::experienceUpdate($data, $exp_id);

        return redirect()->route('experience.detail', $exp_id)->with('success', 'Modified record.');

    }

    public function deleteExperience($exp_id) {

        ExperienceModel::deleteExperience($exp_id);


        return redirect()->route('experiences')->with('error', 'Deleted information');
    }

    public function statusExperience(Request $request, $exp_id) {

        $active_status = ($request->get('data') == "true") ? 1 : 0;

        $data = array(
            'exp_status' => $active_status
        );

        ExperienceModel::experienceUpdate($data, $exp_id);

    }

    public function orderExperience(Request $request) {

        $data = $request->get("data");
		parse_str($data, $order);
        $item = $order["ord"];
        
		foreach ($item as $exp_order => $exp_id) {
            ExperienceModel::orderExperience($exp_id, $exp_order);
        }
        
        return response()->json($item);
    }

}
