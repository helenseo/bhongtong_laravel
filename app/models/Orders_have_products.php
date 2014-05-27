<?php

class Orders_have_products extends \Eloquent {
	protected $fillable = [];
	protected $guarded = array('order_product_id');
    protected $primaryKey = 'order_product_id';
    public $timestamps = false;

     public function product()
     {
        return $this->belongsTo('Products', 'product_id');   
     }  
}