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

                public function addBraille($bookId){
                  $braille = new Braille();
                  
                  $braille->book()->associate(Book::find($bookId));
                  $braille->produced = date('Y-m-d');
                  $braille->save();
                }

                public function addCassette($bookId){
                  $amount = Input::get('amount');
                  $cassette = new Cassette();
                  $cassette->produced_date = date('Y-m-d');
                  $cassette->book()->associate(Book::find($bookId));
                  $cassette->save();

                  for($i=1; $i<=$amount; $i++){
                    $cassetteDetail = new Cassettedetail();
                    $cassetteDetail->part = $i;
                    $cassetteDetail->cassette()->associate($cassette);
                    $cassetteDetail->save();
                  }
                }

                public function addDaisy(){
                }
                public function addCD(){
                }
                public function addDVD(){
                }
	}
?>
