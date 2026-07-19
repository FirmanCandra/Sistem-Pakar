<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.plants.index', ['plants' => Plant::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plants.form', ['plant' => new Plant]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Plant::create($this->validated($request));

        return redirect()->route('admin.plants.index')->with('success', 'Tanaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        return redirect()->route('admin.plants.edit', $plant);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plant $plant)
    {
        return view('admin.plants.form', compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {
        $plant->update($this->validated($request));

        return redirect()->route('admin.plants.index')->with('success', 'Tanaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        $plant->delete();

        return redirect()->route('admin.plants.index')->with('success', 'Tanaman berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'latin_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'care_instructions' => ['required', 'string'],
            'watering_frequency' => ['required', 'string', 'max:255'],
            'light_requirement' => ['required', 'string', 'max:255'],
            'humidity_requirement' => ['required', 'string', 'max:255'],
            'difficulty' => ['required', 'string', 'max:255'],
        ]);
    }
}
