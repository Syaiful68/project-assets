<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Inertia\Inertia;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Repair::query()->with('asset');
        if ($request) {
            $asset = $query->where('repair', 'like', '%' . $request->search . '%');
        } else {
            $asset = $query;
        }

        $total = Repair::query()->count();
        $repair = Repair::query()->where('status', 'repair')->count();
        $done = Repair::query()->where('status', 'done')->count();
        $destroy = Repair::query()->where('status', 'destroy')->count();

        return Inertia::render('Repair/index', [
            'data' => $asset->paginate(10),
            'asset' => Asset::get(['id', 'asset_code', 'asset_name']),
            'total' => $total,
            'repair' => $repair,
            'done' => $done,
            'destroy' => $destroy
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'asset' => 'required',
            'description' => 'required'
        ]);

        $h = 'RFA';
        $query = Asset::query();
        if ($query->first() === null) {
            $n = 1;
        } else {
            $n = $query->first()->id + 1;
        }
        $code = $h . str_pad($n, 6, "0", STR_PAD_LEFT);
        Repair::Create([
            'repair_asset' => $code,
            'asset_id' => $request->asset,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);

        return redirect()->to('/repair');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $repair)
    {
        //
        $data = Repair::query()->with('asset')->where('repair_asset', $repair)->first();
        return Inertia::render('Repair/detail', [
            'asset' => Asset::get(['id', 'asset_code', 'asset_name']),
            'repair' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $repair)
    {
        //
        $query = Repair::query()->where('repair_asset', $repair)->first();

        $query->update([
            // 
            'handle' => $request->handle,
            'status' => $request->Status,
            'user_handle' => Auth::id(),
            'updated_at' => Date::now()
        ]);
        return redirect()->to('/repair');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $repair)
    {
        //
        $data = Repair::query()->where('repair_asset', $repair)->first();
        if ($data->status === 'done') {
            return redirect()->to('/repair');
        }
        $data->delete();
    }
}
