<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CreatePdfController extends Controller
{
    public function index(Request $request)
    {
        // return $request->all();
        $step1 = $request->input('step1');
        $step2 = $request->input('step2');

        $html = (string) view('pdf', compact('step1', 'step2'));

        // echo $html;

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
