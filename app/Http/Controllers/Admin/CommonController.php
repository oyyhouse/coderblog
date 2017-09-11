<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    //
    //fileupload
    public function fileupload(Request $request)
    {
        $file = $_FILES['file'];
        $fileName = rand(0,500000).dechex(rand(0,10000)).".jpg";
        $fileDirect = "/article/".$fileName;
        $path = public_path('uploads').$fileDirect;

        $result = move_uploaded_file($file['tmp_name'], $path);

        if ($result === true) {
            $response = [
                'url' => $fileDirect,
            ];
            return  $response;
        }else{
            return false;
        }
    }



}
