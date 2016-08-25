<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\Article;
use App\User;
use App\Http\Requests\ArticleRequest;
use Auth;
use Session;
use Flash;
use App\Tag;

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
        $latest=Article::latest()->first();
        return view('articles.index',compact('articles','latest'));

    }
 



    public function show(Article $article){
        //$article is replace on RouteServiceProvide    $router->model('articles','App\Article'); so $id can get $article directly
        //$article=Article::findorFail($id);

        //$dt = Carbon::parse($article->published_at);
        //dd($article->published_at);
        // return $article;
        return view('articles.show',compact('article'));
       
    }

    public function create(){
        //redirect if not auth
        
        if (Auth::guest()){
            return redirect('articles');
        };
        
        $tags=Tag::lists('name','id');
        return view('articles.create',compact('tags'));
       
    }

    //public function store(CreateArticleRequest $request){
    public function store(Request $request){
       $this->validate($request, ['title'=>'required|min:4','body'=>'required|min:3','published_at' =>'required|date']);
       //Auth::user()->articles()->save(new Article($request->all()));
       //Article::create($request->all());
       //dd($request->input('tags')); //test result array
       $article = Auth::user()->articles()->create($request->all());//1 to 1 to create
       //or \Session::put('flash_message','You article has been created!');
       //\Session::flash('flash_message','You article has been created!'); //if no use Session on timezone_open
      
    //or
       //$article=new Article($request->all());
       //Auth::user()->articles()->save($article);

       /*  //replace by redirect with
       session()->flash('flash_message','Your article has been created');
       session()->flash('flash_message_important',true);
       return redirect('articles');
       
       
       return redirect('articles')->with([
           'flash_message'=> 'Your article has been created',
           'flash_message_important'=>true
       ]);
        */

        //flash('Your article has been created');
        //flash()->success('Your article has been created');
        //flash()->overlay('Your article has been successfully create','Good Job');
        $tagIds= $request->input('tag_list');
        $article->tags()->attach($tagIds);//many to many use attach by id
        flash('You are create success')->important();
        return redirect('articles');

    }

    //public function edit($id){
    public function edit(Article $article){
        //$article = Article::findOrFail($id);
        //$article is replace on RouteServiceProvide
        $tags = Tag::lists('name','id');

        //dd($article->tag_list);
        return view('articles.edit',compact('article','tags'));
    }

    //public function update($id,ArticleRequest $request){
    public function update(Article $article,ArticleRequest $request){
        //$article=Article::findOrFail($id);
        $article->update($request->all());
        //dd($request->all());
        //$tagIds= $request->input('tag_list');
        //dd($tagIds);
        //$article->tags()->sync($tagIds);//many to many use attach by id
        //use function to replace
        //dd($request->input('tag_list'));
        $this->syncTags($article,(array)$request->input('tag_list'));
        flash('You are update success')->important();
        return redirect('articles');
    }


    public function syncTags(Article $article ,array $tags=[]){
        //dd($tags);
        if (is_null($tags)){
            $tag_all=Tag::lists('id')->toarray();
            $article->tags()->detach($tag_all);
        }else{
            $article->tags()->sync($tags);
        }
    }

}
