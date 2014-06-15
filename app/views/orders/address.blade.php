<!-- Start Order Status -->
<div class="ordering-page">
 <div class="row shop-tracking-status"> 
    <div class="col-md-12">
        <div class="well">
            <div class="order-status">
                <div class="order-status-timeline">
                    <!-- class names: c0 c1 c2 c3 and c4 -->
                    <div class="order-status-timeline-completion c2"></div>
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
                    <h1>Address</h1>
                </div>
                </span>


                <div class="wrapper-form panel-body" >
		           {{ Form::open(array('url'=>'users/register', 'class'=>'form-register', 'name'=>'register', 'id'=>'register')) }}
		           <div class="input-group">
		             <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i> ที่อยู่ / Address:</span>
		          {{ Form::textarea('detail', '
1. Test Detail
2. Test Detail
3. Test Detail
4. Test Detail
5. Test Detail
		          ',array(
		              'id'      => 'description'
		              ,'rows'    => 6
		              ,'class'=>'form-control'
		          ))}}
		          </div>
		          <div class="input-group">
		             <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i> จังหวัด / Province:</span>
		          {{ Form::select('province', $province, 'เลือกจังหวัด / select province',array('class'=>'form-control')) }}
		          </div>

		          <div class="input-group">
		             <span class="input-group-addon"> รหัสไปรษณีย์ / zipcode:</span>
		          {{ Form::text('zipcode', null,  array('id'=>'zipcode', 'class'=>'form-control', 'placeholder'=>'รหัสไปรษณีย์ / zipcode')) }}
		          </div>

		          <div class="input-group">
		             <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i> เบอร์ติดต่อ / Tel:</span>
		          {{ Form::text('tel', null,  array('id'=>'tel', 'class'=>'form-control', 'placeholder'=>'เบอร์ติดต่อ / Tel')) }}
		          </div>
		          {{ Form::close() }}
		    	</div>


                <button type="button" class="btn btn-success btn-lg btn-block">
                    Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Content Summary -->
</div>