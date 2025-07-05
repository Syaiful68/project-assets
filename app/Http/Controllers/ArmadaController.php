<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Armada;
use App\Models\Compenies;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Armada::query()->with('vendor');
        if ($request) {
            $asset = $query->where('asset_code', 'like', '%' . $request->search . '%')->orWhere('asset_name', 'like', '%' . $request->search . '%');
        } else {
            $asset = $query;
        }
        return Inertia::render('Armada/index', [
            'armada' => $asset->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Armada/create', [
            'vendor' => Compenies::get(['id', 'compeny_name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'compeny' => 'required',
            'plat' => 'required|unique:tb_armadas,plat_number',
            'vehicle' => 'required',
            'type' => 'required',
            'fuels' => 'required',
            'rent' => 'required|numeric',
            'contract' => 'required',
            'description' => 'required',
            'file' => 'required'
        ]);

        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $path = Storage::disk('public')->putFileAs('Building', $file, $file->hashName());
        $uri = Storage::url($path);

        $rent = intval($request->rent);

        $date = Carbon::create($request->contract);
        $endDate = $date->addYear($rent);
        // dd($addYear);

        Armada::create([
            'vendor_id' => $request->compeny,
            'plat_number' => $request->plat,
            'slug' => Str::slug($request->plat),
            'vehicle' => Str::upper($request->vehicle),
            'type' => $request->type,
            'end_date' => $endDate,
            'fuel_type' => $request->fuels,
            'rent' => $request->rent,
            'contract' => $request->contract,
            'description' => $request->description,
            'file_name' => $file_name,
            'file_path' => $uri,
            'user_id' => Auth::id()
        ]);
        return redirect()->to('/armada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $armada)
    {
        //
        $data = Armada::query()->where('slug', $armada)->first();
        return Inertia::render('Armada/detail', [
            'armada' => $data,
            'vendor' => Compenies::get(['id', 'compeny_name'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Armada $armada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Armada $armada)
    {
        //
    }
}
