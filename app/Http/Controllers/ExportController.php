<?php

namespace App\Http\Controllers;

use App\Exports\AssetExport;
use App\Exports\RepairExport;
use App\Models\Asset;
use App\Models\Repair;
use Illuminate\Http\Request;
use Inertia\Inertia;

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

            if ($fromDate === $toDate) {
                $data = Repair::query()->whereDate('created_at', $fromDate)->get();
            } else {
                $data = Repair::query()->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate)->get();
            }
            return (new RepairExport($data))->download('repair.xlsx');
        } else if ($request->type === 'asset') {

            if ($fromDate === $toDate) {
                $asset = Asset::query()->whereDate('created_at', $fromDate)->get();
            } else {
                $asset = Asset::query()->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $toDate)->get();
            }
            return (new AssetExport($asset))->download('asset.xlsx');
        }
    }
}
