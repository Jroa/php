<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Article;
//use App\Http\Requests;
use Carbon\Carbon;
use Request;

class ArticlesController extends Controller
{
  public function index(){
    
    //$articles = Article::all();
    $articles = Article::latest('published_at')->get();

    return view('articles.index', compact('articles'));
    //return view('articles.index')->with('articles',$articles);
  } 

  public function show($id){
    $article = Article::findOrFail($id);

    //if (is_null($article)){
    //  abort(404);
    //}

    return view('articles.show', compact('article'));
  }   

  public function create(){
    return view ('articles.create');
  }

  public function store(){
    $input = Request::all();
    //$input = Request::get('title');
    //$input = Request::get('body');
    $input['published_at'] = Carbon::now();

    Article::create($input);

    return redirect('articles');
  }
}
