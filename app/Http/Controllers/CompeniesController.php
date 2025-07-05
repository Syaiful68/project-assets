<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Compenies;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompeniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Compenies::query();
        if ($request) {
            $asset = $query->where('asset_code', 'like', '%' . $request->search . '%')->orWhere('asset_name', 'like', '%' . $request->search . '%');
        } else {
            $asset = $query;
        }
        return Inertia::render('Vendors/index', [
            'compeny' => $asset->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return  Inertia::render('Vendors/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'compeny' => 'required|unique:tb_compenies,compeny_name',
            'owner' => 'required',
            'contact' => 'required',
            'address' => 'required'
        ]);
        Compenies::create([
            'compeny_name' => Str::upper($request->compeny),
            'owner_name' => $request->owner,
            'contact' => $request->contact,
            'address' => $request->address,
            'user_id' => Auth::id()
        ]);
        return redirect()->to('/compeny');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $compenies)
    {
        //
        $data = Compenies::query()->where('id', $compenies)->first();
        return  Inertia::render('Vendors/detail', [
            'compeny' => $data
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $compenies)
    {
        //
        $query = Compenies::query()->where('id', $compenies);
        $query->update([
            'compeny_name' => $request->compeny,
            'owner_name' => $request->owner,
            'contact' => $request->contact,
            'address' => $request->address,
            'user_id' => Auth::id()
        ]);
        return redirect()->to('/compeny')->with('success', 'data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compenies $compenies)
    {
        //
    }
}
