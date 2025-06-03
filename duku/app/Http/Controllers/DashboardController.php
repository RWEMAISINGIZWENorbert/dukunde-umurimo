<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Import;
use App\Models\Export;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total food items
        $totalFoods = Food::count();

        // Get today's imports and exports
        $today = Carbon::today();
        $todayImports = Import::whereDate('Import_Date', $today)->count();
        $todayExports = Export::whereDate('ExportDate', $today)->count();

        // Calculate stock levels for each food item
        $stockLevels = Food::with(['imports', 'exports'])->get()->map(function ($food) {
            $totalImports = $food->imports->sum('Import_Quantity');
            $totalExports = $food->exports->sum('Export_Quantity');
            $currentStock = $totalImports - $totalExports;
            
            return [
                'food' => $food,
                'current_stock' => $currentStock,
                'status' => $currentStock <= 0 ? 'Out of Stock' : ($currentStock < 10 ? 'Low Stock' : 'In Stock')
            ];
        });

        // Count stock statuses
        $stockStatus = [
            'In Stock' => $stockLevels->where('status', 'In Stock')->count(),
            'Low Stock' => $stockLevels->where('status', 'Low Stock')->count(),
            'Out of Stock' => $stockLevels->where('status', 'Out of Stock')->count(),
        ];

        // Get recent activities (combine imports and exports)
        $recentActivities = collect();

        // Get recent imports
        $recentImports = Import::with('food')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($import) {
                return [
                    'type' => 'import',
                    'food_name' => $import->food->Food_Name,
                    'quantity' => $import->Import_Quantity,
                    'date' => $import->Import_Date,
                    'created_at' => $import->created_at
                ];
            });

        // Get recent exports
        $recentExports = Export::with('food')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($export) {
                return [
                    'type' => 'export',
                    'food_name' => $export->food->Food_Name,
                    'quantity' => $export->Export_Quantity,
                    'date' => $export->Export_Date,
                    'created_at' => $export->created_at
                ];
            });

        // Combine and sort activities
        $recentActivities = $recentImports->concat($recentExports)
            ->sortByDesc('created_at')
            ->take(5);

        // Get most active items
        $mostActiveItems = Food::withCount(['imports', 'exports'])
            ->orderByDesc('imports_count')
            ->orderByDesc('exports_count')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalFoods',
            'todayImports',
            'todayExports',
            'stockStatus',
            'recentActivities',
            'mostActiveItems'
        ));
    }
} 