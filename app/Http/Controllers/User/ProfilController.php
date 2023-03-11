<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Laravel\Cashier\Invoice;
use Laravel\Cashier\Cashier;
use App\Models\User;
use HTMLMin\HTMLMin\Facades\HTMLMin;
use App\Models\Skill;
use App\Models\Language;
use App\Models\UserLanguage;
use App\Models\WantedJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Subscription;
use App\Models\Planning;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return HTMLMin::blade(view('user.profil', compact('user')));
    }

    
    public function showTools()
    {
        return HTMLMin::blade(view('user.tools'));
    }


    

   
    // Mise à jour du job actuel de l'utilisateur
    public function updateCareer(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        
        // Check if the user is a student checkbox is checked
        if ($request->is_student == 'on') {
            $user->is_student = true;
        } else {
            $user->is_student = false;
        }


        // get all languages from the request name="know_language_{{$language->language}}"
        $know_languages = array();
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'know_language_') !== false) {
                // get the language id
                $language_id = str_replace('know_language_', '', $key);

                $know_languages[] = $language_id;
            }
        }

        // Update the user languages in the table user_language
        $user->languages()->sync($know_languages);
        
        if($request->skills){
            // Update the user skills in the table skills
            Skill::where('user_id', $user->id)->update([
                'skills' => $request->skills,
                'education' => $request->education,
        ]);
        }


        $user->actual_job = $request->actual_job_name;
        $user->actual_job_description = $request->actual_job_description;
        $user->actual_job_start_date = $request->actual_job_start_date;
        $user->actual_job_end_date = $request->actual_job_end_date;
        $user->wanted_job_context = $request->wanted_job_context;

        $user->save();

        // return the view with updated data
        return back()->with('status', 'Informations mises à jour avec succès !');

    }

    // Return the view with the actual job of the user
    public function showCareerView()
    {
        $declarations=[];
        return HTMLMin::blade(view('user.situation',compact('declarations')));
    }
    // setup 1
    public function setup1()
    {
        return HTMLMin::blade(view('user.setup1'));
    }
    // setup 2
    public function setup2()
    {
        return HTMLMin::blade(view('user.setup2'));
    }
    // setup 3
    public function setup3()
    {
        return HTMLMin::blade(view('user.setup3'));
    }
    public function allergie()
    {
        return HTMLMin::blade(view('user.allergie'));
    }



    // Update the profil of the user
    public function updateProfil(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        // Update the profil of the user
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone_number = $request->phone_number;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->region = $request->region;
        $user->postal_code = $request->postal_code;
        $user->address = $request->address;
        $article_exemple = Article::create([
            'title' => $res['titre'],
            'slug' => Str::slug($res['titre'], '-'),
            'author' => 'Intelligence Articifielle',
            'category' =>  $res['domaine'],
            'content' => json_encode(array($res['para1'], $res['para2'], $res['para3'])),
        ]);
        $article_exemple->save();
        
        $user->save();

        // return the view with updated data
        return back()->with('status', 'Informations mises à jour avec succès !');
    }

    // Return the view with the profil of the user
    public function profil(Request $request)
    {
        return HTMLMin::blade(view('user.profil'));
    }


    public function destroy(Request $request)
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

  
    // Show billing history and invoices
    public function showBillingHistory(Request $request)
    {   
       $invoices = [];

        return HTMLMin::blade(view('user.billing', compact('invoices')));        
    }




}
