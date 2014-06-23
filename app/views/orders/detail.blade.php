<div>
 <p><b>Order ID:</b> {{$order_id}}</p>
</div>

<table class="table table-bordered">
 <thead>
	<tr><th>No.</th><th>Product Name</th><th>Amount</th></tr>
 </thead>
 <tbody>
 {{-- */$i=1;/* --}}
@foreach ($products as $product)
    <tr>
     <td>{{$i}}</td><td>{{ $product->product_name }}</td><td>{{ $product->amount}}</td>
    </tr>
  {{-- */$i++;/* --}}
@endforeach
</table>