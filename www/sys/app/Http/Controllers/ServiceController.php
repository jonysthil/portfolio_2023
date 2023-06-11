<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\ServiceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use ImageToWebp;
use SplFileInfo;

use Intervention\Image\ImageManagerStatic as Image;
use Tools;

class ServiceController extends Controller {
    
    public function list() {

        $data = array(
            'service' => ServiceModel::serviceAll()
        );

        return view('admin/service/list', $data);

    }

    public function newService() {
        return view('admin/service/new');
    }

    public function saveService(Request $request) {

        $validator = Validator::make($request->all(), [
            'ser_name' => 'required',
            'ser_description' => 'required',
        ],[
            'ser_name.required' => 'Please complete this field',
            'ser_description.required' => 'Please complete this field',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/service/new')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            'ser_name' => $request->get('ser_name'),
            'ser_description' => $request->get('ser_description')
        );

        $ser_id = ServiceModel::serviceSave($data);

        return redirect()->route('service.detail', $ser_id)->with('success', 'New record.');

    }

    public function detailService($ser_id) {
        
        $data = array(
            'service' => ServiceModel::serviceGet($ser_id)
        );

        return view('admin/service/detail', $data);

    }

    public function editService($ser_id) {
        
        $data = array(
            'service' => ServiceModel::serviceGet($ser_id)
        );

        return view('admin/service/edit', $data);

    }

    public function updateService(Request $request, $ser_id) {

        $validator = Validator::make($request->all(), [
            'ser_name' => 'required',
            'ser_description' => 'required',
        ],[
            'ser_name.required' => 'Please complete this field',
            'ser_description.required' => 'Please complete this field',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/service/'.$ser_id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            'ser_name' => $request->get('ser_name'),
            'ser_description' => $request->get('ser_description')
        );

        ServiceModel::serviceUpdate($data, $ser_id);

        return redirect()->route('service.detail', $ser_id)->with('success', 'Modified record.');

    }

    public function deleteService($ser_id) {
        ServiceModel::deleteService($ser_id);


        return redirect()->route('services')->with('error', 'Deleted information');
    }

    public function statusService(Request $request, $ser_id) {

        $active_status = ($request->get('data') == "true") ? 1 : 0;

        $data = array(
            'ser_status' => $active_status
        );

        ServiceModel::serviceUpdate($data, $ser_id);

    }

    public function orderService(Request $request) {

        $data = $request->get("data");
		parse_str($data, $order);
        $item = $order["ord"];
        
		foreach ($item as $ser_order => $ser_id) {
            ServiceModel::orderService($ser_id, $ser_order);
        }
        
        return response()->json($item);
    }

    public function iconService(Request $request, $ser_id) {

        $service = ServiceModel::serviceGet($ser_id);

        $validator = Validator::make($request->all(), [
            'ser_icon' => 'required|mimes:png,jpg|max:2048',
        ],[
            'ser_icon.required' => 'The icon field is required.',
            'ser_icon.mimes' => 'The icon must be a file of type: png, jpg.'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/service/'.$ser_id.'/detail')
                        ->withErrors($validator)
                        ->withInput();
        }

        $ser_icon = Tools::clean_text($service->ser_name) . '_' . uniqid();

        $image = Image::make($request->file('ser_icon'))->encode('webp', 100)->resize(null, 40, function ($constraint) {
            $constraint->aspectRatio();
        });

        $directory = './uploads/service';

        $subir = $image->save($directory . '/' . $ser_icon . '.webp');

        if($subir) {

            @unlink($directory . '/' . $service->ser_icon);

            $data = array('ser_icon' => $ser_icon.'.webp');
            ServiceModel::serviceUpdate($data, $ser_id);
    
            return redirect()->route('service.detail', $ser_id)->with('success', 'You have successfully upload icon.');
        } else {
            return redirect()->route('service.detail', $ser_id)->with('error', 'Deleted information, ' . $_FILES["ser_icon"]["error"]);
        }

    }


}
