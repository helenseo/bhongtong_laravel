<?php

class Shops extends \Eloquent {
	protected $fillable = [];
	protected $guarded = array('shop_id');
    protected $primaryKey = 'shop_id';
    public $timestamps = false;
}