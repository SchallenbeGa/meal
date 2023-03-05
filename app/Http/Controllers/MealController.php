<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use HTMLMin\HTMLMin\Facades\HTMLMin;
use Illuminate\Support\Facades\Auth;

class MealController extends Controller
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
    public function show_meal()
    {
        return HTMLMin::blade(view('user.meal'));
    }
 
}
