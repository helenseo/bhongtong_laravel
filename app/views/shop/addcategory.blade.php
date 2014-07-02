<div class="container">
  <div class="row">
   {{ Form::open(array('url'=>'shop/insertcategory/'.$shop_id, 'class'=>'form-insertcategory')) }}
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="well well-sm">
            <div class="row">
              <div class="col-sm-6 col-md-6">
                 <div class="input-group">
                    <p><b><i class="glyphicon glyphicon-gift"></i> Category name:</b></p>
                    {{ Form::text('category_name',null, array('id'=>'category-name','class'=>'form-control')) }}
                 </div>
                 
                 <div class="input-group">
                      <p><b><i class="glyphicon glyphicon-list"></i> Parent Category:</b></p>
                      @foreach($product_categories as $product_cat) 
                       <div class="col-sm-6 col-md-6"> 
                        {{ Form::radio('parent_category', $product_cat->cat_id ,null)}} {{$product_cat->cat_name}}
                      </div> 
                      @endforeach
                 </div>
                 
              </div>

            </div>

            <div class="input-group">{{ Form::submit('Edit Category', array('class'=>'btn btn-primary btn-lg'))}}
            </div>
        </div>
    </div>
  {{ Form::close() }}
  </div>
</div>