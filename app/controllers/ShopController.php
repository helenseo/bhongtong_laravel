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
      $this->beforeFilter('auth', array('only'=>array('getDashboard','getManage','getManageproducts','getEditproduct','postUpdateproduct','getAddproduct','postInsertproduct')));
      $this->beforeFilter('isenterprise', array('only'=>array('getDashboard','getManage','getManageproducts','getEditproduct','postUpdateproduct','getAddproduct','postInsertproduct')));

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
     $shop = Shops::where('shop_id','=',$shop_id)
                     ->where('ent_id','=',Auth::user()->user_id,'AND')->first();

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
                    ->withErrors(array('The Shop ID: '.$shop_id. ' is invalid or you have no access to this shop'));
     } 

    }
    
    public function getManageproducts($shop_id) {
       $shop = Shops::where('shop_id','=',$shop_id)
                     ->where('ent_id','=',Auth::user()->user_id,'AND')->first();
      if($shop) { //check if shop id is exist
       if($shop->is_approved) {
        $product_list = Products::where('shop_id','=',$shop_id)->get();
        foreach($product_list as $product) {
        	
        	$product_cats = array();
    	     if($product->categories !=NULL) {
    	     $product_cats = json_decode($product->categories);
    	     }

        	foreach($product_cats as $product_cat) {
        		$product_category = Product_categories::find($product_cat);
        		$product_categories[$product->product_id][]=$product_category->cat_name;
        	}
        	
        }

        $this->layout->header = View::make('layouts.header');
        $this->layout->content = View::make('shop.manageproducts',array('shop_id'=>$shop_id,'product_list'=>$product_list,'product_categories'=>$product_categories));
        $this->layout->title = "Manage Products"; 
        } else {
        	return Redirect::to('shop/dashboard')
                    ->withErrors(array('Shop <b>'.$shop->shop_name.'</b> has not approved yet'));
        }
      } else {
      	return Redirect::to('shop/dashboard')
                    ->withErrors(array('The Shop ID: '.$shop_id. ' is invalid or you have no access to this shop'));
      }
    }
    public function getEditproduct($shop_id,$product_id) {
    	//$product = Products::find($product_id);
      $shop = Shops::where('shop_id','=',$shop_id)
                     ->where('ent_id','=',Auth::user()->user_id,'AND')->first();
      if($shop) { //check if shop id is exist
       if($shop->is_approved) {
    	$product = Products::where('product_id','=',$product_id)
                         ->where('shop_id','=',$shop_id,'AND')->first();
        if($product) {
        	  $product_categories = Product_categories::all();
    	 $product_has_categories = array();
    	 if($product->categories !=NULL) {
    	 $product_has_categories = json_decode($product->categories);
    	 }
       $product_images =array();
       if($product->images !=NULL) {
        $product_images = json_decode($product->images);
       }
    	$this->layout->header = View::make('layouts.header');
        $this->layout->content = View::make('shop.editproduct',array('product'=>$product,'product_has_categories'=>$product_has_categories,'product_categories'=>$product_categories,'product_images'=>$product_images));
        $this->layout->title = "Edit Product"; 
        } else {
        	return Redirect::to('shop/manageproducts/'.$shop_id)
                   ->withInput()->withErrors('Invalid Product Id');
        }
        //end shop approved
       }  else {
        	return Redirect::to('shop/dashboard')
                    ->withErrors(array('Shop <b>'.$shop->shop_name.'</b> has not approved yet'));
        }
      } //end check shop 
      else {
      	return Redirect::to('shop/dashboard')
                    ->withErrors(array('The Shop ID: '.$shop_id. ' is invalid or you have no access to this shop'));
      }
    }

    public function postUpdateproduct($shop_id,$product_id) {

    $shop = Shops::where('shop_id','=',$shop_id)
                     ->where('ent_id','=',Auth::user()->user_id,'AND')->first();
    if($shop) { //check if shop id is exist
     if($shop->is_approved) {
      $product = Products::where('product_id','=',$product_id)
                         ->where('shop_id','=',$shop_id,'AND')->first();
      // $product = Products::find($product_id);
       if($product) {

       $input = Input::all();
       $rules = array('product_name'=>'required',
                      'price'=>'required|regex:/^\d+(?:\.\d{2})?$/',
                      'product_total'=>'required|integer|min:0',
       	             );
        $v = Validator::make($input, $rules);

        if($v->passes()){
            
            $product->product_name = $input['product_name'];
            $product->price = $input['price'];
            $product->product_detail = $input['product_detail'];
            $product->product_total = $input['product_total'];
            if(count(@$input['category'])) {
             $product->categories = json_encode($input['category']);
            }
            else {
            	$product->categories = NULL;
            }

            $input_product_images = array_filter(Input::file('image'));
           /*If have uploaded image */
           if(count($input_product_images)) {
            $product_images = array();
            $i=0;
            foreach ($input_product_images as $input_product_image) {
              $upload_img = UploadController::upload($input_product_image,null,null,null,'/uploads/products/');
              $upload_img = json_decode($upload_img);

             if($upload_img->filename && !empty($upload_img->filename)) {
               $product_images[$i] = $upload_img->filename;

               $i++;
              
             } else {
              return Redirect::to('shop/editproduct/'.$shop_id.'/'.$product_id)->withInput()->withErrors($upload_img->status);
             }
            }
           
            $product_images_merge = array_merge((array)json_decode($product->images), $product_images);
            $product->images = json_encode($product_images_merge);
           }
           /* End have uploaded image */
          
            $product->update();
            return Redirect::to('shop/manageproducts/'.$shop_id);
        } else {
        	return Redirect::to('shop/editproduct/'.$product_id)
                   ->withInput()->withErrors($v);
        }
       } else {
       	  return Redirect::to('shop/manageproducts/'.$shop_id.'/'.$product_id)
                   ->withInput()->withErrors('Invalid Product Id');
       }
      } // end check shop approved
      else {
        	return Redirect::to('shop/dashboard')
                    ->withErrors(array('Shop <b>'.$shop->shop_name.'</b> has not approved yet'));
        }
     } //end check shop 
      else {
      	return Redirect::to('shop/dashboard')
                    ->withErrors(array('The Shop ID: '.$shop_id. ' is invalid or you have no access to this shop'));
      }
    }

    public function getAddproduct($shop_id) {
      $shop = Shops::where('shop_id','=',$shop_id)
                     ->where('ent_id','=',Auth::user()->user_id,'AND')->first();
      if($shop) { //check if shop id is exist
       if($shop->is_approved) {
    	$product_categories = Product_categories::all();
    	$this->layout->header = View::make('layouts.header');
        $this->layout->content = View::make('shop.addproduct',array('shop_id'=>$shop_id,'product_categories'=>$product_categories));
        $this->layout->title = "Add Product"; 
        } else {
        	return Redirect::to('shop/dashboard')
                    ->withErrors(array('Shop <b>'.$shop->shop_name.'</b> has not approved yet'));
        }
      } else {
      	return Redirect::to('shop/dashboard')
                    ->withErrors(array('The Shop ID: '.$shop_id. ' is invalid or you have no access to this shop'));
      }
    }

    public function postInsertproduct($shop_id) {

      $shop = Shops::where('shop_id','=',$shop_id)
                     ->where('ent_id','=',Auth::user()->user_id,'AND')->first();

      if($shop) { //check if shop is not null
       if($shop->is_approved) { //if shop is approved 
        $input = Input::all();
        $rules = array('product_name'=>'required',
                      'price'=>'required|regex:/^\d+(?:\.\d{2})?$/',
                      'product_total'=>'required|integer|min:0',
       	             );
        $v = Validator::make($input, $rules);

        if($v->passes()){

    	$product = new Products();
        $product->product_name = $input['product_name'];
        $product->price = $input['price'];
        $product->product_detail = $input['product_detail'];
        $product->product_total = $input['product_total'];
        $product->shop_id = $shop_id;
        $product->added_date = date("Y-m-d H:i:s");
        if(count(@$input['category'])) {
          $product->categories = json_encode($input['category']);
         }
        else {
           $product->categories = NULL;
        }

        $input_product_images = array_filter(Input::file('image'));
        /*If have uploaded image */
        if(count($input_product_images)) {
          $product_images = array();
          $i=0;
            foreach ($input_product_images as $input_product_image) {
              $upload_img = UploadController::upload($input_product_image,null,null,null,'/uploads/products/');
              $upload_img = json_decode($upload_img);

             if($upload_img->filename && !empty($upload_img->filename)) {
               $product_images[$i] = $upload_img->filename;

               $i++;
              
             } else {
              return Redirect::to('shop/editproduct/'.$shop_id.'/'.$product_id)->withInput()->withErrors($upload_img->status);
             }
            }

            $product->images = json_encode($product_images);
           } else {
            $product->images = NULL;
           }
           /* End have uploaded image */
         $product->save();
         return Redirect::to('shop/manageproducts/'.$shop_id);
        } else {
        	return Redirect::to('shop/addproduct/'.$shop_id)
                   ->withInput()->withErrors($v);
        }
       } 
       else { //shop is not approved
        	return Redirect::to('shop/dashboard')
                    ->withErrors(array('Shop <b>'.$shop->shop_name.'</b> has not approved yet'));
        }
      } else { //shop is null
      	return Redirect::to('shop/dashboard')
                    ->withErrors(array('The Shop ID: '.$shop_id. 'is invalid or you have no access to this shop'));
      }
    }

}