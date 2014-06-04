<?php

class CartController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	//protected $layout ="layouts.main";
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
	public function update()
	{
		//
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
       	 return Redirect::to('cart/view')->withInput()->withErrors('Please input only number!');
   
       }



       $i++;
       }

        Session::put('cart', $cart);

        return Redirect::to('cart/view');
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

	public function add($product_id) {
		//$arr_cart[$product_id]=1;

    /*
       $arr_cart[$product_id]=1;

       Session::put('cart',$arr_cart);

       $value = Session::get('cart');

        print_r($value);
		
	*/
        try {
         $cart = Session::get('cart');

        if(isset($cart[$product_id])) {
        	$cart[$product_id]++;
        } else {
        	$cart[$product_id]=1;
        }


        Session::put('cart', $cart);
        	
        echo "Done";
       
        } catch (Exception $e)
        {
        echo "Fail";
       }

        
       // Session::forget('cart');

	 }
    public function view() {
    	$cart = Session::get('cart');
        $products = array();
    	if(isset($cart)) {
    	 
         foreach($cart as $product_id => $total) {
         	
    		$product = Products::find($product_id);

    		$products[] = array('product_name'=>$product->product_name,'price'=>$product->price,'amount'=>$total,'id'=>$product_id);
    		
          //echo "ID:".$product_id."&nbsp;Name: ".$product->product_name."&nbsp;Total:".$total."<br />";
    	}
    	//print_r($products);
    	
         
    	
       } //if session "cart" is defined 

        $this->layout = View::make('layouts.main');
         $this->layout->header = View::make('layouts.header');
         $this->layout->content = View::make('cart.view',compact('products'));
         $this->layout->title = "Shopping Cart";
    }

    public function check() {
      if(null!==Session::get('cart')) {
      	echo "<a href=\"/cart/view/\" title=\"view cart\" target=\"_blank\">View Cart </a>";
      } else {
      	echo "Empty cart";
      }  
    }

    public function deleteitem($product_id) {
    	$cart = Session::get('cart');
    	if(isset($cart[$product_id])) {
    		unset($cart[$product_id]);
    		Session::put('cart', $cart);
    		return Redirect::to('cart/view');
    	} else {
    		return Redirect::to('cart/view')->withErrors("Have no this product");
    	}
    }

    public function emptycart() {
    	Session::forget('cart');
    	return Redirect::to('cart/view');
    }
}