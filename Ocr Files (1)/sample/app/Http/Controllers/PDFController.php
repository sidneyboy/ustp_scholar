<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;
use PDF;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {


        //return $request->input('text_data');
        $data = explode(" ", $request->input('text_data'));

        foreach ($data as $key => $value) {
            if (str_contains($value, 'CD')) {
                $subject_code[] = $value;
            }elseif(str_contains($value,'DP')){
                $description[] = $value;
            }elseif(str_contains($value,'UN')){
                $units[] = $value;
            }elseif(str_contains($value,'SC')){
                $section[] = $value;
            }elseif(str_contains($value,'MDT')){
                $midterm[] = $value;
            }elseif(str_contains($value,'FNL')){
                $final[] = $value;
            }elseif(str_contains($value,'RK-')){
                $remarks[] = $value;
            }
        }

        return $remarks;





























        // echo $request->input('text_data');
        // echo "<br />";
        // echo count(explode("\n",$request->input('text_data')));
        // echo substr_count($request->input('text_data'), "\n" ) + 1;
        // $data = ['title' => $request->input('text_data')];
        // $pdf = PDF::loadView('myPDF', $data);

        // $filename = "sample";
        // $path = public_path('');

        // $pdf = PDF::loadView('myPDF', $data)->save(''.$path.'/'.$filename.'.pdf');


        // return $pdf->download(''.$filename.'.pdf');

        // $parser = new \Smalot\PdfParser\Parser();
        // $pdf_file = public_path('sample.pdf');
        // $pdf = $parser->parseFile($pdf_file);

        // //$text = $pdf->getText();
        // $text = $pdf->getPages()[0]->getDataTm();



        // // $explode = implode(',',$text);
        // dd($text);
    }
}
