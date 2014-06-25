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

<!-- Start location bar -->
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="dashboard">Home</a> <span class="divider"></span></li>
            <li><a href="shoptype">Shoptype</a> <span class="divider"></span></li>
            <li><b>shop</b> <span class="divider"></span></li>
        </ul>
<!-- End location bar -->

        <div class="row">

            <div class="col-md-3">
                 <div class="list-group" id="check-cart">
                 @if(count(Session::get('cart'))>0) 
                   <a href="/cart/view/" title="view cart" target="_blank">View Cart </a>
                 @else 
                   Empty Cart
                 @endif
                </div>
                <p class="lead">{{$shop->shop_name}}</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">About us</a>
                    <a href="#" class="list-group-item">Contact</a>
                    <a href="#" class="list-group-item">Products</a>
                    <a href="#" class="list-group-item">Promotions</a><br/>
                    <h4>Map</h4>
                     <iframe height="280" style="width:100%;"></iframe>
               </div>


            </div>

            <div class="col-md-9">
                <div class="products-list row">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
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
            <!-- start Products -->
                    @foreach($products as $product)
                      <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="../products/{{$product->product_id}}">
                               @if(!empty($product_thumbs[$product->product_id]))
                                <img src="{{{$product_thumbs[$product->product_id]}}}" alt="">
                               @else
                                <img src="http://placehold.it/320x150" alt="">
                                @endif
                            </a>
                            {{ Form::open(array('url'=>'users/addtocart', 'class'=>'form-products')) }}
                            <div class="caption">
                                <h4 class="pull-right">฿ {{$product->price}}</h4>
                                <h4><a href="../products/{{$product->product_id}}">{{$product->product_name}}</a></h4>
                                
                                <p class="pdetail">{{$product->product_detail}}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><a href="products">reviews</a></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                                <button type="button" class="btn btn-large btn-primary btn-block" onclick="addtocart({{$product->product_id}});">
                                Add to Cart</button>
                               
                            </div>
                            {{ Form::close() }}
                        </div>
                      </div>
                          

                    @endforeach
                   
            <!-- End Product -->
                </div>
            </div>

        </div>
    </div>
    
