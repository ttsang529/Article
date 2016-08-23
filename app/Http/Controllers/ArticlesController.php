<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\Article;
use App\User;
use App\Http\Requests\ArticleRequest;
use Auth;

class ArticlesController extends Controller
{
    
    //auth the controller
    /*
    public function __construct(){
        $this->middleware('auth',['only'=>'create']);
    }
    */
    public function index(){
        
        //return \Auth::user();  //show who login
        //$articles = Article::orderBy('created_at', 'desc')->get();
        $articles = Article::latest('published_at')->published()->get();
        //return view('articles.index')->with('articles',$articles);  //can use
        //return "hello world";
        return view('articles.index',compact('articles'));

    }

    public function show($id){
        $article=Article::findorFail($id);
        //$dt = Carbon::parse($article->published_at);
        //dd($article->published_at);
        // return $article;
        return view('articles.show',compact('article'));
       
    }

    public function create(){
        return view('articles.create');
       
    }

    //public function store(CreateArticleRequest $request){
    public function store(Request $request){
       $this->validate($request, ['title'=>'required|min:4','body'=>'required|min:3','published_at' =>'required|date']);
       //Auth::user()->articles()->save(new Article($request->all()));
       //Article::create($request->all());
       $article=new Article($request->all());
       Auth::user()->articles()->save($article);
       return redirect('articles');
    }

    public function edit($id){
        $article = Article::findOrFail($id);

        return view('articles.edit',compact('article'));
    }

    public function update($id,ArticleRequest $request){
        $article=Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }
}
