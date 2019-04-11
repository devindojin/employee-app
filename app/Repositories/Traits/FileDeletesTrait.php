<?php

namespace App\Repositories\Traits;

use Illuminate\Support\Facades\File;

trait FileDeletesTrait
{
    /**
     * Deletes image from image path.
     *
     * @param $file_name
     *
     * @return string
     */
    public function deleteFile($file_name)
    {
        if($file_name) {
            $fileInfo = pathinfo($file_name);
        
            $dimArr = array('', '-72X72', '-370X383','-370X378', '-480X480', '-1176X1010');
        
            foreach ($dimArr as $dim) {
                $file = $fileInfo['dirname'].'/'.$fileInfo['filename'].$dim.'.'.$fileInfo['extension'];
                if(file_exists(storage_path('app/public'.$file))) {
                    File::Delete(storage_path('app/public'.$file));
                }
            }
        }
        
        return $file_name;
    }
}