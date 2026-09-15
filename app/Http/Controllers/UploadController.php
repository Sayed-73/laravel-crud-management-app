<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    function upload(request $request){
        $path=$request->file('file')->store('');
        return "File uploaded successfully. Path: ".$path;  
        // echo"upload file called";
    }
}


