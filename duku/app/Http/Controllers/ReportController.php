<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Import;
use App\Models\Export;
use App\Models\Food;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $search = $request->input('search');

        // Fetch imports with food details
        $imports = Import::with('food');

        // Apply date filter to imports
        if ($startDate) {
            $imports->where('Import_Date', '>=', $startDate);
        }
        if ($endDate) {
            $imports->where('Import_Date', '<=', $endDate);
        }

        $imports = $imports->get()->map(function($import) {
            return [
                'id' => $import->id, // Assuming 'id' exists in your Import model
                'type' => 'Import',
                'date' => $import->Import_Date,
                'quantity' => $import->Import_Quantity,
                'food_name' => $import->food->Food_Name, // Assuming Food_Name is directly accessible
            ];
        });

        // Fetch exports with food details
        $exports = Export::with('food');

        // Apply date filter to exports
        if ($startDate) {
            $exports->where('ExportDate', '>=', $startDate);
        }
        if ($endDate) {
            $exports->where('ExportDate', '<=', $endDate);
        }

        $exports = $exports->get()->map(function($export) {
            return [
                'id' => $export->id, // Assuming 'id' exists in your Export model
                'type' => 'Export',
                'date' => $export->ExportDate,
                'quantity' => $export->Quantity,
                'food_name' => $export->food->Food_Name, // Assuming Food_Name is directly accessible
            ];
        });

        // Combine imports and exports
        $activities = $imports->concat($exports)->sortByDesc('date');

        // Apply search filter (if search term is present)
        if ($search) {
            $activities = $activities->filter(function ($activity) use ($search) {
                return str_contains(strtolower($activity['food_name']), strtolower($search)) ||
                       str_contains(strtolower($activity['type']), strtolower($search));
            });
        }

        return view('reports.index', [
            'activities' => $activities,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'searchQuery' => $search,
        ]);
    }
}
