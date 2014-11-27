<?php


class Member extends Eloquent {

  //protected $connection = 'mysql2-library';
  
	protected $table = 'MEMBER';

  protected $primaryKey = 'MEMBER_NO';

	//Relations
	// public function tags()        { return $this->morphToMany('Tag', 'taggable'); }
	
	// public function product()    { return $this->hasMany('product'); }
	// public function projects()    { return $this->belongsToMany('Project', 'project_member', 'user_id', 'project_id')->where('project.removed', '0'); }
	// public function knowledges()  { return $this->hasMany('Knowledge', 'author_id')->where('knowledge.removed', '0'); }
	// public function activities()  { return $this->belongsToMany('Activity', 'activity_user', 'user_id', 'activity_id')->where('activity.removed' ,'0'); }
	
 //    public function needs()       { return $this->hasMany('Post', 'owner_id')->where('type', 'need'); }
 //    public function offers()      { return $this->hasMany('Post', 'owner_id')->where('type', 'offer'); }
	// public function need_offers() { return $this->hasMany('Post', 'owner_id')->whereIn('type', array('need', 'offer')); }
	
	// public function coaches()     { return $this->belongsToMany('User', 'user_relation', 'user_id',  'owner_id')->where('type', 'coach'); }
	// public function coachees()    { return $this->belongsToMany('User', 'user_relation', 'owner_id', 'user_id' )->where('type', 'coach'); }
	// public function follows()     { return $this->belongsToMany('User', 'user_relation', 'user_id',  'owner_id')->where('type', 'follow'); }
	// public function followers()   { return $this->belongsToMany('User', 'user_relation', 'owner_id', 'user_id' )->where('type', 'follow'); }
	
 //    //Image
	// public function dir() {
	// 	return public_path()."/upload/users/".$this->id;
	// }
	
	// public function getImage() {
	// 	if(empty($this->image)) {
	// 		return url('/images/mockup/user.png');
	// 	}
	// 	return $this->image;
	// }
	
	// public function setImage($file) {
	// 	$image_dir = $this->dir().'/images/';
	// 	$ext = $file->getClientOriginalExtension();
	// 	$filename  = md5(rand(0, 1000).$file->getClientOriginalName()).".".$ext;
		
	// 	if(!is_dir($image_dir))  File::makeDirectory($image_dir, $mode = 0777, true, true);
	// 	$file->move($image_dir,$filename);
		
	// 	$this->image = url('/upload/users/'.$this->id.'/images/'.$filename);
	// 	return $this->image;
	// }

}