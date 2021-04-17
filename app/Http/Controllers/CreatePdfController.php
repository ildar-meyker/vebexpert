<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CreatePdfController extends Controller
{
    public function index(Request $request)
    {

        $step1 = $request->input('step1');
        $step2 = $request->input('step2');
        $step3 = $request->input('step3');

        $step3_images = [];

        if ($request->has('step3.files')) {
            foreach ($request->step3['files'] as $files) {
                foreach ($files as $file) {
                    $mimeType = $file->getMimeType();
                    if (substr($mimeType, 0, 5) === 'image') {
                        $step3_images[] = 'data:' . $mimeType . ';base64,' . base64_encode(file_get_contents($file));
                    }
                }
            }
        }

        $html = (string) view('pdf', compact(
            'step1',
            'step2',
            'step3',
            'step3_images'
        ));

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
