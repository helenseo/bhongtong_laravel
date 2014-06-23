   <?php 
   class UploadController extends BaseController
    {
    public $restful=true;
    
    public static function Upload($file,$type,$valid_exts,$max_size,$path_uploaded) {
   
    if(empty($valid_exts) || !$valid_exts) {
    $valid_exts = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    }

    if(empty($max_size) || !$max_size) {
    $max_size = 2000 * 1024; // max file size (200kb)
    }
    if(empty($path) || !$path) {
    $path ='/uploads/'; // upload directory
    } 

    $path =  public_path() . $path_uploaded;

    $fileName = NULL;
    if ($file)
    {
    // get uploaded file extension
    //$ext = $file['extension'];
    $ext = $file->guessClientExtension();
    // get size
    $size = $file->getSize();
    // looking for format and size validity
    $name = time()."-".$file->getClientOriginalName();
     if (in_array($ext, $valid_exts) AND $size < $max_size)
     {
    // move uploaded file from temp to uploads directory
      if($type=="profile") {
       $image_uploaded=Image::make($file->getRealPath())->resize(200, 200, true, false)->save($path.$name);
      } else {
        $image_uploaded = $file->move($path,$name);
      }
    
      if ($image_uploaded)
      {
      $status = 'Image successfully uploaded!';
      $fileName = $path_uploaded.$name;
      }
      else {
      $status = 'Upload Fail: Unknown error occurred!';
      }
     }
     else {
     $status = 'Upload Fail: Unsupported file format or It is too large to upload!';
     }
    }
    else {
    $status = 'Bad request!';
    }
    // echo out json encoded status
    //return header('Content-type: application/json') . json_encode(array('status' => $status,
    //'fileName' => '/uploads/'.$fileName));

    return json_encode(array('status' => $status,'filename' => $fileName));
     }
    }
