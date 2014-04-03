<?php

class Forgot_pass_token extends \Eloquent {
	protected $fillable = [];
	protected $guarded = array('f_pw_id');
    protected $primaryKey = 'f_pw_id';
    protected $table = 'Forgot_pass_token';
    public $timestamps = false;

}