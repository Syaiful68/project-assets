<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Building;

class DownloadController extends Controller
{
    //

    public function armada($download)
    {
        $query = Armada::query()->where('slug', $download)->first();
        if ($query->file_path) {
            $file = public_path($query->file_path);
            return response()->download($file, $query->file_name);
        }
        return 'data not found';
    }
    public function office($download)
    {
        // 
        $query = Building::query()->where('id', $download)->first();
        if ($query->file_path) {
            $file = public_path($query->file_path);
            return response()->download($file, $query->file_name);
        }
        return 'data not found';
    }
}
