   <?php 
   class UploadController extends BaseController
    {
    public $restful=true;
    
    public function index($type) {

    $valid_exts = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    $max_size = 2000 * 1024; // max file size (200kb)
    $path = public_path() . '/uploads/'; // upload directory
    $fileName = NULL;
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' )
    {
    $file = Input::file('uploaded_img');
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
    $fileName = $name;
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
    return header('Content-type: application/json') . json_encode(array('status' => $status,
    'fileName' => '/uploads/'.$fileName));
    }
    }
