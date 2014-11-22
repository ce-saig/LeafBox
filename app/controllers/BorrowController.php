<?php
	class BorrowController extends Controller{		
		
		public function addBorrow(){
			return View::make('borrow');
		}
		
		public function findBorrow(){//array('isbn','title','author','translate')
				$type = Input::get('type');
				$keyword = Input::get('search');
				$Books = Book::where($type,'LIKE','%'.$keyword.'%')->get();	
				$arr['Books']=$Books;

				return View::make('borrow')->with($arr);
		}
		
		public function showBook($table,$id){
			$Data = DB::table($table)->where('id',$id)->first();
			//return var_dump($Books);
			//exit();
			$arr['Data']=$Data;
			return View::make($table)->with($arr);
			
		}
		
}