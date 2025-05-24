<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public function upload($path, $file)
    {
        $filename = $file->hashName();
        Storage::disk('public')->put($path . $filename, file_get_contents($file));
        return $path . $filename;
    }

    public function delete($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
