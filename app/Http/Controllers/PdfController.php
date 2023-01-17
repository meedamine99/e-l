<?php

namespace App\Http\Controllers;
 
use App\Models\pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class pdfController extends Controller
{
    public function getpdfUploadForm()
    {
        return view('pdf-upload');
    }
 
    public function uploadpdf(Request $request)
   {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'pdf' => 'required|file|mimes:pdf',
        ]);
 
        $fileName = $request->pdf->getClientOriginalName();
        $file = md5(rand(0,1000)). $fileName  ;
        $filePath = 'pdfs/' . $file;
 
        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->pdf));
 
        // File URL to access the pdf in frontend
        $url = Storage::disk('public')->url($filePath);
 
        if ($isFileUploaded) {
            $pdf = new pdf();
            $pdf->title = $request->title;
            $pdf->path = $filePath;
            $pdf->save();
 
            return back()
            ->with('success','pdf has been successfully uploaded.');
        }
 
        return back()
            ->with('error','Unexpected error occured');
    }
}

