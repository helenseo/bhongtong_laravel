<div class="ordering-page">
<!-- Start Order Status -->
 <div class="row shop-tracking-status"> 
    <div class="col-md-12">
        <div class="well">
            <div class="order-status">
                <div class="order-status-timeline">
                    <!-- class names: c0 c1 c2 c3 and c4 -->
                    <div class="order-status-timeline-completion c3"></div>
                </div>

                <a href="{{URL::to('orders/summary')}}">
                <div class="image-order-status image-order-status-new active img-circle">
                    <span class="status">Summary</span>
                    <div class="icon"></div>
                </div>
            	</a>
                <div class="image-order-status image-order-status-active active img-circle">
                    <span class="status">Sign in</span>
                    <div class="icon"></div>
                </div>
                <a href="{{URL::to('orders/address')}}">
                <div class="image-order-status image-order-status-intransit active img-circle">
                    <span class="status">Address</span>
                    <div class="icon"></div>
                </div>
                </a>
                <a href="{{URL::to('orders/shipping')}}">
                <div class="image-order-status image-order-status-delivered active img-circle">
                    <span class="status">Shipping</span>
                    <div class="icon"></div>
                </div>
            	</a>
            	<a href="{{URL::to('orders/payment')}}">
                <div class="image-order-status image-order-status-completed active img-circle">
                    <span class="status">Payment</span>
                    <div class="icon"></div>
                </div>
            	</a>
            </div>
        </div>
    </div>
</div>
<!-- End Order Status -->

<!-- Start Content Summary -->
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            
            <div class="row">
              <div class="text-center">
                    <h1>Shipping</h1>
                </div>
                </span>
                
                <div>Shipping Detail</div>
                    <div>
                    <span>address : </span><span>123/45</span>
                </div>
                <div>&nbsp;</div>
                <div>
                    <span>shipping method: </span>{{ Form::select('shipping_methods', $province, 'เลือกประเภทการส่งสินค้า / Select Shipping Methods',array('class'=>'form-control')) }}
                </div>
                <div>&nbsp;</div>

                <button type="button" class="btn btn-success btn-lg btn-block">
                    Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                </button>

            </div>
        </div>
    </div>
 </div>
<!-- End Content Summary -->
</div>