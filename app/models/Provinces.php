<?php

class Provinces extends \Eloquent {
	protected $fillable = [];
	protected $primaryKey = 'province_id';

 public function region()
    {
        return $this->belongsTo('Regions', 'region_id');   
    }  
 /**
    *Make provinces with each province's region such as Central is BKK's region for selector
    *
   */
 public static function makeProvinceRegion() {

  	$provinces= self::with('region')->get();
    $province_selector = array();
    $province_selector[0] = 'เลือกจังหวัด / select province';

    foreach($provinces as $province) {
       
     $province_selector[$province->region->region_name][$province->province_id] = $province->province_name;
   }

    return $province_selector;
   }

}