 <!-- For Image uploading -->
      {{ HTML::script('packages/bootstrap/js/upload.js') }}
     
<!-- End Image uploading -->
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
                
              </div>
               <div class="col-sm-6 col-md-6">
                  <div><p><b>Product Images</b></p></div>
                  <div>
                    <img src="http://placehold.it/380x500" id="uploadimg_1" alt="" class="profile-pic img-rounded img-responsive" ><br/>
                    <!-- Post Footer -->
                
                        <div class="span3">
                           
                            {{Form::file('image[]',array('data-field'=>'uploadimg_1'))}}
                       </div>
                  </div>

                   <div>
                    <img src="http://placehold.it/380x500" id="uploadimg_2" alt="" class="profile-pic img-rounded img-responsive" ><br/>
                    <!-- Post Footer -->
                
                        <div class="span3">
                         
                           {{Form::file('image[]',array('data-field'=>'uploadimg_2'))}}
                       </div>
                  </div>

                   <div>
                    <img src="http://placehold.it/380x500" id="uploadimg_3" alt="" class="profile-pic img-rounded img-responsive" ><br/>
                    <!-- Post Footer -->
                
                        <div class="span3">
                         
                             {{Form::file('image[]',array('data-field'=>'uploadimg_3'))}}
                       </div>
                  </div>

                   <div>
                    <img src="http://placehold.it/380x500" id="uploadimg_4" alt="" class="profile-pic img-rounded img-responsive" ><br/>
                    <!-- Post Footer -->
                
                        <div class="span3">
                            
                            {{Form::file('image[]',array('data-field'=>'uploadimg_4'))}}
                       </div>
                  </div>

                   <div>
                    <img src="http://placehold.it/380x500" id="uploadimg_5" alt="" class="profile-pic img-rounded img-responsive" ><br/>
                    <!-- Post Footer -->
                
                        <div class="span3">
                            
                            {{Form::file('image[]',array('data-field'=>'uploadimg_5'))}}
                       </div>
                  </div>

                </div>
               
            </div>
             <div class="input-group">{{ Form::submit('Add Product', array('class'=>'btn btn-primary btn-lg'))}}
            </div>
        </div>
    </div>
  {{ Form::close() }}
  </div>
</div>