 <!-- For Image uploading -->
<script type="text/javascript">
max_photos =0;
$(function()
{
  // Variable to store your files
    var files;
    var allowtypes = ['gif','jpg','jpeg','png'];
    var maxsize = 2000*1024;
     
   
  // Add events
   var input_upload = $('#upload-file');
   var input_upload_wrap = $('#upload-file-wrap');
   input_upload.on('change', prepareUpload);

   $.get("/shop/remainproductimg/{{{$product->product_id}}}",{},function(result){
        if(!isNaN(result)) {
          max_photos = result;
        }
    });


  // Grab the files and set them to our variable
  function prepareUpload(event)
  {

    var files = event.target.files;
    var output = document.getElementById("upload-result");

     output.innerHTML ='';

     if(files.length<=max_photos) {
         
         for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                
                //var  sp_type = files[i]['type'].split('images/').pop().toLowerCase();

                 sp_type = files[i]['type'].split('image/').pop().toLowerCase();

                 size = files[i]['size'];
                //Only pics
                
                  if(jQuery.inArray(sp_type, allowtypes)!=-1 && size<=maxsize) {

                    
                       var reader = new FileReader();
                      reader.onload = function(e) {

                      //$('#'+fieldID).attr('src', e.target.result);
                       var picFile = e.target;
                    
                    var div = document.createElement("div");
                    
                    div.innerHTML = "<img class='profile-pic img-rounded img-responsive'  src='" + picFile.result + "'" +
                            "title=''/>";
                    
                    output.insertBefore(div);  

                       }
                      reader.readAsDataURL(file);
                      
       // $("#uploadimg").attr('src',files);
       
               } else {

                  alert("Image type should be jpg, jpeg, gif, or png. and Image size should be less or equal 2MB");
               }    
   }

 } //if not more than 5 images
 else {
  // alert(max_photos);
   input_upload.val('');

  alert("The number of photos already reached 5 photos, please delete some photos for adding new ones");
 }
}


   
});

function deleteimg(product_id,image_index) {
   $.get("/shop/deleteproductimg/"+product_id+"/"+image_index,{},function(result){
   if(result=="Done") {
        $.get("/shop/remainproductimg/{{{$product->product_id}}}",{},function(result){
         if(!isNaN(result)) {
          max_photos = result;
         // alert(max_photos);
         }
        });
       $.get("/shop/listproductimages/"+product_id,{},function(result){
         $("#current-product-images").html(result);
        });
   }
 });


}
</script>
<div class="container">
  <div class="row">
   {{ Form::open(array('url'=>'shop/updateproduct/'.$product->shop_id.'/'.$product->product_id, 'class'=>'form-updateproduct','enctype'=>'multipart/form-data')) }}
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="well well-sm">
            <div class="row">
              <div class="col-sm-6 col-md-6">
                 <div class="input-group">
                    <p><b><i class="glyphicon glyphicon-gift"></i> Product name:</b></p>
                    {{ Form::text('product_name', $product->product_name, array('id'=>'product-name','class'=>'form-control')) }}
                 </div>
                 <div class="input-group">
                    <p><b><i class="glyphicon glyphicon-usd"></i> Price (THB):</b></p>
                    {{ Form::text('price', $product->price, array('id'=>'product-price','class'=>'form-control')) }} 
                 </div>
                 <div class="input-group">
                    <p><b><i class="glyphicon glyphicon-stats"></i> Product total:</b></p>
                    {{ Form::text('product_total', $product->product_total, array('id'=>'product-total','class'=>'form-control')) }}
                 </div>
                 <div class="input-group">
                    <p><b><i class="glyphicon glyphicon-text-height"></i> Product detail:</b></p>
                      {{ Form::textarea('product_detail',$product->product_detail,array(
                            'id'      => 'product-detail'
                            ,'rows'    => 3
                            ,'class'=>'form-control'
                        ))}}
                 </div>
                 <div class="input-group">
                      <p><b><i class="glyphicon glyphicon-list"></i> Category:</b></p>
                      @foreach($product_categories as $cat) 
                       <div class="col-sm-6 col-md-6"> 

                        {{ Form::checkbox('category[]', $cat->cat_id ,in_array($cat->cat_id,$product_has_categories) ? true : false)}} {{$cat->cat_name}}</div> 
                      @endforeach
                 </div>
                 
              </div>

              <div class="col-sm-6 col-md-6">
                  <div><p><b>Current Product Images</b></p></div>
                  <div id="current-product-images">
                   @if($product_images)
                   <?php 
                   $i=0;
                   ?>
                    @foreach($product_images as $product_image)
                    <div>
                     <img class="profile-pic img-rounded img-responsiv" src="{{{$product_image}}}" />
                      <a href="#" onclick="deleteimg({{{$product->product_id}}},{{{$i}}});" class="btn btn-default btn-success"><span class="glyphicon glyphicon-trash"></span></a><br>
                    </div>
                    <?php 
                    $i++;
                    ?>
                    @endforeach
                   @else 
                   No any product images
                   @endif
                  </div>
                  <div><p><b>Select images: </b></p></div>
                  <div id="upload-result">
                   
                  </div>
                  <div>    
                        <div id="upload-file-wrap">
                           
                            {{Form::file('image[]',array('id'=>'upload-file','data-field'=>'uploadimg_1','multiple'=>true))}}
                       </div>
                  </div>

                   

                </div>


               
            </div>

            <div class="input-group">{{ Form::submit('Edit Product', array('class'=>'btn btn-primary btn-lg'))}}
            </div>
        </div>
    </div>
  {{ Form::close() }}
  </div>
</div>