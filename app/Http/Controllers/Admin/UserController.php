<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Admin;
use App\Model\Admin\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = Admin::orderBy('id', 'desc')->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|max:30|unique:admins',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'required',
            'phone' => 'required|numeric'
        ]);
        $image = $request->file('image');
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate .'-'. time() . '-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/user')){
                mkdir('uploads/user', 077, true);
            }
            $image->move('uploads/user', $imageName);
        } else {
            $imageName = 'default.png';
        }
        $user = new Admin;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->status = $request->input('status');
        $user->image = $imageName;
        $user->save();
        $user->roles()->sync($request->input('role'));
        return redirect(route('user.index'))->with('success', 'User created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|max:30',
            'phone' => 'required|numeric'
        ]);
        $user = Admin::findOrFail($id);
        $image = $request->file('image');
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate .'-'. time() .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/user')){
                mkdir('uploads/user', 077, true);
            }
            unlink('uploads/user/'. $user->image);
            $image->move('uploads/user', $imageName);
        } else {
            $imageName = $user->image;
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $request->status ? $user->status = 1 : $user->status = 0;
        $user->image = $imageName;
        $user->save();
        $user->roles()->sync($request->input('role'));
        return redirect(route('user.index'))->with('success', 'User updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Admin::findOrFail($id);
        unlink('uploads/user/'. $user->image);
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted');
    }
}
