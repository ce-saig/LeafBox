<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
class User extends Eloquent implements UserInterface, RemindableInterface  {
	protected $table = 'users';
	public static $rules = array(
    'name'=>'required|alpha_space|min:2',
    'email'=>'required|email|unique:users',
    'password'=>'required|alpha_num|between:6,12|confirmed',
    'password_confirmation'=>'required|alpha_num|between:6,12',
    );

    public static $messages = array(
    'same'    => ':attribute และ :other มีค่าไม่ตรงกัน',
    'size'    => ':attribute จะต้องมีขนาดไม่เกิน :size.',
    'between' => ':attribute จะต้องมีขนาดอยู่ระหว่าง :min - :max.',
    'in'      => 'ค่าของ :attribute ต้องมีค่าอยู่ใน :values',
    'required' => 'ไม่ได้ใส่ค่า :attribute โปรดกรูณากรอกให้ครบ <br/>'
	);

		/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
	    return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
	    return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
	    return $this->email;
	}

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	public function isAdmin()
	{
		if($this->role == 'admin')return true;
		return false;
	}

}
