<!-- Start JS -->
<script type="application/javascript">
jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldID = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('#'+fieldID).val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('#'+fieldID).val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('#'+fieldID).val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldID = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('#'+fieldID).val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('#'+fieldID).val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('#'+fieldID).val(0);
        }
    });
});

</script>
<!-- End JS -->
<div class="ordering-page">
<!-- Start Order Status -->
 <div class="row shop-tracking-status"> 
    <div class="col-md-12">
        <div class="well">
            <div class="order-status">
                <div class="order-status-timeline">
                    <!-- class names: c0 c1 c2 c3 and c4 -->
                    <div class="order-status-timeline-completion c1"></div>
                </div>

                <div class="image-order-status image-order-status-new active img-circle">
                    <span class="status">Summary</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-active active img-circle">
                    <span class="status">Sign in</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-intransit active img-circle">
                    <span class="status">Address</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-delivered active img-circle">
                    <span class="status">Shipping</span>
                    <div class="icon"></div>
                </div>
                <div class="image-order-status image-order-status-completed active img-circle">
                    <span class="status">Payment</span>
                    <div class="icon"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Order Status -->

<!-- Start Content Summary -->
<div class="container summary">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            
            <div class="row">
              <div class="text-center">
                    <h1>Summary</h1>
                </div>
                </span>
            @if(count($products)>0)
             {{ Form::open(array('url'=>'orders/updatesummary')) }}
              <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                          	<th class="text-center">Product</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Unit Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                {{-- */$i=0;$total_price_all=0;/* --}}
                @foreach ($products as $product)
                <?php
                $total_price = $product['price']*$product['amount'];

                $total_price_all =$total_price_all + $total_price;
               ?>
                        <tr>
                          <td class="col-md-7 text-center"><em><img class="thumbnail-image" src="http://placehold.it/100x120" alt="" /></em></td>
                            <td class="col-md-5"><a href="/users/products/{{$product['id']}}" target="_blank">{{ $product['product_name'] }}</a><input name="product_id[]" type="hidden" value="{{$product['id']}}" /></td>
                            <td class="col-md-2 text-center">{{ $product['price']}}<strong>THB</strong></td>
							<td class="col-md-2 text-center">
						     	<input type='text' id="amount_input_{{$i}}" name="product_amount[]" type="text" class="qty" value="{{ Input::old('product_amount')[$i]? Input::old('product_amount')[$i]: $product['amount']}}" />
						     	<button value='-' field='amount_input_{{$i}}' class="qtyminus btn btn-default btn-success btn-sm"><span class="glyphicon glyphicon-minus"></span></button>
							    <button type='button' value='+' field='amount_input_{{$i}}' class="qtyplus btn btn-default btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span></button>
						    </td>
                            <td class="col-md-2 text-center">{{$total_price}}<strong>THB</strong></td>
                            <td class="col-md-2 text-center">
                            <a href="/orders/deletesummary/{{$product['id']}}" class="btn btn-default btn-success"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                @endforeach
                        
                        <tr>
                          <td>&nbsp;</td>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p>
                           </td>
                            <td class="text-center">&nbsp;</td>
                            <td class="text-center"><p><strong>{{$total_price_all}} THB</strong> </p>
                          <p> <strong>-</strong></p></td>
                            <td class="text-center">
                            <p>&nbsp;</p></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger">&nbsp;</td>
                            <td class="text-center text-danger"><strong>{{$total_price_all}} THB</strong></td>
                            <td class="text-center text-danger"><h4>&nbsp;</h4></td>
                        </tr>
                    </tbody>
                </table>
               </div>
               {{ Form::submit('Update', array('class'=>'btn btn-success btn-lg btn-block'))}}
                <button type="button" class="btn btn-success btn-lg btn-block">
                    Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                </button>
              {{ Form::close() }}
              @else 
              No item
              @endif
            </div>
        </div>
    </div>
</div>
<!-- End Content Summary -->
</div>