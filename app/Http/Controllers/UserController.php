<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\office;
use App\Models\origin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = User::query()->with('origin');
        if ($request) {
            $data = $query->where('user', 'like', '%' . $request->search . '%')->orWhere('user_name', 'like', '%' . $request->search . '%');
        } else {
            $data = $query;
        }
        return Inertia::render('User/index', [
            'data' => $data->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('User/create', [
            'origin' => origin::get(['origin_code', 'origin_name', 'id'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nik' => 'required|unique:users,nik',
            'name' => 'required',
            'origins' => 'required',
            'roles' => 'required',
            'user' => 'required',
            'password' => 'required',
        ]);

        $origin = origin::query()->where('origin_code', $request->origins)->first();
        User::create([
            'nik' => $request->nik,
            'user_name' => Str::upper($request->name),
            'origin_id' => $origin->id,
            'roles' => $request->roles,
            'user' => $request->user,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->to('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = User::query()->where('user', $id)->first();
        return Inertia::render('User/detail', [
            'data' => $data,
            'origin' => origin::get(['origin_code', 'origin_name'])
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $query = User::query()->where('user', $id)->first();

        if ($request->password) {
            $query->update([
                'origin' => $request->origin,
                'roles' => $request->roles,
                'password' => Hash::make($request->password)
            ]);
        } else {
            $query->update([
                'origin' => $request->origin,
                'roles' => $request->roles,
            ]);
        }

        return redirect()->to('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        User::query()->where('user', $id)->delete();
        return redirect()->to('/user');
    }
}
