<?php

// Database using namespace
use Library\Books;
use Library\Member;
use Library\Braille;
use Library\Brailleborrow;
use Library\Cassette;
use Library\Cassettedetail;
use Library\Cassetteborrow;
use Library\Cd;
use Library\Cddetail;
use Library\Cdborrow;
use Library\Daisy;
use Library\Daisydetail;
use Library\Daisyborrow;
use Library\Dvd;
use Library\Dvddetail;
use Library\Dvdborrow;

class LibraryController extends BaseController {

    public function __construct() {
        $this->beforeFilter(function() {
            if(!Session::has('current-user')) {
                return Redirect::to('/library/login');
            }
        }, array('except' => array('getLogin', 'postLogin')));

      $admin = Session::get('current-user');
    }

    //################## Auth ##################

    public function getLogin() {
		$fail = false;
		$data = array(
			'fail' => $fail,
		);
        return View::make('library.login', $data);
    }

    public function postLogin() {
        $email = Input::get('email');
        $password = Input::get('password');

        $admin = User::where('email', $email)
                    ->where('password', sha1($password))
                    ->where('role', 'admin')
                    ->first();

        if(!$admin) {
			$data = array(
				'message' => 'E-mail or password is incorrect.',
				'email'   => $email,
			);
            return View::make('library.login', $data);
        }
        Session::put('current-user', $admin);

		$continue = url('/library');
		if(Input::has('continue')) {
			$continue = Input::get('continue');
		}
        return Redirect::to($continue);
    }

    public function anyLogout() {
        Session::flush();
        return Redirect::to('/');
    }





    //################## Main ##################

	public function anyIndex() {
		return Redirect::to('/library/book-list');
		// $books = Books::all();
		// $data = array(
		// 	'books' => $books,
		// 	'index' => "book",
		// );
		// return View::make('library.book.book-list', $data);
	}

	//############### Book ################

	public function anyBook() {
		if(!Input::has('book_id')) {
			return $this->anyBookList();
		}
		else {
			return $this->anyBookDetail();
		}
	}

	public function anyBookList() {

		$search = "";
		if(!Input::has('search')) {
			$books = Books::all();
		} else {
			$search = Input::get('search');
			$books = Books::where('TITLE', 'LIKE', '%'.$search.'%')->get();
		}

		$data = array(
			'books' => $books,
			'search' => $search,
			'index' => "book",
		);
		return View::make('library.book.book-list', $data);
	}

	public function anyBookDetail() {
		if(!Input::has('book_id')) die('Not Found');
		$book_id = Input::get('book_id');
		$book = Books::find($book_id);
		$data = array(
			'book' => $book,
		);
		return View::make('library.book.book-detail', $data);
	}

	public function getBookAdd() {

		$lastBook = "I".str_pad(Books::all()->count()+1, 4, "0", STR_PAD_LEFT);
		$data = array(
			'lastBook' => $lastBook,
		);

		return View::make('library.book.book-add', $data);
	}

	public function postBookAdd() {

		if(!(Input::has('TITLE'))) return Redirect::to('/library/product-add');

		$current_user = Session::get('current-user');

		$book = new Books();
		$book['IBOOK_NO'] = Input::get('IBOOK_NO');
		$book['ISBN'] = Input::get('ISBN');
		$book['TITLE'] = Input::get('TITLE');
		$book['AUTHOR'] = Input::get('AUTHOR');
		$book['TRANSLATE'] = Input::get('TRANSLATE');
		$book['PAGES'] = Input::get('PAGES');
		$book['GRADE'] = Input::get('GRADE');
		$book['STATUS'] = Input::get('STATUS');
		$book['BTYPE'] = Input::get('BTYPE');
		$book['BM_STATUS'] = Input::get('BM_STATUS');
		$book['SETCM_STATUS'] = Input::get('SETCM_STATUS');
		$book['SETDM_STATUS'] = Input::get('SETDM_STATUS');
		$book['SETCD_STATUS'] = Input::get('SETCD_STATUS');
		$book['SETDVD_STATUS'] = Input::get('SETDVD_STATUS');

		$book->save();

		return Redirect::to('/library/book');

	}

	public function getBookEdit() {
		if(!Input::has('book_id')) die('Not Found');
		$book_id = Input::get('book_id');
		$book = Books::find($book_id);

		$data = array(
			'book' => $book,
		);
		return View::make('library.book.book-edit', $data);
	}

