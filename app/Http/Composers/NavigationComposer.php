<?php namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use App\Article;


class NavigationComposer {


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function compose(View $view)
    {
          $view->with('latest',Article::latest()->first());
    }
}