<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\fileUpload;
use App\Providers\AppServiceProvider;

class UploadController extends Controller
{
	

    public function fileStore(Request $request)
    {
    	//return print_r($request);
    	//return $request()->post();
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = public_path('files');
        $file->move($filePath,$fileName);
        
        $fileUpload = new fileUpload();
        $fileUpload->filename = $fileName;
        $fileUpload->save();

       
        $baseUrl= url("/")."/public/files/".$fileName;
        $noImage= url("/")."/public/images/No-Image.png";

         return response()->json(['success'=>$baseUrl,'noImage'=>$noImage]);
        
    }

     public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        fileUpload::where('filename',$filename)->delete();
        $path=public_path().'/files/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }
    
}
