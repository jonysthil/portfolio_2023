<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\ServiceModel;
use Illuminate\Http\Request;

class WelcomeController extends Controller {
    
    public function home() {
        $data = array(
            'services' => ServiceModel::publicServiceAll(),
            'about' => AboutModel::selectAbout()
        );
        return view('home', $data);
    }

    public function resume() {
        return view('resume');
    }

    public function portfolio() {
        return view('portfolio');
    }

    public function portfolioDetail() {
        return view('portfolio-detail');
    }

    public function contact() {
        return view('contact');
    }

}
