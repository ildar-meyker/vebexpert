<?php

namespace App\Http\Controllers;

use App\Services\FilesService;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Mail;

class PdfController extends Controller
{

    protected $filesService;

    public function __construct(FilesService $filesService)
    {
        $this->filesService = $filesService;
    }

    public function index(Request $request)
    {

        $step1 = $request->input('step1');
        $step2 = $request->input('step2');
        $step3 = $request->input('step3');
        $step4 = $request->input('step4');
        $step5 = $request->input('step5');

        $step3_images = $this->filesService->toArray($request, 'step3.images', 'image', 5);
        $step5_audios = $this->filesService->toArray($request, 'step5.audios', 'audio', 1);
        $step5_images = [];
        foreach ($step5['Линии терапии'] as $index => $therapy) {
            $step5_images[$index] = $this->filesService->toArray(
                $request,
                'step5.Линии терапии.' . $index . '.images',
                'image',
                5
            );
        }

        $html = (string) view('pdf', compact(
            'step1',
            'step2',
            'step3',
            'step4',
            'step5',
            'step3_images',
            'step5_images',
        ));

        // instantiate and use the dompdf class
        $pdf = new Dompdf();
        $pdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4');

        // Render the HTML as PDF
        $pdf->render();

        $data["email"] = "ildar.meyker@gmail.com";
        $data["title"] = "Карточка клинического случая";
        $data["body"] = "";

        Mail::send('emails.pdf', $data, function ($message) use ($data, $pdf, $step5_audios) {

            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData(
                    $pdf->output(),
                    "document.pdf",
                    [
                        'mime' => 'application/pdf',
                    ]
                );

            foreach ($step5_audios as $audio) {
                if ($audio === "") {
                    continue;
                }

                $message->attachData(
                    $audio->get(),
                    $audio->getClientOriginalName(),
                    [
                        'mime' => $audio->getMimeType()
                    ]
                );
            }
        });

        // Output the generated PDF to Browser
        $pdf->stream();
    }
}
