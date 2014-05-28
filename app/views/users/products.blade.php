
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

              <div class="col-md-6">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/600x400" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/600x400" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/600x400" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

             <!-- Start Product Detail -->
              <div class="well">
                 <div>
                
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
                      <button class="btn primary">Add to Cart</button><br>
                
                </div>

                <!-- End Product Detail -->

              </div><!-- end of right side content - price and basic description -->
            </div>

       </div>
       <!--end well -->
      </div>
      <!--end wrapper -->
