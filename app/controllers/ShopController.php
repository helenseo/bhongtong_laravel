<?php

class ShopController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $layout = "layouts.main";
	public function __construct() {
	  $this->beforeFilter('csrf', array('on'=>'post'));
      $this->beforeFilter('auth', array('only'=>array('getDashboard','getManage','getManageproducts')));

	}
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getDashboard() {
	  if(Auth::user()->is_enterprise) {
	  $shop_list = Shops::where('ent_id','=',Auth::user()->user_id)->get();

	  
      $this->layout->header = View::make('layouts.header');
      $this->layout->content = View::make('shop.dashboard',compact('shop_list'));
      $this->layout->title = "Shop Dashboard"; 
      } else {
      	echo "You are not enterprise, please register enterprise firstly";
      }
    }

    public function getManage($shop_id) {
     $shop = Shops::find($shop_id);

     if($shop) { //check if shop id is exist
     
      if($shop->is_approved) {
     
       $this->layout->header = View::make('layouts.header');
       $this->layout->content = View::make('shop.manage',array('shop_id'=>$shop_id));
       $this->layout->title = "Manage Shop"; 
      } else {
     	return Redirect::to('shop/dashboard')
                    ->withErrors(array('Shop <b>'.$shop->shop_name.'</b> has not approved yet'));
      }
     } else {
    	return Redirect::to('shop/dashboard')
                    ->withErrors(array('Have no shop id: '.$shop_id));
     } 

    }

    private function makeproductcategories($product_id) {
     $product_categories = array();
     $product_cats = Products_have_categories::where('product_id','=',$product_id)->get();
        	foreach($product_cats as $product_cat) {
        		$product_categories[]=$product_cat->cat_id;
            }

        return $product_categories;
    }
    
    public function getManageproducts($shop_id) {
      $shop = Shops::find($shop_id);
      if($shop) { //check if shop id is exist
       if($shop->is_approved) {
        $product_list = Products::where('shop_id','=',$shop_id)->get();
        foreach($product_list as $product) {
        	
        	$product_cats = Products_have_categories::with('category')->where('product_id','=',$product->product_id)->get();
        	foreach($product_cats as $product_cat) {
        		$product_categories[$product->product_id][]=$product_cat->category->cat_name;
        	}
        	
        }

        $this->layout->header = View::make('layouts.header');
        $this->layout->content = View::make('shop.manageproducts',array('product_list'=>$product_list,'product_categories'=>$product_categories));
        $this->layout->title = "Manage Products"; 
        } else {
        	return Redirect::to('shop/dashboard')
                    ->withErrors(array('Shop <b>'.$shop->shop_name.'</b> has not approved yet'));
        }
      } else {
      	return Redirect::to('shop/dashboard')
                    ->withErrors(array('Have no shop id: '.$shop_id));
      }
    }
    public function getEditproduct($product_id) {
    	$product_categories = Product_categories::all();
    	$product = Products::find($product_id)->first();
    	$product_has_categories = self::makeproductcategories($product_id);
    	
    	$this->layout->header = View::make('layouts.header');
        $this->layout->content = View::make('shop.editproduct',array('product'=>$product,'product_has_categories'=>$product_has_categories,'product_categories'=>$product_categories));
        $this->layout->title = "Edit Product"; 
    }

}