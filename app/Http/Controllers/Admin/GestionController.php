<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use HTMLMin\HTMLMin\Facades\HTMLMin;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
class GestionController extends Controller
{

    public function show_gestion()
    {
        $ladata=[];
        return HTMLMin::blade(view('admin.gestion', compact('ladata')));
    }
}