	public function postBookEdit() {
		if(!Input::has('book_id')) die('Not Found');
		$book_id = Input::get('book_id');
		$book = Books::find($book_id);

		$book['IBOOK_NO'] = Input::get('IBOOK_NO');
		$book['ISBN'] = Input::get('ISBN');
		$book['TITLE'] = Input::get('TITLE');
		$book['AUTHOR'] = Input::get('AUTHOR');
		$book['TRANSLATE'] = Input::get('TRANSLATE');
		$book['PAGES'] = Input::get('PAGES');
		$book['GRADE'] = Input::get('GRADE');
		$book['STATUS'] = Input::get('STATUS');
		$book['BTYPE'] = Input::get('BTYPE');
		$book['BM_STATUS'] = Input::get('BM_STATUS');
		$book['SETCM_STATUS'] = Input::get('SETCM_STATUS');
		$book['SETDM_STATUS'] = Input::get('SETDM_STATUS');
		$book['SETCD_STATUS'] = Input::get('SETCD_STATUS');
		$book['SETDVD_STATUS'] = Input::get('SETDVD_STATUS');

		$book->save();

		return Redirect::to('/library/book-edit?book_id='.$book_id);

	}

	public function anyBookRemove() {

	}


	// ################ Borrow #############
	
	public function anyBorrow() {

		$search = "";
		if(!Input::has('search')) {
			$books = Books::all();
		} else {
			$search = Input::get('search');
			$books = Books::where('TITLE', 'LIKE', '%'.$search.'%')->get();
		}

		$data = array(
			'books' => $books,
			'search' => $search,
			'index' => "borrow",
		);
		return View::make('library.borrow-list', $data);
	}

	//############### Member ################

	public function anyMemberList() {

		if(!Input::has('search')) {
			$members = Member::all();
		} else {
			$search = Input::get('search');
			$members = Member::where('NAME', 'LIKE', '%'.$search.'%')->get();
		}

		$data = array(
			'members' => $members,
			'index' => 'member',
		);
		return View::make('library.member.member_list', $data);
	}

	public function anyMember() {
		if(!Input::has('member_id')) {
			return $this->anyMemberList();
		}
		else {
			return $this->anyMemberEdit();
		}
	}

	public function getMemberAdd() {
		$roles = array(
			'super-admin' => "Super Admin",
			'admin'       => "Admin",
			'user'        => "User",
		);

		$data = array(
			'roles' => $roles,
		);
		return View::make('library.member.member_add', $data);
	}

	public function postMemberAdd() {
		$name    = Input::get('NAME');
		$phone = Input::get('PHONE_NO');

		if($name && $phone) {
			if(Member::where('NAME', $name)->get()->count() == 0) {
				$member = new Member();
				$member['NAME']  	= Input::get('NAME');
				$member['GENDER']    	= Input::get('GENDER');
				$member['ADDRESS']   = Input::get('ADDRESS');
				$member['DISTRICT']        = Input::get('DISTRICT');
				$member['PROVINCE_POSTCODE']   = Input::get('PROVINCE_POSTCODE');
				$member['MEMBER_STATUS']   = Input::get('MEMBER_STATUS');
				$member['PHONE_NO']   = Input::get('PHONE_NO');
				$member->save();
			}
		}

		return Redirect::to('/library/member-list');
	}

	public function getMemberEdit() {
		if(!Input::has('member_id')) {
			return Redirect::to('/library/member-list');
		}

		$member_id = Input::get('member_id');
		$member = Member::find($member_id);
		
		$roles = array(
			'super-admin' => "Super Admin",
			'admin'       => "Admin",
			'user'        => "User",
		);

		$data = array(
			'member' => $member,
			'roles' => $roles,
			'index' => 'member',
		);
		return View::make('library.member.member_edit', $data);
	}

	public function postMemberEdit() {
		if(Input::has('member_id')) {
			$name    = Input::get('NAME');
			$phone = Input::get('PHONE_NO');
			if($name && $phone) {
				$member_id = Input::get('member_id');
				$member = Member::find($member_id);
				$member['NAME']  	= Input::get('NAME');
				$member['GENDER']    	= Input::get('GENDER');
				$member['ADDRESS']   = Input::get('ADDRESS');
				$member['DISTRICT']        = Input::get('DISTRICT');
				$member['PROVINCE_POSTCODE']   = Input::get('PROVINCE_POSTCODE');
				$member['MEMBER_STATUS']   = Input::get('MEMBER_STATUS');
				$member['PHONE_NO']   = Input::get('PHONE_NO');
				$member->save();
			}
		}
		return Redirect::to('/library/member-list');
	}

	public function anyMemberRemove() {
		if(Input::has('member_id')) {
			$member_id = Input::get('member_id');
			$member = Member::find($member_id);
			$member->delete();
		}
		return Redirect::to('/library/member-list');
	}

