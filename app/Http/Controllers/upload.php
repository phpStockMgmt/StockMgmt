<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class upload extends Controller
{
    public function upload(Request $request){
        $file = $request->file('file');
        $destinationPath = public_path('uploads');
        $filename = time().'_'.$file->getClientOriginalName();
        $path = $file->move($destinationPath, $filename)->getPathname();
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($path);
        $text = $pdf->getText();
        return $text;
    }

    public function uploadpage(Request $request){
       return view('upload');
    }
    
}
