<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller {
    
    public function detail() {

        $data = array(
            'about' => AboutModel::selectAbout()
        );

        return view('admin/about/detail', $data);
    }

    public function aboutSave(Request $request, $ab_id) {
        $validator = Validator::make($request->all(), [
            'ab_about' => 'required',
        ],[
            'ab_about.required' => 'Por favor completa este campo',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/about')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            'ab_about' => $request->get('ab_about')
        );

        AboutModel::aboutSave($data);

        return redirect('/admin/about/')->with('success', 'Se actualizó la información con éxito.');

    }

}
