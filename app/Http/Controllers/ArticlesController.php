<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Article;


class ArticlesController extends Controller
{
    //
    public function index(){
        

        //$articles = Article::orderBy('created_at', 'desc')->get();
        $articles = Article::latest('published_at')->published()->get();
        //return view('articles.index')->with('articles',$articles);  //can use
        //return "hello world";
        return view('articles.index',compact('articles'));

    }

    public function show($id){
        $article=Article::findorFail($id);
        //$dt = Carbon::parse($article->published_at);
        dd($article->published_at);
        // return $article;
        return view('articles.show',compact('article'));
       
    }

    public function create(){
        return view('articles.create');
       
    }

    public function store(Request $request){
       $input=$request->all();
       //return $input;
       Article::create($input);
       return redirect('articles');
    }
}
