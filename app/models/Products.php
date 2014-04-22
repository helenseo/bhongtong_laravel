<?php

class Products extends \Eloquent {
	protected $fillable = [];
	protected $guarded = array('product_id');
    protected $primaryKey = 'product_id';
    public $timestamps = false;
}