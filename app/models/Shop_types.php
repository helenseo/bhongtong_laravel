<?php

class Shop_types extends \Eloquent {
	protected $fillable = [];
	protected $primaryKey = 'shop_type_id';

 public static function makeShoptypes_list() {
 	$shop_types = self::all();

    $shop_type_selector[0] = 'เลือกประเภทร้านค้า';

    foreach($shop_types as $shop_type) {
      $shop_type_id = $shop_type['shop_type_id'];
      $shop_type_selector[$shop_type_id]=$shop_type['shop_type_name'];   
     }

     return $shop_type_selector;
 }
}