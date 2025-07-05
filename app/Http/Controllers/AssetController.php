<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\office;
use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Asset::query();
        if ($request) {
            $asset = $query->with('office')->where('asset_code', 'like', '%' . $request->search . '%')->orWhere('asset_name', 'like', '%' . $request->search . '%');
        } else {
            $asset = $query;
        }

        $total = Asset::query()->count();
        $electronic = Asset::query()->where('type', 'electronic')->count();
        $furnitur = Asset::query()->where('type', 'furnitur')->count();
        $machine = Asset::query()->where('type', 'machine')->count();
        return Inertia::render('Asset/index', [
            'asset' => $asset->paginate(10),
            'total' => $total,
            'electronic' => $electronic,
            'furnitur' => $furnitur,
            'machine' => $machine
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Asset/create', [
            'office' => office::get(['id', 'office_name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'item' => 'required',
            'pic' => 'required',
            'office' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        $h = 'DTB';
        $query = Asset::query();
        if ($query->first() === null) {
            $n = 1;
        } else {
            $n = $query->first()->id + 1;
        }
        $code = $h . str_pad($n, 6, "0", STR_PAD_LEFT);
        Asset::create([
            'sn' => $request->sn,
            'asset_code' => $code,
            'asset_name' => $request->item,
            'pic' => $request->pic,
            'location' => $request->office,
            'description' => $request->description,
            'type' => $request->type,
            'user_id' => Auth::id()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $asset)
    {
        //
        $data = Asset::query()->where('asset_code', $asset)->first();
        return Inertia::render('Asset/detail', [
            'asset' => $data,
            'office' => office::get(['id', 'office_name']),
            'repair' => Repair::query()->where('asset_id', $data->id)->get(),

        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $asset)
    {
        //
        $query = Asset::query()->where('asset_code', $asset)->first();
        $query->update([
            'condition' => $request->condition,
            'location' => $request->office,
            'user_id' => Auth::id(),
            'updated_at' => date(now())
        ]);
        return response()->json([
            'message' => 'Data has been updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $asset)
    {
        //
        Asset::query()->where('asset_code', $asset)->delete();
        return response()->json([
            'message' => 'Data has been deleted'
        ]);
    }
}
