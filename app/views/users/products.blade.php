<script type="text/javascript">
function addtocart(id) {
 $.post("/cart/add/"+id,{},function(result){
   if(result=="Done") {
    $.post("/cart/check/",{},function(result){
     $("#check-cart").html(result);
    });
   }
 });
}
</script>

<div class="product-wrap">

<!-- Start location bar -->
        <ul class="breadcrumb">
            <li><a href="dashboard">Home</a> <span class="divider"></span></li>
            <li><a href="shoptype">Shoptype</a> <span class="divider"></span></li>
            <li><a href="../shop/{{$product->shop_id}}">shop</a> <span class="divider"></span></li>
            <li><b>products</b> <span class="divider"></span></li>
        </ul>
<!-- End location bar -->

              <!-- Title & Description -->
              <h1>{{$product->product_name}}</h1>
               <div class="list-group" id="check-cart">
                 @if(count(Session::get('cart'))>0) 
                   <a href="/cart/view/" title="view cart" target="_blank">View Cart </a>
                 @else 
                   Empty Cart
                 @endif
                </div>
            

             <!-- Start Product Detail -->
              <div class="well col-md-12">
                  @if($product_images)
              <div class="col-md-6">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              {{-- */$i=1;/* --}}
                              @foreach($product_images as $product_image) 
                                  <li {{$i==1?'class="active"':''}} data-target="#carousel-example-generic" data-slide-to="0"></li>
                               {{-- */$i++;/* --}}
                              @endforeach
                               
                            </ol>
                            
                            <div class="carousel-inner">
                              {{-- */$i=1;/* --}}
                              @foreach($product_images as $product_image) 
                                <div class="item {{$i==1?'active':''}}">
                                    <img class="slide-image" src="{{$product_image}}" alt="">
                                </div>
                              {{-- */$i++;/* --}}
                              @endforeach
                               
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                 @endif
                 <div class="col-md-6">
                
                    <h4>Detail Product</h4>
                  <div class="span6">
                    <p>
                      @if(isset($product->product_detail))
                      {{$product->product_detail}}
                      @else 
                        No detail
                      @endif
                    </p>
                  </div>

                
                <div class="cleaner_h10"></div>

                <div>
                
                <span>
                  <b>Item Location:</b>
                </span>
                <span class="span6">
                 {{$shop_address}}
                </span>
                
                <div class="cleaner_h10"></div>                
                
               
                  <span class="span2">
                    <b>Added DateTime:</b>
                  </span>
                  <span class="time">{{$product->added_date}}</span>
                
                <div class="cleaner_h10"></div>
                
                  <span class="span2">
                    <b>Product Status:</b>
                  </span>
                    <span class="status">
                    @if($product->is_soldout) 
                    Sold out
                    @else 
                      @if($product->is_approved) 
                       Available
                       @endif

                    @endif
                    </span>
                
                <div class="cleaner_h10"></div>

                <div>
                  <span class="col-sm-6" style="margin-top:30px;"></span>

                      <h4 style="display:inline;">฿{{$product->price}}</h4> &nbsp;&nbsp;
                      <button class="btn primary" onclick="addtocart({{$product->product_id}});">Add to Cart</button><br>
                
                </div>

                <!-- End Product Detail -->

              </div><!-- end of right side content - price and basic description -->
            </div>

       </div>
       <!--end well -->
      </div>
      <!--end wrapper -->
