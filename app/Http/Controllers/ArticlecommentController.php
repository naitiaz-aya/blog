<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Articlecomment;
use App\Models\Article;

class ArticlecommentController extends Controller
{
    //
    public function store(Request $request)
    {

        $articlecomment = new Articlecomment();
        

        $articlecomment->description = request('description');
        $articlecomment->user_id = Auth::id();
        $articlecomment->article_id = request('article_id');

        $articlecomment->save();

        return redirect()->back();
    }

    public function show(Articlecomment $id)
    {
        return view('articles.show')->with('articlecomments', $id);
    }
    
    public function destroy($id)
    {
        $articlecomment = Articlecomment::findOrFail($id);
        $articlecomment->delete();

        return redirect()->back();

    }
}
