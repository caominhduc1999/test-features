<?php

namespace App\Http\Controllers;

//use Barryvdh\DomPDF\PDF as PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function pdfForm()
    {
        return view('pdf_form');
    }

    public function pdfDownload(Request $request){

        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data =
            [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message
            ];
        $pdf = PDF::loadView('pdf_download', $data);

        return $pdf->download('tutsmake.pdf');
    }
}
