<?php

class OrdersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
	public function search($userid) {

		$start_date = Input::get('start_date');
		$end_date = Input::get('end_date');

		 $q = Orders::where('user_id','=',$userid)
		              ->where('order_added_date','>=',$start_date,'AND')
		              ->where('order_added_date','<=',$end_date,'AND')
		              ->get();

		

        echo "<table class=\"table table-bordered\">";
        echo "<thead><tr><th>Order ID</th><th>Status</th><th>Order Date</th></tr></thead>";
        echo "<tbody>";
		 foreach ($q as $order)
        {
         echo "<tr>";
         echo "<td>".$order->order_id."</td><td>".$order->order_status."</td><td>".$order->order_added_date."</td>";
         echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        echo $q->count()." Results";

        
	}

}