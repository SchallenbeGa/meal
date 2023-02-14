<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SDocument;
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


    public function sdocument()
    {
        $user = Auth::user();
        $sdocuments = SDocument::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return HTMLMin::blade(view('user.sdocument_history', compact('sdocuments')));
    }

    public function deleteSDocument(SDocument $sdocument)
    {
        $sdocument->delete();
        return back()->with('status', 'Lettre supprimée avec succès !');
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
        $stripe_options = array();
        if(!empty($request->address)){
            $stripe_options["address[line1]"]=$request->address;
        }
        if(!empty($request->city)){
            $stripe_options["address[city]"]=$request->city;
        }
        if(!empty($request->postal_code)){
            $stripe_options["address[postal_code]"]=$request->postal_code;
        }
        if(!empty($request->country)){
            $stripe_options["address[country]"]=$request->country;
        }

        if(!empty($request->phone_number)){
            $stripe_options["phone"]=$request->phone_number;
        }
        if(!empty($request->lastname)){
            $stripe_options["name"]=$request->firstname." ".$request->lastname;
        }
        
        $user->save();

        // return the view with updated data
        return back()->with('status', 'Informations mises à jour avec succès !');
    }

    // Return the view with the profil of the user
    public function profil(Request $request)
    {
        // return the view
        return HTMLMin::blade(view('user.profil'));
    }

    public function cancelPlan(Request $request)
    {
        $user = $request->user();
        //dd($user->subscription('3'));
        $user->subscription('premium')->cancel();
        $user->plans_id = 0;
        $user->tokens_left = 1;
        $user->save();
        // return the view
        return back()->with('status', 'Plan mis à jour avec succès !');
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

    // Show wanted job
    public function showWantedJob(Request $request)
    {
        $user = Auth::user();
        $jobs = WantedJob::where('user_id', Auth::id())->get();
        return HTMLMin::blade(view('user.wanted_job_list', compact('jobs')));
    }

    // Create or update wanted job
    public function createWantedJob(Request $request)
    {
        // si c'est un get 

        if ($request->isMethod('get')) {
            // Contrôle de l'utilisateur
            return view('user.wanted_job_add');
        } 
        else {
            $validatedData = $request->validate([
                'wanted_job_company_name' => 'required|string|max:255',
                'wanted_job_title' => 'required|string|max:255',
            ]);
            
            $user = Auth::user();

            WantedJob::updateOrCreate(
                ['id' => $request->input('id')],
                [
                    'user_id' => $user->id,
                    'wanted_job_company_name' => $validatedData['wanted_job_company_name'],
                    'wanted_job_title' => $validatedData['wanted_job_title'],
                    'wanted_job_address' => "[Addresse]",
                    'wanted_job_city' => "[Ville]",
                    'wanted_job_region' => "[Région]",
                    'wanted_job_postal_code' => "[Code postal]",
                ]
            ); 

            if($request->headers->has('referer')){
                $referer = $request->header('referer');
                if($referer = 'want_generate'){
                    return redirect()->route('sdocument_generator')->with('success', 'Postulation ajoutée avec succès !');
                }
            }else{
                return redirect()->route('wanted_job.list')->with('success', 'Entreprise ajoutée/modifiée avec succès !');
            }


           
        }
       
    }

    // Edit wanted job return the view with data
    public function editWantedJob(Request $request, $id)
    {
       // Check if the user is the owner of the wanted job
       if(WantedJob::findOrFail($id)->user_id != Auth::id()){
            return redirect()->route('wanted_job.list')->with('status', "Vous n'avez pas le droit de modifier cette postulation ! (MDR)");
        }
        $job = WantedJob::findOrFail($id);
        return HTMLMin::blade(view('user.wanted_job_add', compact('job')));
    }

    // Delete wanted job
    public function deleteWantedJob($id)
    {
        $job = WantedJob::findOrFail($id);
        if ($job->user_id == Auth::id()) {
            $job->delete();
            return redirect()->route('wanted_job.list')->with('status', 'Postulation supprimée avec succès !');
        } else {
            return redirect()->route('wanted_job.list')->with('status', "Vous n'avez pas le droit de supprimer cette postulation ! (MDR)");
        }
    }

    // Show billing history and invoices
    public function showBillingHistory(Request $request)
    {   
       $invoices = [];

        return HTMLMin::blade(view('user.billing', compact('invoices')));        
    }
public function showUploadFile(Request $request) {
      $file = $request->file('sdocument_file');

      //Display File Name
      echo 'File Name: '.$file->getClientOriginalName();
      echo '<br>';
   
      //Display File Extension
      echo 'File Extension: '.$file->getClientOriginalExtension();
      echo '<br>';
   
      //Display File Real Path
      echo 'File Real Path: '.$file->getRealPath();
      echo '<br>';
   
      //Display File Size
      echo 'File Size: '.$file->getSize();
      echo '<br>';
   
      //Display File Mime Type
      echo 'File Mime Type: '.$file->getMimeType();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());
    }


    




}
