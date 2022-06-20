<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ExcelImport;
use Maatwebsite\Excel\Facades\Excel;
// use Illuminate\Support\Facades\File;
use PDF;

class FileToPdfController extends Controller
{
    public function home()
    {
        return view('pages.file_to_pdf');
    }
    public function process(Request $request)
    {

        $request->validate(
            [
                'officeFile' => 'required|mimes:xlsx,docx,jpg,jpeg,png,gif|max:50000'

            ],
            [
                'officeFile.required' => 'File Required',
                'officeFile.mimes' => 'The file must be a file of type: xlsx or doc or docs'
            ]
        );
        // $request->file('officeFile')->getClientOriginalName();

        if ($request->submitPreview == "Convert & Preview") {
            
            if(($request->file('officeFile')->extension())=='xlsx'){
                $pdf = $this->excel_to_pdf($request->file('officeFile'),$request->paperSize, $request->orientation);
                return $pdf->stream('Converted By Jconverter.pdf');
            }
            elseif(($request->file('officeFile')->extension())=='docx'){
                $this->word_to_pdf($request->file('officeFile'));
                return response()->file(public_path('Converted By Jconverter.pdf'));
            }
            elseif(($request->file('officeFile')->extension())=='jpg' || ($request->file('officeFile')->extension())=='jpeg' || ($request->file('officeFile')->extension())=='png' || ($request->file('officeFile')->extension())=='gif'){
                $pdf = $this->image_to_pdf($request->file('officeFile'),$request->paperSize, $request->orientation);
                return $pdf->stream('Converted By Jconverter.pdf');
            }

        } 
        elseif ($request->submitDownload == "Convert & Download") {
            if(($request->file('officeFile')->extension())=='xlsx'){
                $pdf = $this->excel_to_pdf($request->file('officeFile'),$request->paperSize, $request->orientation);
                return $pdf->download('Converted By Jconverter.pdf');
            }
            elseif(($request->file('officeFile')->extension())=='docx'){
                $this->word_to_pdf($request->file('officeFile'));
                return response()->download(public_path('Converted By Jconverter.pdf'));
            }
            elseif(($request->file('officeFile')->extension())=='jpg' || ($request->file('officeFile')->extension())=='jpeg' || ($request->file('officeFile')->extension())=='png' || ($request->file('officeFile')->extension())=='gif'){
                $pdf = $this->image_to_pdf($request->file('officeFile'),$request->paperSize, $request->orientation);
                return $pdf->download('Converted By Jconverter.pdf');
            }
        } 
        // else {
        //     return view('pages.excelPreview')->with('excelData', $collection)
        //         ->with('id', $request->id);
        // }
    }


    public function excel_to_pdf($excelFile, $paperSize, $orientation){
        $collection  = Excel::toCollection(new ExcelImport, $excelFile);
        $pdf = PDF::setOptions([
            // 'isHtml5ParserEnabled' => true,
            // 'isRemoteEnabled' => true,
            'defaultFont' => 'sans-serif'
        ])->setPaper($paperSize, $orientation)
            ->loadView('pages.pdf_view_excel', ['excelData' => $collection]);
        return $pdf;
    }
    public function word_to_pdf($wordFile){
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        $Content = \PhpOffice\PhpWord\IOFactory::load($wordFile);

        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');

        $PDFWriter->save(public_path('Converted By Jconverter.pdf')); 

        return $PDFWriter;
    }
    public function image_to_pdf($imageFile, $paperSize, $orientation){
        $imageFile->move("Temp", 'zzz.jpg');
        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            // 'defaultFont' => 'sans-serif'
        ])->setPaper($paperSize, $orientation)->loadView('pages.pdf_view_image');
        return $pdf;
    }
}
