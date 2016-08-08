<?php
namespace App\Model;


class File extends \Illuminate\Database\Eloquent\Model 
{
   // protected $fillable = ['user_id', 'filename', 'src'];
    
    public function upload()
    {
        $file = $_FILES['fileToUpload'];
        // dump($file);
        if($file['error'] > 0) {
        echo "<script>
                alert('Image Error');
            </script>";
        }

        if(!is_uploaded_file($file['tmp_name'])) {
             echo "<script>
        alert('Already uploaded');
        
        </script>";
        }

        $newName = uniqid('', true);
        
        $newName = str_replace('.', '', $newName);
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName .= '.'.$ext;
        move_uploaded_file($file['tmp_name'], IMG_PATH.$newName);
       return $newName;
    }
    
    
}