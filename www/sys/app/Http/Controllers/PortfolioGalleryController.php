<?php

namespace App\Http\Controllers;

use App\Models\PortfolioModel;
use App\Models\PortfolioGalleryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\ImageManagerStatic as Image;
use Tools;

class PortfolioGalleryController extends Controller {

    public function savePortfolioGallery(Request $request, $prt_id) {

        //dd($request->all());
        
        $validator = Validator::make($request->all(), [
            'pg_name' => 'required|mimes:png,jpg'
        ],[
            'pg_name.required' => 'The image field is required.',
            'pg_name.mimes' => 'The image must be a file of type: png, jpg, jpeg.'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('portfolio.detail', $prt_id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $proyect = PortfolioModel::portfolioGet($prt_id);

        $pg_name = Tools::clean_text($proyect->prt_title) . '_' . uniqid();

        $image = Image::make($request->file('pg_name'))
                        ->encode('webp', 100)
                        ->resize(560, 340, function ($constraint) {
                            $constraint->aspectRatio();
                        });

        $directory = './uploads/portfolio';

        $subir = $image->save($directory . '/' . $pg_name . '.webp');

        if($subir) {

            $data = array(
                'prt_id' =>$prt_id,
                'pg_name' => $pg_name.'.webp'
            );

            PortfolioGalleryModel::saveImage($data);
    
            return redirect()
                    ->route('portfolio.detail', $prt_id)
                    ->withFragment('sec_gallery')
                    ->with('success', 'You have successfully save image.');
        } else {
            return redirect()
                    ->route('portfolio.detail', $prt_id)
                    ->withFragment('sec_gallery')
                    ->with('error', 'Deleted information, ' . $_FILES["pg_name"]["error"]);
        }

    }

    public function deletePortfolioGallery($prt_id, $pg_id) {
        
        $image = PortfolioGalleryModel::portfolioGalleryGet($pg_id);
        
        $directory = './uploads/portfolio';
        
        @unlink($directory . '/' . $image->pg_name);
        
        PortfolioGalleryModel::portfolioGalleryDelete($pg_id);

        return redirect()
                ->route('portfolio.detail', $prt_id)
                ->withFragment('sec_gallery')
                ->with('error', 'Deleted information');
    }

    public function headPortfolioGallery(Request $request) {

        $pg_id = $request->get('data_id');
        $prt_id = $request->get('data_proy');
        $pg_head =($request->get('data_head')) ? 0 : 1;

        $data = array(
            'pg_head' => $pg_head
        );

        PortfolioGalleryModel::portfolioGalleryHeat($data, $pg_id, $prt_id);

        $images = PortfolioGalleryModel::portfolioGalleryCount($prt_id);
        echo $images;

    }

    public function orderPortfolioGallery(Request $request) {

        $data = $request->get("data");
		parse_str($data, $order);
        $item = $order["ord"];
        
		foreach ($item as $pg_order => $pg_id) {
            PortfolioGalleryModel::portfolioGalleryOrder($pg_id, $pg_order);
        }
        
        return response()->json($item);
    }

}
