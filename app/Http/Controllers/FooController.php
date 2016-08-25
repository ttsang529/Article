<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\FooRepository;

class FooController extends Controller
{

    // private $repository;

    // public function __construct(FooRepository $repository)
    // {
    //     $this->repository = $repository;
    // }



    public function foo(FooRepository $repository)
    {
        //return 'foo';
        //$repository = new \App\Repositories\FooRepository();
        //$repository=new FooRepository;
        //$abc=new FooRepository;
        //return $abc->get();
        return $repository->get();
    }

}
