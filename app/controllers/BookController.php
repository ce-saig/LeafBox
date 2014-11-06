<?php
	class BookController extends Controller{
		public function newBook(){
			return View::make('newBook');
		}
		public function postBook(){
			$Book = new Book;
			$Book->isbn = Input::get('isbn');
			$Book->title = Input::get('title');
			$Book->author = Input::get('author');
			$Book->save();
			return Redirect::to('add');
		}
	}
?>