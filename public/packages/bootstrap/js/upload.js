$(function()
{
  // Variable to store your files
  var files;
    var allowtypes = ['gif','jpg','jpeg','png'];
    var maxsize = 2000*1024;

  // Add events
  $('input[type=file]').on('change', prepareUpload);

  // Grab the files and set them to our variable
  function prepareUpload(event)
  {
      // Get the field name
    fieldID = $(this).attr('data-field');

    files = event.target.files;
        size  = files[0]['size'];
        type  = files[0]['type'];

        sp_type = files[0]['type'].split('image/').pop().toLowerCase();

        if(jQuery.inArray(sp_type, allowtypes)!=-1 && size<=maxsize) {

       
       if (files && files[0]) {
               var reader = new FileReader();
               reader.onload = function(e) {
                   $('#'+fieldID).attr('src', e.target.result);
               }
 
               reader.readAsDataURL(event.target.files[0]);
           }
       // $("#uploadimg").attr('src',files);
       
      } else {
         alert("Image type should be jpg, jpeg, gif, or png. and Image size should be less or equal 2MB");
      }
  }

   
});