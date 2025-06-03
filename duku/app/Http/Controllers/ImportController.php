<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Models\Food;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imports = Import::with('food')->get();
        return view('imports.index', compact('imports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foods = Food::all();
        return view('imports.create', compact('foods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Food_Id' => 'required|exists:foods,Food_Id',
            'Import_Quantity' => 'required|integer|min:1',
            'Import_Date' => 'required|date',
        ]);

        Import::create($validatedData);

        return redirect()->route('imports.index')
            ->with('success', 'Import record created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function show(Import $import)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function edit(Import $import)
    {
        $foods = Food::all();
        return view('imports.edit', compact('import', 'foods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Import $import)
    {
        $validatedData = $request->validate([
            'Food_Id' => 'required|exists:foods,Food_Id',
            'Import_Quantity' => 'required|integer|min:1',
            'Import_Date' => 'required|date',
        ]);

        $import->update($validatedData);

        return redirect()->route('imports.index')
            ->with('success', 'Import record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Import  $import
     * @return \Illuminate\Http\Response
     */
    public function destroy(Import $import)
    {
        $import->delete();

        return redirect()->route('imports.index')
            ->with('success', 'Import record deleted successfully!');
    }
}
