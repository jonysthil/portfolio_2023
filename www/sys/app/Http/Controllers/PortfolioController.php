<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\PortfolioCategoryModel;
use App\Models\PortfolioGalleryModel;
use App\Models\PortfolioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Tools;

class PortfolioController extends Controller {
    
    public function list() {

        $data = array(
            'portfolio' => PortfolioModel::portfolioAll()
        );

        return view('admin/portfolio/list', $data);
    }

    public function newPortfolio() {
        return view('admin/portfolio/new');
    }

    public function savePortfolio(Request $request) {

        $validator = Validator::make($request->all(), [
            'prt_title' => 'required',
            'prt_date' => 'required'
        ],[
            'required.required' => 'Please complete this field',
            'prt_date.required' => 'Please complete this field'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('portfolio.new')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            'prt_title' => $request->get('prt_title'),
            'prt_description' => $request->get('prt_description'),
            'prt_date' => $request->get('prt_date'),
            'prt_slug' => Tools::clean_text($request->get('prt_title'))
        );

        $prt_id = PortfolioModel::portfolioSave($data);

        return redirect()->route('portfolio.detail', $prt_id)->with('success', 'New record.');
    }

    public function detailPortfolio($prt_id) {

        $categories = PortfolioCategoryModel::ProyectCategoryGet($prt_id);

        //Obtener array de datos para seleccionarlos en el combobox
        $category_select = array(); 
        $i = 0;
        foreach ($categories as $rel) {
            $category_select[$i] = $rel['pc_id'];
            $i++;
        }

        $data = array(
            'proyect' => PortfolioModel::portfolioGet($prt_id),
            'categories' => CategoryModel::categoryGet(),
            'category_select' => $category_select,
            'gallery' => PortfolioGalleryModel::portfolioGalleryAll($prt_id)
        );
        return view('admin/portfolio/detail', $data);
    }

    public function editPortfolio($prt_id) {

        $data = array(
            'proyect' => PortfolioModel::portfolioGet($prt_id),
        );

        return view('admin/portfolio/edit', $data);
    }

    public function updatePortfolio(Request $request, $prt_id) {

        $validator = Validator::make($request->all(), [
            'prt_title' => 'required',
            'prt_date' => 'required'
        ],[
            'required.required' => 'Please complete this field',
            'prt_date.required' => 'Please complete this field'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('portfolio.edit', $prt_id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            'prt_title' => $request->get('prt_title'),
            'prt_description' => $request->get('prt_description'),
            'prt_date' => $request->get('prt_date'),
            'prt_slug' => Tools::clean_text($request->get('prt_title'))
        );

        PortfolioModel::portfolioUpdate($data, $prt_id);

        return redirect()->route('portfolio.detail', $prt_id)->with('success', 'Modified record.');
    }

    public function deletePortfolio($prt_id) {
        PortfolioModel::portfolioDelete($prt_id);
        return redirect()->route('portfolio')->with('error', 'Deleted information');
    }

    public function categoryPortfolio(Request $request, $prt_id) {

        $data = array(
            'prt_id' => $prt_id,
            'pc_id' => $request->get('value')
        );

        if($request->get('data') == "true") {
            //insert relation
            PortfolioCategoryModel::proyectCategorySave($data);
        } else {
            //delete relation
            PortfolioCategoryModel::proyectCategoryDelete($data);
        }

    }

    public function statusPortfolio(Request $request, $prt_id) {

        $active_status = ($request->get('data') == "true") ? 1 : 0;

        $data = array(
            'prt_status' => $active_status
        );

        PortfolioModel::portfolioUpdate($data, $prt_id);

        echo $prt_id;

    }

    public function orderPortfolio(Request $request) {

        $data = $request->get("data");
		parse_str($data, $order);
        $item = $order["ord"];
        
		foreach ($item as $prt_order => $prt_id) {
            PortfolioModel::portfolioOrder($prt_id, $prt_order);
        }
        
        return response()->json($item);
    }

}
