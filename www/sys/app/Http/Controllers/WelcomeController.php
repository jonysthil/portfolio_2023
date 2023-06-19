<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\CategoryModel;
use App\Models\EducationModel;
use App\Models\ExperienceModel;
use App\Models\PortfolioGalleryModel;
use App\Models\PortfolioModel;
use App\Models\ServiceModel;
use App\Models\SkillModel;

define('DIR_IMAGEN_PORTFOLIO','/var/www/html/uploads/portfolio/');

class WelcomeController extends Controller {
    
    public function home() {
        $data = array(
            'services' => ServiceModel::publicServiceAll(),
            'about' => AboutModel::selectAbout()
        );
        return view('home', $data);
    }

    public function resume() {
        $data = array(
            'experience' => ExperienceModel::publicExperienceAll(),
            'education' => EducationModel::publicEducationAll(),
            'skill' => SkillModel::publicSkillAll()
        );
        return view('resume', $data);
    }

    public function portfolio() {
        $data = array(
            'categories' => CategoryModel::categoryGet(),
            'proyects' => PortfolioModel::publicPortfolioAll()
        );
        return view('portfolio', $data);
    }

    public function portfolioDetail($prt_slug) {
        $proy = PortfolioModel::publicPortfolioGet($prt_slug);

        if($proy->exists()) {
            if($proy->prt_status == 1) {

                $data = array(
                    'proyect' => $proy,
                    'gallery' => PortfolioGalleryModel::publicPortfolioGalleryAll($proy->prt_id)
                );
                return view('portfolio-detail', $data);
            }
        } 
        return view('error-404');

    }

    public function contact() {
        return view('contact');
    }

    public function imagePortfolioHead($prt_id) {
        //seleccionamos la imagen principal
        $imagen = '';

        $img = PortfolioGalleryModel::selectHead($prt_id);
        $img_r = PortfolioGalleryModel::selectHeadRandom($prt_id);

        if($img->exists()) {
            $imagen = $img->pg_name;
        } else {
            $imagen = $img_r->pg_name;
        }


        $file = DIR_IMAGEN_PORTFOLIO.$imagen;
        $filename = $imagen;
        
        // Header content type 
        header('Content-type: application/png');
        header("Content-Length: " . filesize($file)); 
        header('Content-Disposition: inline; filename="'.$filename.'"');
        header('Content-Transfer-Encoding: binary'); 
        header('Accept-Ranges: bytes');
        
        // Read the file 
        @readfile($file); 

    }

    public function imagesPortfolio($pg_id) {
        //seleccionamos la imagen principal
        $imagen = '';

        $img = PortfolioGalleryModel::publicPortfolioGalleryGet($pg_id);

        $imagen = $img->pg_name;

        $file = DIR_IMAGEN_PORTFOLIO.$imagen;
        $filename = $imagen;
        
        // Header content type 
        header('Content-type: application/png');
        header("Content-Length: " . filesize($file)); 
        header('Content-Disposition: inline; filename="'.$filename.'"');
        header('Content-Transfer-Encoding: binary'); 
        header('Accept-Ranges: bytes');
        
        // Read the file 
        @readfile($file); 

    }

}
