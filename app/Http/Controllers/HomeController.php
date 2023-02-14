<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SessionRecording;
use Illuminate\Http\Request;
use HTMLMin\HTMLMin\Facades\HTMLMin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
        if (Auth::user()->control_id == 0){
            return redirect()->route('profil');
        }
        elseif (Auth::user()->control_id == 1){
            return redirect()->route('mailbox');
        }
        elseif (Auth::user()->control_id == 2){
            return redirect()->route('replay');
        }
    }
        return HTMLMin::blade(view('home'));
    }
    public function record_session(Request $request)
    {
        $id_u = null; 
        $events = [];
        $id_session = null;
        if (Auth::check()) {
            $id_u = Auth::id();
            if (SessionRecording::where('user_id',Auth::user()->id)->first() != null) { 
                $events_a = json_decode(SessionRecording::whereDay('created_at','=',date('d'))->where('user_id',Auth::user()->id)->first());
                if($events_a != null)
                {
                    $id_session = $events_a->id;
                    $events = json_decode($events_a->recordings);
                    $events_f = json_decode($request->events)->events;
                    if(!empty($events_f)){
                        $events = array_merge($events,$events_f);
                    }
                }
            }else{
                $events = json_decode($request->events)->events;
            }
        }else{
            if (SessionRecording::where('session_id',Session::getId())->first() != null) { 
                $events_a = json_decode(SessionRecording::whereDay('created_at','=',date('d'))->where('session_id',Session::getId())->first());
                if($events_a != null)
                {
                    $id_session = $events_a->id;
                    $events = json_decode($events_a->recordings);
                    $events_f = json_decode($request->events)->events;
                    if(!empty($events_f)){
                        $events = array_merge($events,$events_f);
                    }
                }
            }else{
                $events = json_decode($request->events)->events;
            }
           
        }
        
        SessionRecording::updateOrCreate(
            ['id' => $id_session],
            [
                'user_id' => $id_u,
                'path'=>json_decode($request->events)->path,
                'session_id' => Session::getId(),
                'recordings' => json_encode($events)
            ]
        );
        return "true";
    
    }
}
