<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\EducationModel;
use App\Models\ExperienceModel;
use App\Models\ServiceModel;
use App\Models\SkillModel;

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
        return view('portfolio');
    }

    public function portfolioDetail() {
        return view('portfolio-detail');
    }

    public function contact() {
        return view('contact');
    }

}
