<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Models\SessionRecording;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show_heatmap()
    {
        if(Auth::user()->email == "blackdiamondxx9@gmail.com" || Auth::user()->email == "admin@LessTax.com"){

        $records = SessionRecording::get();
        $ladata = [];
        $lasauce = [];
        foreach($records as $record){
            if($record->recordings!="[]"){
                $ok = json_decode($record->recordings);
                foreach($ok as $rec){
                    if(property_exists($rec,'data') && !is_array($rec->data)){
                        if(property_exists($rec->data,'positions')){
                            foreach($rec->data->positions as $pos){
                                $arr=array("x"=>$pos->x, "y"=>$pos->y, "value"=>8,"path"=>$rec->path);
                                //$ladata[] = (object)$arr;
                                $ladata[$rec->path][] = (object)$arr;
                                //dd($ladata);
                            }
                            
                        }
                        
                    }
                    
                }
            }
        }
        foreach ($ladata as $la){
            $lasauce[] = $ladata;
        }
        $ladata = $lasauce;
        
        return view('admin.heat',compact('ladata'));
    }else{
        return redirect()->back();
    
    }
    }
   
    public function show_replay()
    {
        if(Auth::user()->email == "blackdiamondxx9@gmail.com" || Auth::user()->email == "admin@LessTax.com"){
        
        $records = SessionRecording::whereDay('created_at','>',date('d')-3)->orderBy('updated_at', 'desc')->get();
        $user_count = User::all()->count();
        $user_today = User::whereDay('created_at',date('d'))->count();
        $user_weekly =  User::whereDay('created_at','>',date('d')-3)->count();
        $user_diff = (($user_count - $user_weekly)/$user_count)*100;
        $comment_count = Comment::all()->count();
        $like_count = Like::all()->count();
        $article_count = Article::all()->count();
        $guest_count = 0;
        $session_count = 0;
        $stato = [];
  
        $ladata = [];
        $uid = [];
        $dates = [];
        $pages = [];
        $ids = [];
        $users_data = [];
        $dates_f = [];
        foreach($records as $record){
            $ok = json_decode($record->recordings);
            if(count($ok)>5){
                $ladata[] = $ok;
                $uid[] = $record->session_id;
                $dates[] = $record->updated_at;
                $dates_f[] = $record->created_at;
                $pages[] = $record->path;
                $ids[] = $record->id;
                if($record->user_id != null){
                    $users_data[] = User::find($record->user_id)->email;
                }else{
                    $guest_count++;
                    $users_data[] = "guest";
                }
                
            }
        }
        $stato[] = $user_count; 
        $stato[] = $user_today;
        $stato[] = $guest_count;
        $ladata = array_filter($ladata);
        $stato[] = count($ladata);
        $stato[] = $user_diff;
        $stato[] = $comment_count;
        $stato[] = $like_count;
        $stato[] = $article_count;

        return view('admin.replay',compact('ladata','uid','dates','pages','ids','users_data','dates_f','stato'));
    }else{
        return redirect()->back();
    
    }
    }
    public function heat($id_heat)
    {
        if(Auth::user()->email == "blackdiamondxx9@gmail.com" || Auth::user()->email == "admin@LessTax.com"){
            $records = SessionRecording::get();
            $ladata = [];
            $lasauce = [];
            $cnt = 0;
            foreach($records as $record){
                if($record->recordings!="[]"){
                    if($cnt == $id_heat){
                        $ok = json_decode($record->recordings);
                        foreach($ok as $rec){
                            if(property_exists($rec,'data') && !is_array($rec->data)){
                                if(property_exists($rec->data,'positions')){
                                    foreach($rec->data->positions as $pos){
                                        $arr=array("x"=>$pos->x, "y"=>$pos->y, "value"=>8,"path"=>$rec->path);
                                        //$ladata[] = (object)$arr;
                                        $lasauce[] = $rec->path;
                                        $ladata[$rec->path][] = (object)$arr;
                                        //dd($ladata);
                                    }
                                    
                                }
                                
                            }
                        }
                        
                    }else{
                        $cnt++;
                    }
                }
            }
            $path = "";
            foreach($lasauce as $key=>$la){
                if($key == $id_heat){
                    $ladata = $ladata[$la];
                    $path = $la;
                }
            }
        return view('admin.single_heat',compact('ladata','path'));
    }else{
        return redirect()->back();
    
    }
    }
   
    public function deleteReplay(SessionRecording $rec)
    {
        if(Auth::user()->email == "blackdiamondxx9@gmail.com" || Auth::user()->email == "admin@LessTax.com"){

        $rec->delete();
        return back();
    }else{
        return redirect()->back();
    
    }
    }
}
