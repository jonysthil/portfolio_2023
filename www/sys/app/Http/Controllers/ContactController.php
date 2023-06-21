<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller {
    
    public function list() {

        $data = array(
            'contact' => ContactModel::contactAll()
        );

        return view('admin/contact/list', $data);
    }

    public function detailContact($cnt_id) {

        ContactModel::contactUpdate(array('cnt_status' => 0), $cnt_id);

        $data = array(
            'contact' => ContactModel::contactGet($cnt_id)
        );

        return view('admin/contact/detail', $data);

    }

}
