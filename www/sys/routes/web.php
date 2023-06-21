<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioGalleryController;
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
    Route::get('/', [LoginController::class, 'loginForm'])->name('login');
    Route::get ('/login', [LoginController::class, 'loginForm'])->name('login');
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

        Route::get('/categories', [CategoryController::class, 'list'])->name('categories');
        Route::post('/categories/save', [CategoryController::class,'saveCategory'])->name('category.save');
        Route::delete('/categories/{pc_id}/delete', [CategoryController::class, 'deleteCategory'])->name('category.delete');

        Route::get('/portfolio', [PortfolioController::class, 'list'])->name('portfolio');
        Route::get('/portfolio/new', [PortfolioController::class, 'newPortfolio'])->name('portfolio.new');
        Route::post('/portfolio/save', [PortfolioController::class, 'savePortfolio'])->name('portfolio.save');
        Route::get('/portfolio/{prt_id}/detail', [PortfolioController::class, 'detailPortfolio'])->name('portfolio.detail');
        Route::get('/portfolio/{prt_id}/edit', [PortfolioController::class, 'editPortfolio'])->name('portfolio.edit');
        Route::put('/portfolio/{prt_id}/update', [PortfolioController::class, 'updatePortfolio'])->name('portfolio.update');
        Route::delete('/portfolio/{prt_id}/delete', [PortfolioController::class, 'deletePortfolio'])->name('portfolio.delete');
        Route::get('/portfolio/{prt_id}/status', [PortfolioController::class,'statusPortfolio'])->name('portfolio.status');
        Route::get('/portfolio/{prt_id}/category', [PortfolioController::class,'categoryPortfolio'])->name('portfolio.category');
        Route::get('/portfolio/order', [PortfolioController::class,'orderPortfolio'])->name('portfolio.order');

        Route::post('portfolio/{prt_id}/gallery/new',[PortfolioGalleryController::class, 'savePortfolioGallery'])->name('portfolio.gallery.new');
        Route::get('/portfolio/gallery/order', [PortfolioGalleryController::class,'orderPortfolioGallery'])->name('portfolio.gallery.order');
        Route::delete('/portfolio/{prt_id}/gallery/{pg_id}/delete', [PortfolioGalleryController::class, 'deletePortfolioGallery'])->name('portfolio.gallery.delete');
        Route::get('/portfolio/gallery/head', [PortfolioGalleryController::class,'headPortfolioGallery'])->name('portfolio.gallery.head');

        Route::get('/contact', [ContactController::class, 'list'])->name('contact');
        Route::get('/contact/{cnt_id}/detail', [ContactController::class, 'detailContact'])->name('contact.detail');

    });

});

Route::get('/', [WelcomeController::class, 'home'])->name('p.home');
Route::get('/resume', [WelcomeController::class, 'resume'])->name('p.resume');
Route::get('/portfolio', [WelcomeController::class, 'portfolio'])->name('p.portfolio');
Route::get('/portfolio/{prt_slug}', [WelcomeController::class, 'portfolioDetail'])->name('p.portfolio.detail');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('p.contact');
Route::post('/contact/message', [WelcomeController::class, 'contactMessage'])->name('p.contact.message');

Route::get('/portfolio/images/{prt_id}', [WelcomeController::class, 'imagesPortfolio'])->name('p.portfolio.images');
Route::get('/portfolio/image/{prt_id}', [WelcomeController::class, 'imagePortfolioHead'])->name('p.portfolio.image.head');


