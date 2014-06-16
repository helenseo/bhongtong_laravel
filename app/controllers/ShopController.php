<?php

class ShopController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $layout = "layouts.main";
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
	  $shop_list = Shops::where('ent_id','=',Auth::user()->user_id)->get();

	  
      $this->layout->header = View::make('layouts.header');
      $this->layout->content = View::make('shop.dashboard',compact('shop_list'));
      $this->layout->title = "Shop Dashboard"; 
    }

    public function getManage($shop_id) {
      $this->layout->header = View::make('layouts.header');
      $this->layout->content = View::make('shop.manage',array('shop_id'=>$shop_id));
      $this->layout->title = "Manage Shop"; 
    }

    public function getManageproducts($shop_id) {
      $product_list = Products::where('shop_id','=',$shop_id)->get();
      $this->layout->header = View::make('layouts.header');
      $this->layout->content = View::make('shop.manageproducts',compact('product_list'));
      $this->layout->title = "Manage Products"; 
    }

}