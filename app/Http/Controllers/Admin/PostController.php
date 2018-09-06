<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\Category;
use App\Model\User\Post;
use App\Model\User\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
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
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact('tags', 'categories'));
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
            'title' => 'required',
            'sub_title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png'
        ]);
        $image = $request->file('image');
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate .'-'. time() .'-'. uniqid() .'-'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/post')){
                mkdir('uploads/post', 077, true);
            }
            $image->move('uploads/post', $imageName);
        } else {
            $imageName = 'default.png';
        }
        $post = new Post;
        $post->title = $request->input('title');
        $post->sub_title = $request->input('sub_title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->status = $request->input('status');
        $post->image = $imageName;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        return redirect(route('post.index'))->with('success', 'Post Added');
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
        $post = Post::with('tags', 'categories')->where('id', $id)->first();
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'tags', 'categories'));
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
            'title' => 'required',
            'sub_title' => 'required',
            'slug' => 'required',
            'body' => 'required'
        ]);
        $post = Post::findOrFail($id);
        $image = $request->file('image');
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate .'-'. time() .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/post')){
                mkdir('uploads/post', 077, true);
            }
            unlink('uploads/post/'. $post->image);
            $image->move('uploads/post', $imageName);
        } else {
            $imageName = $post->image;
        }
        $post->image = $imageName;
        $post->title = $request->input('title');
        $post->sub_title = $request->input('sub_title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->status = $request->input('status');
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        return redirect(route('post.index'))->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink('uploads/post/'. $post->image);
        $post->delete();
        return redirect()->back()->with('success', 'Post Deleted');
    }
}
