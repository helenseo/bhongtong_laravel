<!-- Start JS -->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
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

<div>
 <h3>SHOPPING CART</h3>
</div>
@if(count($products)>0)
 {{ Form::open(array('url'=>'cart/update')) }}
 <table class="table table-bordered">
 <thead>
	<tr><th>No.</th><th>Product Name</th><th>Price</th><th>Amount</th><th></th></tr>
 </thead>
 <tbody>

{{-- */$i=1;$j=0;/* --}}

@foreach ($products as $product)
<?php
 $total_price = $product['price']*$product['amount'];
?>
    <tr>
     <td>{{$i}}</td>
     <td><a href="/users/products/{{$product['id']}}" target="_blank">{{ $product['product_name'] }}</a><input name="product_id[]" type="hidden" value="{{$product['id']}}" /></td>
     <td>{{ $total_price}}</td>
     <td>
     	<input type="text" id="amount_input_{{$i}}" name="product_amount[]" type="text" class="qty" value="{{ Input::old('product_amount')[$j]? Input::old('product_amount')[$j]: $product['amount']}}" />
     	<button value="-" field="amount_input_{{$i}}" class="qtyminus btn btn-default btn-success btn-sm"><span class="glyphicon glyphicon-minus"></span></button>
	    <button type="button" value="+" field="amount_input_{{$i}}" class="qtyplus btn btn-default btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span></button>
     </td>

     <td align="center">
     	<a href="/cart/delete/{{$product['id']}}" class="btn btn-default btn-success"><span class="glyphicon glyphicon-trash"></span>
     	</a>
     </td>
    </tr>


  {{-- */$i++;$j++;/* --}}
@endforeach
 <tr>
 	<td colspan="5"> {{ Form::submit('Update Cart', array('class'=>'btn btn-large btn-primary btn-block'))}}
</td>
 </tr>
</tbody>
</table>
 {{ Form::close() }}

<div>

  <a href="/cart/empty" class="btn btn-primary btn-block" title="clear cart">Clear Cart</a>
</div>

@else 
EMPTY CART
@endif