<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstaAdjustment; // Import the model

class DataController extends Controller
{
    public function index()
    {
        // Fetch all data from insta_adjustments table
        $adjustments = InstaAdjustment::whereNotIn('field_name', ['Seed Input', 'Seed Response'])->get();
       // $adjustments = InstaAdjustment::all();

        // Prepare the chart data from the database
        $chartData = [
            'labels' => [],
            'values' => []
        ];

        // Loop through the data and fill the chart data arrays
        foreach ($adjustments as $adjustment) {
            $chartData['labels'][] = $adjustment->field_name;
            $chartData['values'][] = $adjustment->value;
        }

        // Pass the data to the home view
        return view('home', compact('chartData'));
    }
}
