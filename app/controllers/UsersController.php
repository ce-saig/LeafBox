<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//Registration form
		return View::make('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), User::$rules);
		if ($validator->passes()) {
			$user = new User;
			$user->name = Input::get('name');
			$user->email = Input::get('email');
			$user->username = Input::get('username');
			$user->password =  Hash::make(Input::get('password'));
			$user->save();
			// auto login and redirect to landing page
			$users_info = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);
			if(Auth::attempt($users_info)){
					return Redirect::to('/');
			}
		}else{
			return Redirect::to('/registration')->with('message', 'เกิดปัญหาในการสมัครสมาชิก')->withErrors($validator)->withInput();
		}

	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		if(!is_null($user))
		{
			if($user->isAdmin())
			{
				$users = User::all();
				return View::make('user.show',array('user' => $user , 'users' => $users ));
			}
			return View::make('user.show',array('user' => $user ));
		}else{
			//TODO : return 404 page
			return;
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Request::ajax())
		{

		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Request::ajax())
		{
			$user = User::find($id);
			if($user->delete()){
				return 1;
			}else{
				return 0;
			}
		}
	}

}
