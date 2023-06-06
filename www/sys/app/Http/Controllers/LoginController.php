<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\UserModel;

class LoginController extends Controller {

    public function isValid() {

        if(session()->get('ad_type') == "admin") {
            return true;
        } else {
            return false;
        }
    }
    
    public function loginForm() {
        if ($this->isValid()) {
			return redirect('/admin/dashboard');
		}
        return view('admin.login');
    }

    public function validar(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'pass' => 'required',
        ],[
            'email.required' => 'Por favor completa este campo',
            'pass.required' => 'Por favor completa este campo',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/login')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            "ad_email" => $request->get('email'),
            "ad_password"  => $request->get('pass')
        );

        $user = UserModel::login($data);

        if($user->exists()) {
            session()->put('ad_type', 'admin');
            session()->put('ad_id', $user->ad_id);
            session()->put('ad_email', $user->ad_email);
            session()->put('ad_name', $user->ad_name);

            return redirect('/admin/dashboard/')->with('success', 'Bienvenido ' . session()->get('ad_name'));
        } else {
            return redirect('/admin/login')->with('message', 'Error: Usuario y contraseña erroneos.');


        }
    }

    public function logout() {

        session()->forget('ad_type');
        session()->forget('ad_id');
        session()->forget('ad_email');
        session()->forget('ad_name');
        session()->flush();

        return redirect('/admin/login');
    }

}
