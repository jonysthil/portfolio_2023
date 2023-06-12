<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function() {

    // Login del panel de administración.
    Route::get('/', [LoginController::class, 'loginForm']);
    Route::get ('/login', [LoginController::class, 'loginForm']);
    Route::post('/login', [LoginController::class, 'validar'])->name('validateLogin');
    Route::get ('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::group(['middleware' => ['authenticateMiddleware']], function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('home');

        Route::get('/about', [AboutController::class, 'detail'])->name('about');
        Route::put('/about/{ab_id}/save', [AboutController::class, 'aboutSave'])->name('about.save');

        Route::get('/service', [ServiceController::class, 'list'])->name('services');
        Route::get('/service/new', [ServiceController::class, 'newService'])->name('service.new');
        Route::post('/service/save', [ServiceController::class, 'saveService'])->name('service.save');
        Route::get('/service/{ser_id}/detail', [ServiceController::class, 'detailService'])->name('service.detail');
        Route::get('/service/{ser_id}/edit', [ServiceController::class, 'editService'])->name('service.edit');
        Route::put('/service/{ser_id}/update', [ServiceController::class, 'updateService'])->name('service.update');
        Route::delete('/service/{ser_id}/delete', [ServiceController::class, 'deleteService'])->name('service.delete');
        Route::get('/service/{ser_id}/status', [ServiceController::class,'statusService'])->name('service.status');
        Route::get('/service/order', [ServiceController::class,'orderService'])->name('service.order');
        Route::post('/service/{ser_id}/icon', [ServiceController::class,'iconService'])->name('service.icon');

        Route::get('/experience', [ExperienceController::class, 'list'])->name('experiences');
        Route::get('/experience/new', [ExperienceController::class, 'newExperience'])->name('experience.new');
        Route::post('/experience/save', [ExperienceController::class, 'saveExperience'])->name('experience.save');
        Route::get('/experience/{exp_id}/detail', [ExperienceController::class, 'detailExperience'])->name('experience.detail');
        Route::get('/experience/{exp_id}/edit', [ExperienceController::class, 'editExperience'])->name('experience.edit');
        Route::put('/experience/{exp_id}/update', [ExperienceController::class, 'updateExperience'])->name('experience.update');
        Route::delete('/experience/{exp_id}/delete', [ExperienceController::class, 'deleteExperience'])->name('experience.delete');
        Route::get('/experience/{exp_id}/status', [ExperienceController::class,'statusExperience'])->name('experience.status');
        Route::get('/experience/order', [ExperienceController::class,'orderExperience'])->name('experience.order');
    
        Route::get('/education', [EducationController::class, 'list'])->name('educations');
        Route::get('/education/new', [EducationController::class, 'newEducation'])->name('education.new');
        Route::post('/education/save', [EducationController::class, 'saveEducation'])->name('education.save');
        Route::get('/education/{edu_id}/detail', [EducationController::class, 'detailEducation'])->name('education.detail');
        Route::get('/education/{edu_id}/edit', [EducationController::class, 'editEducation'])->name('education.edit');
        Route::put('/education/{edu_id}/update', [EducationController::class, 'updateEducation'])->name('education.update');
        Route::delete('/education/{edu_id}/delete', [EducationController::class, 'deleteEducation'])->name('education.delete');
        Route::get('/education/{edu_id}/status', [EducationController::class,'statusEducation'])->name('education.status');
        Route::get('/education/order', [EducationController::class,'orderEducation'])->name('education.order');

        Route::get('/skill', [SkillController::class, 'list'])->name('skills');
        Route::post('/skill/save', [SkillController::class,'saveSkill'])->name('skill.save');
        Route::delete('/skill/{sk_id}/delete', [SkillController::class, 'deleteSkill'])->name('skill.delete');
        Route::get('/skill/{sk_id}/status', [SkillController::class,'statusSkill'])->name('skill.status');
        Route::get('/skill/order', [SkillController::class,'orderSkill'])->name('skill.order');
    
    });

});

Route::get('/', [WelcomeController::class, 'home'])->name('p.home');
Route::get('/resume', [WelcomeController::class, 'resume'])->name('p.resume');
Route::get('/portfolio', [WelcomeController::class, 'portfolio'])->name('p.portfolio');
Route::get('/portfolio/detail', [WelcomeController::class, 'portfolioDetail'])->name('p.portfolio.detail');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('p.contact');


