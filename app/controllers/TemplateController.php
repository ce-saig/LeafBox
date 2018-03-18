<?php

class TemplateController extends HomeController
{
	public function getTemplate() {
  		$view_path = 'templates/' . Input::get('path');
		if (View::exists($view_path)) {
			return View::make($view_path);
		}

		App::abort(404);
	}
}