<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\Category;
use App\Model\User\Post;
use App\Model\User\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
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
            'image' => 'required'
        ]);
        if ($request->hasFile('image')){
            $imageName = $request->image->store('public/images');
        }
        $post = new Post;
        $post->title = $request->input('title');
        $post->sub_title = $request->input('sub_title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->image = $imageName;
        $tags = $request->get('tags');
        $categories = $request->get('categories');
//        $post->tags()->attach($tags);
//        $post->categories->sync($categories);
        $post->save();
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
        $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('post'));
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
            'body' => 'required',
            'image' => 'required'
        ]);
        if ($request->hasFile('image')){
            $imageName = $request->image->store('public/images');
        }
        $post = Post::findOrFail($id);
        $post->image = $imageName;
        $post->title = $request->input('title');
        $post->sub_title = $request->input('sub_title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->save();
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
        $post->delete();
        return redirect()->back()->with('success', 'Post Deleted');
    }
}
