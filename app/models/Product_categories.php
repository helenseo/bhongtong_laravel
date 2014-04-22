<?php

class Product_categories extends \Eloquent {
	protected $fillable = [];
	protected $guarded = array('cat_id');
    protected $primaryKey = 'cat_id';
    public $timestamps = false;

    protected $table = 'product_categories';

}