<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\CategoryModel;
use App\Models\ContactModel;
use App\Models\EducationModel;
use App\Models\ExperienceModel;
use App\Models\PortfolioGalleryModel;
use App\Models\PortfolioModel;
use App\Models\ServiceModel;
use App\Models\SkillModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

if($_SERVER["HTTP_HOST"] == "127.0.0.1") {   
    define('DIR_IMAGEN_PORTFOLIO','/var/www/html/uploads/portfolio/');
    define('DIR_NO_IMAGEN','/var/www/html/assets/images/');
} else {
    define('DIR_IMAGEN_PORTFOLIO','/home/u578082744/public_html/public_html/uploads/portfolio/');
    define('DIR_NO_IMAGEN','/home/u578082744/public_html/public_html/assets/images/');
}



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

    public function contactMessage(Request $request) {

        $validator = Validator::make($request->all(), [
            'name_contact' => 'required',
            'email_contact' => 'required|email',
            'phone_contact' => 'required|numeric',
            'message_contact' => 'required',
            'g-recaptcha-response' => 'required',
        ],[
            'name_contact.required' => 'Please complete this field',
            'email_contact.required' => 'Please complete this field',
            'email_contact.email' => 'It is not a valid email',
            'phone_contact.required' => 'Please complete this field',
            'phone_contact.numeric' => 'Please only numbers',
            'message_contact.required' => 'Please complete this field',
            'g-recaptcha-response' => 'Confirm you are not a robot',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('p.contact')
                        ->withErrors($validator)
                        ->withInput();
        }

        $captcha = $request->get('g-recaptcha-response');

        $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array(
                'secret' => '6LcFD8QcAAAAABz1PDVve3uG2mexPun8VO7ohhoA',
                'response' => $captcha,
                'remoteip' => $_SERVER['REMOTE_ADDR']
            );
            $options = array(
                'http' => array(
                    'method' => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded',
                    'content' => http_build_query($data)
                )
            );
            $context = stream_context_create($options);
            $verify = file_get_contents($url, false, $context);
            $captcha_success = json_decode($verify);


            if ($captcha_success->success) {

                $data = array(
                    'cnt_name' => $request->get('name_contact'),
                    'cnt_mail' => $request->get('email_contact'),
                    'cnt_phone' => $request->get('phone_contact'),
                    'cnt_message' => $request->get('message_contact'),
                    'cnt_date' => date('Y-m-d')
                );
        
                ContactModel::contactSave($data);
        
                return redirect()
                            ->route('p.contact')
                            ->with('success', 'New record.');
            }


    }

    public function imagePortfolioHead($prt_id) {
        //seleccionamos la imagen principal
        $imagen = 'no_photo.png';

        $img = PortfolioGalleryModel::selectHead($prt_id);
        $img_r = PortfolioGalleryModel::selectHeadRandom($prt_id);

        if($img->exists()) {
            $imagen = $img->pg_name;
        } else if($img_r->exists()) {
            $imagen = $img_r->pg_name;
        } 
        
        if(file_exists(DIR_IMAGEN_PORTFOLIO.$imagen)) {
            $file = DIR_IMAGEN_PORTFOLIO.$imagen;
        } else {
            $file = DIR_NO_IMAGEN.$imagen;
        } 
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