	public function getBookDetail() {
		if(Input::has('book_id')) {
			$book_all = Books::all();
			$book_id = Input::get('book_id');
			$type = Input::get('type');
			$book = Books::find($book_id);
			$member = Member::all();

			if(Input::has('order_id')) {
				$order = Input::get('order_id');
			} else {
				$order = 0;
			}

			if($type == "cassette") {
				if($book->cassette->count() > 0) {
					$detail = $book->cassette[$order];
					$navigation = $book->cassette();
					$borrow = Cassetteborrow::firstOrNew(array('parent_id' => (string)$detail->id));
					$borrow->parent_id = (string)$detail->id;
					$borrow->save();
				}
			} else if($type == "cd") {
				if($book->cd->count() > 0) {
					$detail = $book->cd[$order];
					$navigation = $book->cd();
					$borrow = Cdborrow::firstOrNew(array('parent_id' => (string)$detail->id));
					$borrow->parent_id = (string)$detail->id;
					$borrow->save();
				}
			} else if($type == "daisy") {
				if($book->daisy->count() > 0) {
					$detail = $book->daisy[$order];
					$navigation = $book->daisy();
					$borrow = Daisyborrow::firstOrNew(array('parent_id' => (string)$detail->id));
					$borrow->parent_id = (string)$detail->id;
					$borrow->save();
				}
			} else if($type == "dvd") {
				if($book->dvd->count() > 0) {
					$detail = $book->dvd[$order];
					$navigation = $book->dvd();
					$borrow = Dvdborrow::firstOrNew(array('parent_id' => (string)$detail->id));
					$borrow->parent_id = (string)$detail->id;
					$borrow->save();
				}
			} else {
				if($book->braille->count() > 0) {
					$detail = $book->braille[$order];
					$navigation = $book->braille();
					$borrow = Brailleborrow::firstOrNew(array('parent_id' => (string)$detail->id));
					$borrow->parent_id = (string)$detail->id;
					$borrow->save();
				}
			}

			// No detail
			if(!isset($detail)) {
				return Redirect::to('/library/detail-add?book_id='.$book_id.'&type='.$type.'&order_id=0');
			}

			$data = array(
				'book_all' => $book_all,
				'book' => $book,
				'type'	=> $type,
				'detail' => $detail,
				'navigation' => $navigation,
				'order' => $order,
				'members' => $member,
				'index' => 'book',
			);
			return View::make('library.detail.detail', $data);
		} else {
			return Redirect::to('/library/book-list');
		}
	}

	public function postBookDetail() {
		if(Input::has('book_id')) {

			$id = Input::get('id');
			$type = Input::get('type');
			$book_id = Input::get('book_id');

			if(Input::has('order_id')) {
				$order = Input::get('order_id');
			} else {
				$order = 0;
			}

			if($type == "cassette") {
				$detail = Cassette::find($id);
				$addPart = new Cassettedetail();
			} else if($type == "cd") {
				$detail = Cd::find($id);
				$addPart = new Cddetail();
			} else if($type == "daisy") {
				$detail = Daisy::find($id);
				$addPart = new Daisydetail();
			} else if($type == "dvd") {
				$detail = Dvd::find($id);
				$addPart = new Dvddetail();
			} else {
				$detail = Braille::find($id);
			}
			// BOOK
			$detail['IBOOK_NO'] = Input::get('book_id');
			$detail['RESERVED'] = Input::get('reserve');
			$detail['PRODUCED_DATE'] = Input::get('PRODUCED_DATE');
			if($type != "braille") $detail['NOTES'] = Input::get('NOTES');
			else $detail['EXAMINER'] = Input::get('EXAMINER');
			
			$detail['NUMPART'] = Input::get('NUMPART');
			$detail->save();
			// Reserve
			$detail->borrow->MEMBER_NO = Input::get('member_id');
			$detail->borrow->BORROWED_DATE = Input::get('BORROWED_DATE');
			$detail->borrow->RETURNED_DATE = Input::get('RETURNED_DATE');
			$detail->borrow->save();

			// More Parts Details 
			if(Input::has('part')) {
				$parts = Input::get('part');
				foreach ($parts as $part => $status) {
					$partDetail = $detail->detail()->where('id', '=', $part)->first();
					$partDetail['STATUS'] = $status['status'];
					$partDetail['NOTES'] = $status['notes'];
					$partDetail->save();
				}
			}
			if(Input::has('addpart')) {
				$parts = Input::get('addpart');
				$countPart = $detail->detail()->count();
				foreach ($parts as $part => $status) {
					++$countPart;
					$addPart['parent_id'] = $id;
					$addPart['PART'] = $countPart;
					$addPart['STATUS'] = $status['status'];
					$addPart['NOTES'] = $status['notes'];
					$addPart->save();
				}
			}

			return Redirect::to('/library/book-detail?book_id='.$book_id.'&type='.$type.'&order_id='.$order);
		} else {
			return Redirect::to('/library/book-list');
		}
	}

