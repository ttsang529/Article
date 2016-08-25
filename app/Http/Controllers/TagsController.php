<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;

class TagsController extends Controller
{
    public function show( Tag $tag)
    {
        //dd('hello world');
        //return $tag;
        //return $tag->articles;
        //$articles=$tag->articles; //sometime not published() , it will get failed
        $articles=$tag->articles()->published()->get();
        return view('articles.index',compact('articles'));
    }
}
