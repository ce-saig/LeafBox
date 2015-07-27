<?php

class HomeController extends Controller {

	public function index() {
		$books = Book::where("id",">=",1)->get();
		$books_all = DB::table('book')->orderBy('created_at', 'desc')->take(100)->get();
		//$books_all = Book::all();
		return View::make('library.index',array('books' => $books , 'books_all' => $books_all ));
	}

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function showAuthen()
	{
		return View::make('library.authen');
	}

	public function doLogin()
	{

		$rules = array(
			'email'    => 'required|email',
			'password' => 'required|alphaNum|min:3'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {

			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			if (Auth::attempt($userdata)) {
				return Redirect::to('/');
			} else {
				return Redirect::to('authentication');
			}

		}
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}
