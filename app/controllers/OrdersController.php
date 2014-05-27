<?php

class OrdersController extends \BaseController {
    // protected $layout = "layouts.main";
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    //  protected $layout = "layouts.main";
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
	public function detail($orderid) {
		$q = Orders_have_products::with('product')->where('order_id','=',$orderid)->get();

         $this->layout = View::make('layouts.main');
		 $this->layout->content = View::make('orders.detail',array('products'=>$q,'order_id'=>$orderid));
         $this->layout->title = "Order Detail";
         
	}
	public function search($userid) {

		$start_date = Input::get('start_date');
		$end_date = Input::get('end_date');

		 $q = Orders::where('user_id','=',$userid)
		              ->where('order_added_date','>=',$start_date,'AND')
		              ->where('order_added_date','<=',$end_date,'AND')
		              ->get();

		
        echo "<table class=\"table table-bordered\">";
        echo "<thead><tr><th></th><th>Order ID</th><th>Status</th><th>Order Date</th><th>Total</th></tr></thead>";
        echo "<tbody>";
		 foreach ($q as $order)
        {
         echo "<tr>";
         echo "<td><a href=\"/orders/detail/{$order->order_id}\" class=\"iframe-popup\" data-fancybox-type=\"iframe\" target=\"_blank\">View Order</a></td><td>".$order->order_id."</td><td>".$order->order_status."</td><td>".$order->order_added_date."</td><td>".$order->amount." THB</td>";
         echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        echo $q->count()." Results";
        
	}

}