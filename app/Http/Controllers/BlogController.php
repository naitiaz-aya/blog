<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Blogcomment;

class BlogController extends Controller
{
    /**
     * Display a listing of the ressource
     * 
     * @return \Illuminate\Http\Blog
     */
    public function index()
    {

        $blogs = Blog::all();
        return redirect('/Blogs')->with('blogs' , $blogs);
    }

    public function selfIndex(){
        $blogs = Blog::where('user_id', Auth::id())->get();
        return view('blogs.selfIndex', ['blogs' => $blogs]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\BlogCom
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\BlogCom
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('public/images');
        $blog = new Blog();
        $blog->title = request('title');
        $blog->body= request('body');
        $blog->user_id = Auth::user()->id;
        $blog->image = $path;
         print_r($blog);
        $blog->save();
        
        return redirect('/home')->with('success','Blog Added Successfully');
    }

   
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view("blogs.edit", compact("blog"));
    }
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->body= $request->body;
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $blog->image = $path;
        }
        // $blog->user_id = Auth::id();

        $blog->save();

        return redirect('/home');
    }


    public function show(Blog $id)
    {

        $blogcomments = Blogcomment::where('blog_id', $id->id)->get();
        // $blog = Blog::find($id);

        return view('blogs.show')->with('blog',$id)
        ->with('blogcomments' ,$blogcomments)
        ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\BlogCom
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect('/home');
    }
}
