<?php

namespace App\Http\Controllers\User;

use App\Model\User\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::where('status', null)->orderBy('created_at', 'desc')->paginate(5);
        return view('user.blog', compact('posts'));
    }
}
