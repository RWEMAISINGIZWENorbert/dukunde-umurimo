<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exports = Export::with('food')->get();
        return view('exports.index', compact('exports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foods = Food::all();
        return view('exports.create', compact('foods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'Food_Id' => 'required|exists:foods,Food_Id',
                'Quantity' => 'required|integer|min:1',
                'ExportDate' => 'required|date',
            ]);

            Log::info('Validated Export Data:', $validatedData);

            $export = Export::create($validatedData);
            
            Log::info('Created Export:', ['export' => $export->toArray()]);

            return redirect()->route('exports.index')
                ->with('success', 'Export record created successfully!');
        } catch (\Exception $e) {
            Log::error('Export Creation Error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()
                ->withInput()
                ->withErrors(['error' => 'Failed to create export record. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Export  $export
     * @return \Illuminate\Http\Response
     */
    public function show(Export $export)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Export  $export
     * @return \Illuminate\Http\Response
     */
    public function edit(Export $export)
    {
        $foods = Food::all();
        return view('exports.edit', compact('export', 'foods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Export  $export
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Export $export)
    {
        $validatedData = $request->validate([
            'Food_Id' => 'required|exists:foods,Food_Id',
            'Quantity' => 'required|integer|min:1',
            'ExportDate' => 'required|date',
        ]);

        $export->update($validatedData);

        return redirect()->route('exports.index')
            ->with('success', 'Export record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Export  $export
     * @return \Illuminate\Http\Response
     */
    public function destroy(Export $export)
    {
        $export->delete();

        return redirect()->route('exports.index')
            ->with('success', 'Export record deleted successfully!');
    }
}
