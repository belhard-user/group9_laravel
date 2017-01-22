<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class FileController extends Controller
{
    public function index()
    {
        return view('file.index');
    }

    public function save(Request $request)
    {
        if($request->hasFile('tumba')){
            $names = [];
            foreach($request->tumba as $file){
                $names[] = $file->store('many', 'belhard');
            }

            dd($names);

            /** @var UploadedFile  $file */
            /*$file = $request->tumba;
            $fileName = md5(time() . $file->getClientOriginalName());
            $ext = $file->extension();

            dd($request->tumba->storeAs('test', $fileName.'.'.$ext, 'belhard'));*/
            /*$file = $request->file('tumba')->storePubliclyAs('trash', 'my name');
            dd($file);*/
        }
    }
}
