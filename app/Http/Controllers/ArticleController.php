<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Category;
use App\Models\Articlecomment;
use App\Models\Usersubscription;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

class ArticleController extends Controller
{
	public function index()
	{
		$now = Carbon::now();
		$iduser = Auth::id();
		
		$usersub = Usersubscription::where('user_id', Auth::id())
			->where('end_date', '>', $now)
			->get();

			$articles = Article::where('id_sub',$usersub[0]->type_sub)->get();

		$categories = Category::all();
		if($articles){
		return view('articles.index', ['articles' => $articles, 'categories' => $categories]);
		}else{
			
				return redirect('/home');

		}
		// var_dump($usersub[0]->type_sub);
		// var_dump($articles);
	}


	public function selfIndex()
	{
		$articles = Article::where('user_id', Auth::id())->get();
		return view('articles.selfIndex', ['articles' => $articles]);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\ArticleCom
	 */
	public function create()
	{
		$categories = Category::all();
		$subscriptions = Subscription::all();
		return view('articles.create')->with('categories', $categories)
			->with('subscriptions', $subscriptions);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\ArticleCom
	 */
	public function store(Request $request)
	{
		$path = $request->file('image')->store('public/images');

		$article = new Article();

		$article->title = $request->title;
		$article->body = $request->body;
		$article->category_id = $request->category_id;
		$article->user_id = Auth::id();
		$article->id_sub = $request->id_sub;
		$article->image = $path;

		$article->save();

		return redirect('/Articles')->with('success', 'Article Added Successfully');
	}

	public function edit(Request $request, $id)
	{
		$article = Article::find($id);
		$categories = Category::all();
		return view("articles.edit", compact("article", "categories"));
	}

	public function update(Request $request, $id)
	{
		$article = Article::find($id);

		$article->title = $request->title;
		$article->body = $request->body;
		$article->category_id = $request->category_id;
		if ($request->hasFile('image')) {
			$request->validate([
				'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
			]);
			$path = $request->file('image')->store('public/images');
			$article->image = $path;
		}
		$article->save();

		return redirect('/articles')->with('article', $id);
	}


	public function show(Article $id)
	{
		// $article = Article::find($id);
		// $now = Carbon::now();
		// $iduser = Auth::id();
		$articlecomments = Articlecomment::where('article_id', $id->id)->get();
		$categories = Category::all();
		// $usersub = Usersubscription::where('user_id', $iduser)
		// 	->where('type_sub', $article->id_sub)
		// 	->where('end_date', '>', $now)
		// 	->get();
		
		// var_dump($usersub->type_sub);
		// if ($article) {

			return view('articles.show')
				->with('article',$id)
				->with('articlecomments', $articlecomments)
				->with('categories', $categories)
		;
			// print($article);
		// } else {

		// 	if ($usersub) {
		// 		return view('articles.show')
		// 			->with('article', $id)
		// 			->with('articlecomments', $articlecomments)
		// 			->with('categories', $categories);
		// 	} else {
		// 		return redirect('/home');
		// 	}
		// }
		// dd($article);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Article  $article
	 * @return \Illuminate\Http\ArticleCom
	 */

	public function destroy($id)
	{
		$article = Article::findOrFail($id);
		$article->delete();

		return redirect()->back();
	}

	public function profile()
	{
		$articles = Article::where('user_id', Auth::id())->get();
		return view("articles.profile", compact("articles"));
	}
}
