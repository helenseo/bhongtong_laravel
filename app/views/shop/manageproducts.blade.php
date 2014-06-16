<div>
 <h3>Manage Products</h3>
</div>
<div class="table-responsive">
 <table class="shopping-cart-table table table-bordered">
 <thead>
	<tr><th>Product Name</th><th>Status</th><th>Price</th><th>Amount</th><th>Sold out</th><th>Added date</th><th></th></tr>
 </thead>
 <tbody>
 	@foreach($product_list as $product)
 	  
 	<tr @if(!$product->is_approved || $product->is_banned) class="disabled" @endif>
 		<td>@if($product->is_approved)<a href="/users/products/{{$product->product_id}}" title="{{$product->product_name}}" target="_blank">{{$product->product_name}}</a>@else {{$product->product_name}} @endif</td><td>{{$product->is_approved ? 'Approved' : 'Not approved'}}</td><td>{{$product->price}}</td><td>{{$product->product_total}}</td><td>{{$product->is_soldout? 'Yes' : 'No'}}</td><td>{{$product->added_date}}</td><td><a href="#" title="Edit product">Edit product</a></td>
 	</tr>
 	@endforeach
 </tbody>
 </table>
</div>
