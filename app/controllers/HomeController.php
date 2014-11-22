<?php

class HomeController extends Controller {

	public function index() {
		$books = Book::all();
		return View::make('library.index',array('books' => $books ));
	}

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
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
				return " Email : ".Input::get('email')." Password :  ".Input::get('password');
			}

		}
	}

	public function doLogout()
	{
		Auth::logout(); 
		return Redirect::to('/'); 
	}


}
