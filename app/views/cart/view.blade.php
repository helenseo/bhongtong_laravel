<div>
 <h3>SHOPPING CART</h3>
</div>
@if(count($products)>0)
<table class="table table-bordered">
 <thead>
	<tr><th>No.</th><th>Product Name</th><th>Amount</th></tr>
 </thead>
 <tbody>

{{-- */$i=1;/* --}}

@foreach ($products as $product)
   <tr>
     <td>{{$i}}</td><td><a href="/users/products/{{$product['id']}}" target="_blank">{{ $product['product_name'] }}</a></td><td>{{ $product['amount']}}</td>
    </tr>
  {{-- */$i++;/* --}}
@endforeach
</tbody>
</table>

<div>
  <a href="/cart/empty" class="btn btn-large btn-primary btn-block" title="clear cart">Clear Cart</a>
</div>

@else 
EMPTY CART
@endif