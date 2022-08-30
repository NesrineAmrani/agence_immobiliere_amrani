<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function upload(Request $request){
        try {
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);
            $fileName = time().'.'.request()->file->getClientOriginalExtension();

            request()->file->move('storage/'.$request->folder, $fileName); 
            return response()->json(['response'=>"success"]); 
        } catch (\Throwable $th) {
           return response()->json(['response'=>"error"]);
        }
    }

    public function getFiles(Request $request){
        $images = [];
        foreach(Storage::disk('public')->allFiles($request->folder) as $file){
            array_push($images,  Storage::url($file) );
        }
        return $images;
    }

    public function destroy(Request $request){
        try {
            $folder = $request->folder;
            $file = basename($request->file);
            if (Storage::disk('public')->exists($folder.'/'.$file)) {
                Storage::disk('public')->delete($folder.'/'.$file);
                return response()->json(['response'=>"success"]); 
            }
        } catch (\Throwable $th) {
            return response()->json(['response'=>"error"]);
         }
    }
}
