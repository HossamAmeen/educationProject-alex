<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
class UploadFileController extends Controller
{
    public function uploadFile(Request $request)
    {
        if($request->hasFile('file')){
            $file = $request->file; 
            if($request->folder_name !== null){
                $folderName = $request->folder_name ; 
            }
            else
            $folderName = "images" ; 
            $path = 'uploads/'.$folderName.'/'.date("Y-m-d");
            if(!File::isDirectory($path))
            {
                File::makeDirectory($path, 0777, true, true);
            }

            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move($path, $name);

            return asset($path .'/'. $name);
        }
        else
             return "this no file";
    }
}