	public function getDetailAdd() {
		if(Input::has('book_id')) {
			$book_all = Books::all();
			$book_id = Input::get('book_id');
			$type = Input::get('type');
			$order = Input::get('order_id');
			$book = Books::find($book_id);
			$member = Member::all();


			if($type == "cassette") {
				$lastDetail = "C".str_pad(Cassette::all()->count()+1, 4, "0", STR_PAD_LEFT);
			} else if($type == "cd") {
				$detail = new Cd();
				$lastDetail = "CD".str_pad(Cd::all()->count()+1, 4, "0", STR_PAD_LEFT);
			} else if($type == "daisy") {
				$lastDetail = "D".str_pad(Daisy::all()->count()+1, 4, "0", STR_PAD_LEFT);
			} else if($type == "dvd") {
				$lastDetail = "D".str_pad(Dvd::all()->count()+1, 4, "0", STR_PAD_LEFT);
			} else {
				$lastDetail = "B".str_pad(Braille::all()->count()+1, 4, "0", STR_PAD_LEFT);
			}

			$data = array(
				'book_all' => $book_all,
				'book' => $book,
				'type'	=> $type,
				'order' => $order,
				'members' => $member,
				'last' => $lastDetail,
				'index' => 'book',
			);
			return View::make('library.detail.detail-add', $data);
		} else {
			return Redirect::to('/library/book-list');
		}
	}

	public function postDetailAdd() {
		if(Input::has('book_id')) {

			$type = Input::get('type');
			$book_id = Input::get('book_id');
			$order = Input::get('order_id');

			if($type == "cassette") {
				$detail = new Cassette();
				$detailCount['count'] = str_pad(Cassette::all()->count()+1, 4, "0", STR_PAD_LEFT);
				$detailCount['id'] = "C".$detailCount['count'];
				$addPart = new Cassettedetail();
				$borrow = new Cassetteborrow;
			} else if($type == "cd") {
				$detail = new Cd();
				$detailCount['count'] = str_pad(Cd::all()->count()+1, 3, "0", STR_PAD_LEFT);
				$detailCount['id'] = "CD".$detailCount['count'];
				$addPart = new Cddetail();
				$borrow = new Cdborrow;
			} else if($type == "daisy") {
				$detail = new Daisy();
				$detailCount['count'] = str_pad(Daisy::all()->count()+1, 3, "0", STR_PAD_LEFT);
				$detailCount['id'] = "D".$detailCount['count'];
				$addPart = new Daisydetail();
				$borrow = new Daisyborrow;
			} else if($type == "dvd") {
				$detail = new Dvd();
				$detailCount['count'] = str_pad(Dvd::all()->count()+1, 3, "0", STR_PAD_LEFT);
				$detailCount['id'] = "DVD".$detailCount['count'];
				$addPart = new Dvddetail();
				$borrow = new Dvdborrow;
			} else {
				$detail = new Braille();
				$borrow = new Brailleborrow;
			}

			// BOOK
			$detail['id'] = $detailCount['id'];
			$detail['IBOOK_NO'] = Input::get('book_id');
			$detail['RESERVED'] = Input::get('reserve');
			$detail['PRODUCED_DATE'] = Input::get('PRODUCED_DATE');
			if($type != "braille") $detail['NOTES'] = Input::get('NOTES');
			else $detail['EXAMINER'] = Input::get('EXAMINER');
			
			$detail['NUMPART'] = Input::get('NUMPART');
			$detail->save();
			// Reserve

			// Borrow
			$borrow['parent_id'] = $detailCount['id'];
			$borrow['MEMBER_NO'] = Input::get('member_id');
			$borrow['BORROWED_DATE'] = Input::get('BORROWED_DATE');
			$borrow['RETURNED_DATE'] = Input::get('RETURNED_DATE');
			if(is_null(Input::get('member_id'))) {
				$borrow['MEMBER_NO'] = "0";
				$borrow['BORROWED_DATE'] = "0000-00-00";
				$borrow['RETURNED_DATE'] = "0000-00-00";
			}
			$borrow->save();

			// More Parts Details 
			if(Input::has('addpart')) {
				$parts = Input::get('addpart');
				$countPart = $detail->detail()->count();
				foreach ($parts as $part => $status) {
					++$countPart;
					$addPart['parent_id'] = $detailCount['id'];
					$addPart['PART'] = $countPart;
					$addPart['STATUS'] = $status['status'];
					$addPart['NOTES'] = $status['notes'];
					$addPart->save();
				}
			}

			return Redirect::to('/library/book-detail?book_id='.$book_id.'&type='.$type.'&order_id='.$order);
		} else {
			return Redirect::to('/library/book-list');
		}
	}


}
