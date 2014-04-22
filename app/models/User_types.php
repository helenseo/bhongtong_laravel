<?php

class User_types extends \Eloquent {
	protected $fillable = [];
	protected $guarded = array('user_type_id');
    protected $primaryKey = 'user_type_id';
    public $timestamps = false;


   public static function userTypeName($user_type_id) {
    
     $user_type_query =  self::where('user_type_id', '=', $user_type_id);

    if($user_type_query->count()) {
       return $user_type_query->first()->user_type;
     } else {
      return false;
     }
  }
}