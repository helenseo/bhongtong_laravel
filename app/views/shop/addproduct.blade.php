<div class="container">
  <div class="row">
   {{ Form::open(array('url'=>'shop/insertproduct/'.$shop_id, 'class'=>'form-updateproduct','enctype'=>'multipart/form-data')) }}
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="well well-sm">
            <div class="row">
              <div class="col-sm-6 col-md-6">
                 <div class="input-group">
                    <p><b><i class="glyphicon glyphicon-gift"></i> Product name:</b></p>
                    {{ Form::text('product_name', null, array('id'=>'product-name','class'=>'form-control')) }}
                 </div>
                 <div class="input-group">
                    <p><b><i class="glyphicon glyphicon-usd"></i> Price (THB):</b></p>
                    {{ Form::text('price', null, array('id'=>'product-price','class'=>'form-control')) }} 
                 </div>
                 <div class="input-group">
                    <p><b><i class="glyphicon glyphicon-stats"></i> Product total:</b></p>
                    {{ Form::text('product_total', null, array('id'=>'product-total','class'=>'form-control')) }}
                 </div>
                 <div class="input-group">
                    <p><b><i class="glyphicon glyphicon-text-height"></i> Product detail:</b></p>
                      {{ Form::textarea('product_detail',null,array(
                            'id'      => 'product-detail'
                            ,'rows'    => 3
                            ,'class'=>'form-control'
                        ))}}
                 </div>
                 <div class="input-group">
                      <p><b><i class="glyphicon glyphicon-list"></i> Category:</b></p>
                      @foreach($product_categories as $cat) 
                       <div class="col-sm-6 col-md-6"> 

                        {{ Form::checkbox('category[]', $cat->cat_id ,null)}} {{$cat->cat_name}}</div> 
                      @endforeach
                 </div>
                 <div class="input-group">{{ Form::submit('Edit Product', array('class'=>'btn btn-primary btn-lg'))}}
                 </div>
              </div>
               
            </div>
        </div>
    </div>
  {{ Form::close() }}
  </div>
</div>