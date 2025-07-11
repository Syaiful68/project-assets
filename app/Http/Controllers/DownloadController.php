<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    //

    public function armada($download)
    {
        $query = Armada::query()->where('slug', $download)->first();
        // $file = Storage::disk('public')->path($query->file_path);
        if ($query->file_path) {
            $file = public_path($query->file_path);
            return response()->download($file, $query->file_name);
        }
        return 'data not found';
        // $file_name = $query->file_name;
        // dd($file_name);
    }
    public function building($download)
    {
        // 
    }
}
