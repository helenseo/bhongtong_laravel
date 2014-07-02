<div>
 <h3>Manage Categories</h3>
</div>
<div><a href="/shop/addcategory/{{$shop_id}}" title="add category">Add Category</a></div>
<div class="table-responsive">
 <table class="shopping-cart-table table table-bordered">
 <thead>
	<tr><th>Category Name</th><th>Parent Category</th><th></th></tr>
 </thead>
 <tbody>
 	@foreach($categories_list as $cat)
 	  
 	<tr>
 		<td><a href="/shop/category/{{$shop_id}}/{{$cat->cat_id}}" title="{{$cat->cat_name}}" target="_blank">{{$cat->cat_name}}</a></td>
 		<td><a href="/shop/category/{{$shop_id}}/{{$cat->parent_cat}}" title="{{$cat->parent_cat_name}}" target="_blank">{{$cat->parent_cat_name}}</a></td>
 		<td><a href="/shop/editcategory/{{$shop_id}}/{{$cat->cat_id}}" target="_blank" title="Edit product">Edit Category</a>&nbsp;&nbsp;<a href="/shop/deletecategory/{{$shop_id}}/{{$cat->cat_id}}" class="btn btn-default btn-success"><span class="glyphicon glyphicon-trash"></span></a></td>
 	</tr>
 	@endforeach
 </tbody>
 </table>
</div>
