<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
 
use Validator;

class MultipleUploadController extends Controller
{
    public function upload(Request $request)
    {
        $count=0;
        $file=$request->file('image');
        if ($file)
        {
            // foreach ($files as $file) {    
            $product = new Image;  
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture   = date('His').'-'.$filename;
            //move image to public/img folder
            $file->move(public_path('img'), $picture);
            $product->path = $picture;
            //return response()->json(["data"=>$request->file('image') , "message" => "Image Uploaded Succesfully"]);
            $count = $count+1;
            $product->save();
            // }
        } 
        return response()->json(['status'=>200, 'data'=>$count]);
    }
 
}
