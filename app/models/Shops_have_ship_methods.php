<?php

class Shops_have_ship_methods extends \Eloquent {
	protected $fillable = [];
	protected $primaryKey = 'shop_ship_id';
  
  public function shipping_methods() {
  	return $this->belongsTo('Shipping_methods', 'ship_method_id');
  }

  public static function makeShipping_methods_list($shop_id) {
  	$shipping = self::with('shipping_methods')->where('shop_id','=',$shop_id)->get();
    $shipping_methods_selector[0] = 'เลือกรูปแบบการส่งของ';

    foreach($shipping as $ship) {
      $shop_ship_id = $ship->shop_ship_id;
      $shipping_methods_selector[$shop_ship_id] = $ship->shipping_methods->ship_method_name." - ".$ship->rate." THB";
    }
    
    return $shipping_methods_selector;
  }
}
