<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    protected $layout = "layouts.index";

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
        //$this->beforeFilter('auth', array('only'=>array('getIndex')));
        $this->beforeFilter('auth', array('except' => ''));
    }

	public function getIndex()
	{
        $this->layout->content = View::make('home.index');
        //return View::make('hello');
	}

}
