<?php

namespace App\Http\Controllers;

use App\Exports\AssetExport;
use App\Exports\RepairExport;
use App\Models\Asset;
use App\Models\Repair;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('ExportView');
    }

    public function export(Request $request)
    {
        $fromDate = $request->from;
        $toDate = $request->to;
        if ($request->type === 'repair') {
            $data = Repair::query()->with('asset')->where('created_at', '>=', $fromDate)->where('created_at', '<=', $toDate)->get();
            // dd($data);
            return (new RepairExport($data))->download('repair.xlsx');
        } else if ($request->type === 'asset') {
            $asset = Asset::query()->with(['office'])->where('created_at', '>=', $fromDate)->where('created_at', '<=', $toDate)->get();
            // dd($asset);
            return (new AssetExport($asset))->download('asset.xlsx');
        }
    }
}
