<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')-> with('categories' ,$categories);
    }
    public function create()
    {
        return view('categories.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\BlogCom
     */
    public function store(Request $request)
    {
        $category = new Category();

        $category->name = request('name');
        $category->user_id = Auth::user()->id;
       
        $category->save();
        
        return redirect('/home')->with('success','Category Added Successfully');
    }

    public function show(Category $id)
    {
        $categories = Category::all();
        $articles = Article::where('category_id', $id->id)->get();
        return view('categories.show')->with('articles', $id)->with('categories' ,$categories);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back();

    }
}
