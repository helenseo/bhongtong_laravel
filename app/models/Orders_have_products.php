<?php

class Orders_have_products extends \Eloquent {
	protected $fillable = [];
	protected $guarded = array('order_product_id');
    protected $primaryKey = 'order_product_id';
    public $timestamps = false;
}