<?php

class Orders extends \Eloquent {
	protected $fillable = [];
	protected $guarded = array('order_id');
    protected $primaryKey = 'order_id';
    public $timestamps = false;
}