<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use HTMLMin\HTMLMin\Facades\HTMLMin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    public function create_recipe()
    {
        return HTMLMin::blade(view('user.new_recipe'));
    }
    public function save_recipe()
    {
        return HTMLMin::blade(view('user.recipe'));
    }
    public function storeImage(Request $request)
    {   
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();

        // Public Folder
        $request->image->move(public_path('images'), $imageName);

        return back()->with('success', 'Image uploaded Successfully!')->with('image', $imageName);
    }
    public function generator()
    {   
        $firstquarter = array(
            'title' => 'January',
            '' => 'January',
            '' => 'January',
            '' => 'January'
        );
        return view('generator');
    }
}
