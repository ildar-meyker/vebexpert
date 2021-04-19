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
        $step3 = $request->input('step3');
        $step4 = $request->input('step4');
        $step5 = $request->input('step5');

        $step3_images = [];
        if (
            $request->has('step3.images.files') &&
            $request->has('step3.images.removed')
        ) {
            foreach ($request->step3['images']['files'] as $files) {
                foreach ($files as $file) {
                    $mimeType = $file->getMimeType();
                    if (substr($mimeType, 0, 5) === 'image') {
                        $step3_images[] = 'data:' . $mimeType . ';base64,' . base64_encode(file_get_contents($file));
                    } else {
                        // чтобы не сбились индексы при удалении
                        $step3_images[] = "";
                    }
                }
            }

            // удаляем по индексам
            $removed = explode(',', $request->step3['images']['removed']);
            foreach ($step3_images as $index => $image) {
                if (in_array($index, $removed, true)) {
                    unset($step3_images[$index]);
                }
            }

            // ограничиваем до 5 файлов
            $step3_images = array_slice($step3_images, 0, 5);
        }

        // для каждой линии терапии:
        $step5_images = [];
        foreach ($step5['Линии терапии'] as $therapyIndex => $therapy) {
            if (
                $request->has('step5.Линии терапии.' . $therapyIndex . '.images.files') &&
                $request->has('step5.Линии терапии.' . $therapyIndex . '.images.removed')
            ) {
                $step5_images[$therapyIndex] = [];

                foreach ($request->step5['Линии терапии'][$therapyIndex]['images']['files'] as $files) {
                    foreach ($files as $file) {
                        $mimeType = $file->getMimeType();
                        if (substr($mimeType, 0, 5) === 'image') {
                            $step5_images[$therapyIndex][] = 'data:' . $mimeType . ';base64,' . base64_encode(file_get_contents($file));
                        } else {
                            // чтобы не сбились индексы при удалении
                            $step5_images[$therapyIndex][] = "";
                        }
                    }
                }

                // удаляем по индексам
                $removed = explode(',', $request->step5['Линии терапии'][$therapyIndex]['images']['removed']);

                foreach ($step5_images[$therapyIndex] as $index => $image) {
                    if (in_array($index, $removed, true)) {
                        unset($step5_images[$therapyIndex][$index]);
                    }
                }

                // ограничиваем до 5 файлов
                $step5_images[$therapyIndex] = array_slice($step5_images[$therapyIndex], 0, 5);
            }
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
