<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BlogwygController;
use App\Http\Controllers\Admin\GestionController;
use App\Http\Controllers\Conseiller\CController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use HTMLMin\HTMLMin\Facades\HTMLMin;
use App\Http\Controllers\GPT3Controller;
use App\Http\Controllers\User\ProfilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/conditions', function () {
    // Minifirer le HTML et retourner la vue
    return HTMLMin::blade(view('conditions')); 
})->name('conditions');

//debug conseiller
Route::get('client_debug', function () {
    Auth::user()->control_id = 0; 
    Auth::user()->save();
    return redirect('/profil');
})->name('client_debug');
//debug client
Route::get('/conseiller_debug', function () {
    Auth::user()->control_id = 1; 
    Auth::user()->save();
    return redirect()->route('mailbox');
})->name('conseiller_debug');
//debug admin
Route::get('/admin_debug', function () {
    Auth::user()->control_id = 2; 
    Auth::user()->save();
    return redirect()->route('replay');
})->name('admin_debug');

Route::get('/login', function () {
    return HTMLMin::blade(view('auth.login'));
})->name('login');

Route::get('/redirect/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider']);
Route::get('/callback/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);

Route::get('/blog', [App\Http\Controllers\Blog\BlogController::class, 'index'])->name('blog');
Route::get('/blog/category/{category}', [App\Http\Controllers\Blog\BlogController::class, 'sort_category'])->name('category');
Route::get('/blog/article/{slug}', [App\Http\Controllers\Blog\BlogController::class, 'show'])->name('article');
//debug only
//Route::get('/blog/create', [App\Http\Controllers\BlogController::class, 'create'])->name('generate_article');
//enddebug

Route::post('/record', [HomeController::class, 'record_session'])->name('record');

Route::middleware("auth")->group(function () {

    Route::post('/blog/article/{id_article}/comment', [App\Http\Controllers\Blog\BlogController::class, 'comment']);
    Route::get('/blog/article/{id_article}/like', [App\Http\Controllers\Blog\BlogController::class, 'like']);

    Route::get('/profil/tools', [ProfilController::class, 'showTools'])->name('tools');
    
    Route::get('/heat', [App\Http\Controllers\SessionController::class, 'show_heatmap'])->name('heat');
    Route::get('/replay', [App\Http\Controllers\SessionController::class, 'show_replay'])->name('replay');
    Route::get('/heat/{id_heat}', [App\Http\Controllers\SessionController::class, 'heat']);
    Route::post('/replay/delete/{rec}', [SessionController::class, 'deleteReplay'])->name('replay.delete');


    Route::get('/profil', [ProfilController::class, 'Profil'])->name('profil');
    Route::post('/profil/update', [ProfilController::class, 'updateProfil'])->name('update.profil');
    Route::post('/profil/update/picture', [ProfilController::class, 'updateProfilePicture'])->name('update.profil.picture');

    // Billing and get invoice  
    Route::get('/profil/billing', [ProfilController::class, 'showBillingHistory'])->name('billing');


    Route::get('/gestion', [GestionController::class, 'show_gestion'])->name('gestion');
    Route::get('/edit_blog', [BlogwygController::class, 'edit_blog'])->name('blog_edit');
   
    Route::get('/billing-portal', function (Request $request) {
        return $request->user()->redirectToBillingPortal();
    });
    Route::get('/mailbox', [CController::class, 'mailbox'])->name('mailbox');
    Route::get('/tasks', [CController::class, 'tasks'])->name('tasks');

    Route::get('/sdocument/history', [ProfilController::class, 'sdocument'])->name('sdocument.history');
    Route::get("/sdocument/generator", [GPT3Controller::class, "index"])->name("sdocument_generator");
    Route::post('/sdocument/delete/{sdocument}', [ProfilController::class, 'deleteSDocument'])->name('sdocument.delete');
    Route::post("/sdocument/upload", [ProfilController::class, "showUploadFile"])->name("upload.sdocument");
    Route::post("/sdocument/editor", [GPT3Controller::class, "showEditor"])->name("sdocument.edit.show");
    Route::post("/sdocument/editor/save", [GPT3Controller::class, "update_sdocument"])->name("sdocument.edit.save");

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('destroy', [ProfilController::class, 'destroy'])->name('delete_account');
    Route::post('/profil/cancel-subscription', [ProfilController::class, 'cancelPlan'])->name('plan.cancel');

    Route::post('/situation/update', [ProfilController::class, 'updateCareer'])->name('update.situation');
    // Afficher job actuel de l'utilisateur
    Route::get('/situation', [ProfilController::class, 'showCareerView'])->name('show.situation');
    Route::get('/chat', function (Request $request) {
        return HTMLMin::blade(view('user.chat'));
    })->name('chat');
    Route::get('/answer', function (Request $request) {
        return HTMLMin::blade(view('chat'));
    })->name('answer');
    // Wanted job routes
    Route::get('/wanted-jobs', [ProfilController::class, 'showWantedJob'])->name('wanted_job.list');
    Route::match(['post', 'get'], '/wanted-jobs/create', [ProfilController::class, 'createWantedJob'])->name('wanted_job.create');
    Route::post('/wanted-jobs/edit/{wanted_job}', [ProfilController::class, 'editWantedJob'])->name('wanted_job.edit');
    Route::post('/wanted-jobs/delete/{wanted_job}', [ProfilController::class, 'deleteWantedJob'])->name('wanted_job.delete');
    // Route pour accéder au portail de facturation
    Route::get('/billing-portal', function (Request $request) {
        return $request->user()->redirectToBillingPortal();
    })->name('biling');

});


