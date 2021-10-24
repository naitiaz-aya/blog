<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Blogcomment;

class BlogcommentController extends Controller
{
    public function store(Request $request)
    {

        $blogcomment = new Blogcomment();

        $blogcomment->description = request('description');
        $blogcomment->user_id = Auth::id();
        $blogcomment->blog_id = request('blog_id');

        $blogcomment->save();

        return redirect()->back();

    }

    public function show(Blogcomment $id)
    {
        return view('blogs.show')->with('blogcomments', $id);
    }

    public function destroy($id)
    {
        $blogcomment = Blogcomment::findOrFail($id);
        $blogcomment->delete();

        return redirect()->back();

    }
}
