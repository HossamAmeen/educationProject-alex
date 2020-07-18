<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
class UploadFileController extends Controller
{
    public function uploadFile(Request $request)
    {
        $file = $request->file; 
        $path = public_path().'/'.date("Y-m-d");
        if(!File::isDirectory($path))
        {
            File::makeDirectory($path, 0777, true, true);
        }
        $name = time().'.'.$file->getClientOriginalExtension();
        $file->move($path, $name);

        return $path .'/'. $name;
    }
}
