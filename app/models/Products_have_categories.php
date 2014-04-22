<?php

class Products_have_categories extends \Eloquent {
	protected $fillable = [];
	protected $guarded = array('product_cat_id');
    protected $primaryKey = 'product_cat_id';
    public $timestamps = false;
}