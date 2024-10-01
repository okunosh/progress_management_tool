<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(User $user)
    {
        return view('top_page')->with(['users' => $user->first()]) ;
    }
    //
}
