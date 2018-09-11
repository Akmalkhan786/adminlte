<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Admin;
use App\Model\Admin\Role;
use App\Model\User\Category;
use App\Model\User\Post;
use App\Model\User\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $categoryCount = Category::count();
        $tagCount = Tag::count();
        $postCount = Post::count();
        $userCount = Admin::count();
        $users = Admin::where('status', true)->paginate(5);
        return view('admin.home', compact('categoryCount', 'tagCount', 'postCount', 'userCount', 'users'));
    }

    public function profile($id){
        $user = Admin::findOrFail($id);
        $roles = Role::all();
        return view('admin.user.profile', compact('user', 'roles'));
    }
}
