<?php

namespace App\Http\Controllers;

use App\Models\SkillModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\ImageManagerStatic as Image;
use Tools;

class SkillController extends Controller {
    
    public function list() {

        $data = array(
            'skills' => SkillModel::skillAll()
        );

        return view('admin/skill/list', $data);
    }

    public function saveSkill(Request $request) {

        $validator = Validator::make($request->all(), [
            'sk_title' => 'required',
            'sk_image' => 'required|mimes:png,jpg|max:2048',
        ],[
            'sk_title.required' => 'The title field is required.',
            'sk_image.required' => 'The image field is required.',
            'sk_image.mimes' => 'The image must be a file of type: png, jpg.'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('skills')
                        ->withErrors($validator)
                        ->withInput();
        }

        $sk_image = Tools::clean_text($request->get('sk_title')) . '_' . uniqid();

        $image = Image::make($request->file('sk_image'))
                        ->encode('webp', 100)
                        ->resize(209, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $directory = './uploads/skill';

        $subir = $image->save($directory . '/' . $sk_image . '.webp');

        if($subir) {

            $data = array(
                'sk_title' => $request->get('sk_title'),
                'sk_image' => $sk_image.'.webp'
            );
            SkillModel::skillSave($data);
    
            return redirect()->route('skills')->with('success', 'You have successfully upload icon.');
        } else {
            return redirect()->route('skills')->with('error', 'Deleted information, ' . $_FILES["sk_image"]["error"]);
        }

    }

    public function deleteSkill($sk_id) {

        $skill = SkillModel::skillGet($sk_id);

        $directory = './uploads/skill';

        @unlink($directory . '/' . $skill->sk_image);

        SkillModel::skillDelete($sk_id);

        return redirect()->route('skills')->with('error', 'Deleted information');
    }

    public function statusSkill(Request $request, $sk_id) {

        $active_status = ($request->get('data') == "true") ? 1 : 0;

        $data = array(
            'sk_status' => $active_status
        );

        SkillModel::skillUpdate($data, $sk_id);

        echo $sk_id;

    }

    public function orderSkill(Request $request) {

        $data = $request->get("data");
		parse_str($data, $order);
        $item = $order["ord"];
        
		foreach ($item as $sk_order => $sk_id) {
            SkillModel::skillOrder($sk_id, $sk_order);
        }
        
        return response()->json($item);
    }

}
