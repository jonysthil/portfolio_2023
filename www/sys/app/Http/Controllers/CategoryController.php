<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller {
    
    public function list() {

        $data = array(
            'category' => CategoryModel::categoryGet()
        );

        return view('admin/category/list', $data);
    }

    public function saveCategory(Request $request) {
        $validator = Validator::make($request->all(), [
            'pc_name' => 'required|unique:proyect_category',
        ],[
            'pc_name.required' => 'Please complete this field',
            'pc_name.unique' => 'The category already exists',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('categories')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            'pc_name' => $request->get('pc_name')
        );


        CategoryModel::categorySave($data);

        return redirect()->route('categories')->with('success', 'New record.');
    }

    public function deleteCategory($pc_id) {

        CategoryModel::categoryDelete($pc_id);

        return redirect()->route('categories')->with('error', 'Deleted information');
    }

}
