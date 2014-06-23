<?php

class OrdersController extends \BaseController {
    // protected $layout = "layouts.main";
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

	public function postUpdatesummary() {
		 $input = Input::all();

       $products_id = $input['product_id'];
       $products_amount = $input['product_amount'];
       
       $i=0;

        $cart = Session::get('cart');

       while($i<count($products_id)) {
       
        $product_id = $products_id[$i];
        $product_amount = $products_amount[$i];
        if(is_numeric($product_amount)) {
        	$product_amount=(int)$product_amount;
        }
       	if(is_int($product_amount)) {

         if($product_amount > 0) {
        	
         $cart[$product_id]=$product_amount;
         }else {
       	unset($cart[$product_id]);
         } 
      
       } else {
       	 return Redirect::to('orders/summary')->withInput()->withErrors('Please input only number!');
   
       }



       $i++;
       }

        Session::put('cart', $cart);

        return Redirect::to('orders/summary');
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
		//$q = Orders_have_products::with('product')->where('order_id','=',$orderid)->get();
         $orders = Orders::find($orderid);
         $order_products = json_decode($orders->products); 

          foreach($order_products as $products) {
        	$product = Products::where('product_id','=',$products->product_id)->get(array('product_name'))->first(); 	
            
            $products->product_name = $product->product_name;

            //echo $products->product_name ;
        }
         $this->layout = View::make('layouts.main');
		 $this->layout->content = View::make('orders.detail',array('products'=>$order_products,'order_id'=>$orderid));
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

	public function getSummary() {
	  $cart = Session::get('cart');
        $products = array();
    	if(isset($cart)) {
    	 
         foreach($cart as $product_id => $total) {
         	
    		$product = Products::find($product_id);

    		$products[] = array('product_name'=>$product->product_name,'price'=>$product->price,'amount'=>$total,'id'=>$product_id);
     	}
    	
       } //if session "cart" is defined 
      $this->layout->header = View::make('layouts.header');
      $this->layout->content = View::make('orders.summary',compact('products'));
      $this->layout->title = "Order Summary";
  	} 

  	public function getAddress() {
  		$province = Provinces::makeProvinceRegion();
      $this->layout->header = View::make('layouts.header');
      $this->layout->content = View::make('orders.address',compact('province'));
      $this->layout->title = "Order Address";
  	} 

  	public function getShipping() {
  		$province = Provinces::makeProvinceRegion();
      $this->layout->header = View::make('layouts.header');
      $this->layout->content = View::make('orders.shipping',compact('province'));
      $this->layout->title = "Shipping";
  	}

  	public function getPaymentmethod() {
      $this->layout->header = View::make('layouts.header');
      $this->layout->content = View::make('orders.paymentmethod');
      $this->layout->title = "Payment Methods";
  	}  

  	public function getPayment() {
      $this->layout->header = View::make('layouts.header');
      $this->layout->content = View::make('orders.payment');
      $this->layout->title = "Order Payment";
  	} 

  	public function getDeletesummary($product_id) {
  		$cart = Session::get('cart');
    	if(isset($cart[$product_id])) {
    		unset($cart[$product_id]);
    		Session::put('cart', $cart);
    		return Redirect::to('orders/summary');
    	} else {
    		return Redirect::to('orders/summary')->withErrors("Have no this product");
    	}
  	}



}