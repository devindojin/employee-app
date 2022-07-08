<?php

namespace App\Repositories\Traits;

use Illuminate\Support\Facades\File;

trait FileUploadsTrait
{
    /**
     * Uploads file and image.
     *
     * @param $request
     * @param $file_input_name
     * @param $dimentions array
     *
     * @return string
     */
    public function uploadFile($request, $file_input_name)
    {

        if ($request->file($file_input_name)) {
            // File upload path
            $returnFilePath = 'uploads/' . date('Y') . '/' . date('m') . '/' . date('d');
            $fileUploadPath = storage_path('app/public/') . $returnFilePath;

            // Converting file name to lower case and white spaces with underscores
            $time = time().uniqid();
            $filename = $time.'.'.strtolower(preg_replace('/\s+/', '_', rawurldecode($request->file($file_input_name)->getClientOriginalExtension())));

            if (! File::isDirectory($fileUploadPath)) {
                // Creating directory structure
                File::makeDirectory($fileUploadPath, 0775, true);
            }
            
            $path = $request->file($file_input_name)->move($fileUploadPath,$filename);

            return $returnFilePath.'/'.$filename;
        }

        return $request->get($file_input_name);
    }
}