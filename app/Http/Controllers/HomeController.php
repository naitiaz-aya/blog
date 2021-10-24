<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Blog;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editblog()
    {
        $blogs = Blog::all();
        return view('blogs.edit')->with('blogs' , $blogs);
    }
    public function dashboard()
    {
        $users = User::all();
        return View::make('admin.dashboard')->with('users', $users);
    }
    public function admin()
    {
        return View::make('admin.profile');
    }
    public function index()
    {
        $blogs = Blog::all();
        return view('home')->with('blogs' , $blogs);
    }
    public function articles()
    {
        $articles = Article::all();
        
        return view('articles.index')->with('articles' , $articles);
    }
}
