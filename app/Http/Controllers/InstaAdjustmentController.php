<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstaAdjustment;
use Illuminate\Support\Facades\DB;

class InstaAdjustmentController extends Controller
{
    // Show the form with totals
    public function index()
    {
        $totals = InstaAdjustment::select('field_name', \DB::raw('SUM(value) as total'))
            ->groupBy('field_name')
            ->pluck('total', 'field_name');

        return view('adjustments.insta-adjustments.index', compact('totals'));
    }

    // Store data into the database and calculate totals
    public function submit(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string',
            'value' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $name = $validated['name'];
        $value = $validated['value'];
        $date = $validated['date'];

        // Save the data
        InstaAdjustment::create([
            'field_name' => $name,
            'value' => $value,
            'date' => $date,
        ]);

        // Calculate the current total for the field
        $total = InstaAdjustment::where('field_name', $name)->sum('value');

        return response()->json([
            'success' => true,
            'message' => ucfirst(str_replace('_', ' ', $name)) . ' saved successfully!',
            'total' => $total,
        ]);
    }
}
