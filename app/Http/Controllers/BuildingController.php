<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Building::query()->with('office');
        if ($request) {
            $building = $query->where('owner_name', 'like', '%' . $request->search . '%');
        } else {
            $building = $query;
        }
        return Inertia::render('Building/index', [
            'building' => $building->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Building/create', [
            'location' => office::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nik' => 'required|unique:tb_buildings,nik',
            'owner' => 'required',
            'contact' => 'required',
            'office' => 'required',
            'address' => 'required',
            'rent' => 'required',
            'contract' => 'required',
            'file' => 'required',
        ]);

        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $path = Storage::disk('public')->putFileAs('Building', $file, $file->hashName());
        $uri = Storage::url($path);

        Building::create([
            'nik' => $request->nik,
            'owner_name' => $request->owner,
            'contact' => $request->contact,
            'address' => $request->address,
            'rent' => $request->rent,
            'office_id' => $request->office,
            'contract' => $request->contract,
            'file_name' => $file_name,
            'file_path' => $uri,
            'user_id' => Auth::id()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $building)
    {
        //
        $data = Building::query()->findOrFail($building);
        return Inertia::render('Building/detail', [
            'building' => $data,
            'location' => office::get(['id', 'office_name'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $building)
    {
        //
        // dd($request->all());
        $query = Building::query()->where('id', $building)->first();
        if ($request->file) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $path = Storage::disk('public')->putFileAs('Building', $file, $file->hashName());
            $uri = Storage::url($path);
        } else {
            $file_name = $query->file_name;
            $uri = $query->file_path;
        }


        $query->update([
            'rent' => $request->rent,
            'contract' => $request->contract,
            'file_name' => $file_name,
            'file_path' => $uri,
            'user_id' => Auth::id()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $building)
    {
        //
        Building::query()->where('id', $building)->delete();
        return with('delete', 'delete has been success');
    }
}
