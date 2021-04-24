<?php

namespace App\Services;

use Illuminate\Http\Request;


class FilesService
{
    public function toArray(Request $request, $path, $fileType, $max = 1)
    {
        $results = [];

        if (
            $request->has($path . '.files') &&
            $request->has($path . '.removed')
        ) {
            foreach ($request->file($path)['files'] as $files) {
                foreach ($files as $file) {
                    $mimeType = $file->getMimeType();

                    if (substr($mimeType, 0, 5) === $fileType) {
                        switch ($fileType) {
                            case 'image':
                                $results[] = 'data:' . $mimeType . ';base64,' . base64_encode(file_get_contents($file));
                                break;
                            case 'audio':
                                $results[] = $file;
                        }
                    } else {
                        // чтобы не сбились индексы при удалении
                        $results[] = "";
                    }
                }
            }

            // удаляем по индексам
            $removed = explode(',', $request->input($path)['removed']);

            foreach ($results as $index => $image) {
                if (in_array((string) $index, $removed, true)) {
                    unset($results[$index]);
                }
            }

            // ограничиваем до 5 файлов
            $results = array_slice($results, 0, $max);

            return $results;
        }
    }
}
