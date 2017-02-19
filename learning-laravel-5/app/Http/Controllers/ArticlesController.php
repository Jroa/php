<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Http\Requests;

class ArticlesController extends Controller
{
  public function index(){
    
    $articles = Article::all();

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
}
