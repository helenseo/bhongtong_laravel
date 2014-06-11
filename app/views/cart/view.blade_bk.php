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
     <td>{{$i}}</td><td><a href="/users/products/{{$product['id']}}" target="_blank">{{ $product['product_name'] }}</a><input name="product_id[]" type="hidden" value="{{$product['id']}}" /></td><td>{{ $total_price}}</td><td><input name="product_amount[]" type="text" value="{{ Input::old('product_amount')[$j]? Input::old('product_amount')[$j]: $product['amount']}}" /></td><td><a href="/cart/delete/{{$product['id']}}">Delete</a></td>
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