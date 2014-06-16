<div>
 <h3>SHOP DASHBOARD</h3>
</div>
<div class="table-responsive">
 <table class="shopping-cart-table table table-bordered">
 <thead>
	<tr><th>Shop Name</th><th>Status</th><th></th></tr>
 </thead>
 <tbody>
 	@foreach($shop_list as $shop)
 	  
 	<tr @if(!$shop->is_approved) class="disabled" @endif>
 		<td>@if($shop->is_approved)<a href="/users/shop/{{$shop->shop_id}}" title="{{$shop->shop_name}}" target="_blank">{{$shop->shop_name}}</a>@else {{$shop->shop_name}} @endif</td><td>{{$shop->is_approved ? 'Approved' : 'Not approved'}}</td><td>@if($shop->is_approved)<a href="/shop/manage/{{$shop->shop_id}}" title="Manage Shop">Manage Shop</a>@else <span>Manage Shop</span>@endif</td>
 	</tr>
 	@endforeach
 </tbody>
 </table>
</div>
