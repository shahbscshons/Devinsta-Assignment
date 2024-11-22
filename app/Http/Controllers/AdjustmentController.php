<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adjustment;

class AdjustmentController extends Controller
{
    // Show the form with all adjustments
    public function index()
    {
        return view('adjustments.index');
    }

    // Store the adjustment data
    /*
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'value' => 'required|numeric',
            'date' => 'required|date',
        ]);

        // Store the data in the database
        Adjustment::create([
            'type' => $request->type,
            'value' => $request->value,
            'date' => $request->date,
        ]);

        // Return the current total for the specific adjustment type
        return response()->json([
            'total' => $this->getTotalForType($request->type)
        ]);
    }
    */
/*
    public function store(Request $request)
    {
        // Validate and save data
        $data = $request->validate([
            'seed_input_date' => 'required|numeric',
            'seed_input_calendar' => 'required|date',
            'seed_response_date' => 'required|numeric',
            'seed_response_calendar' => 'required|date',
            'insta-visitor-adjustment' => 'required|numeric',
            'insta-visitor-calendarr' => 'required|date',
            'facebook-visitor-adjustment' => 'required|numeric',
            'facebook-visitor-calendar' => 'required|date',
            'site-session-total-adjustment' => 'required|numeric',
            'site-session-calendar' => 'required|date',
            'site-engagement-adjustment' => 'required|numeric',
            'site-engagement-calendar' => 'required|date',
            'site-device-iphone-adjustment' => 'required|numeric',
            'site-device-iphone-calendar' => 'required|date',
            'site-device-android-adjustment' => 'required|numeric',
            'site-device-android-calendar' => 'required|date',
            'site-pc-adjustment' => 'required|numeric',
            'site-pc-calendar' => 'required|date',
            // Add other fields as needed
        ]);

        Adjustment::create($data); // Create a new record in the database

        // Redirect or return a response
        return redirect()->back()->with('success', 'Adjustment saved successfully!');
    }
*/

public function store(Request $request)
{
    // Define validation rules for each field
    $validatedData = $request->validate([
        'seed_input_date' => 'required|numeric',
        'seed_input_calendar' => 'required|date',
        'seed_response_date' => 'required|numeric',
        'seed_response_calendar' => 'required|date',
        'insta_visitor_adjustment' => 'required|numeric',
        'insta_visitor_calendar' => 'required|date',
        'facebook_visitor_adjustment' => 'required|numeric',
        'facebook_visitor_calendar' => 'required|date',
        'site_session_total_adjustment' => 'required|numeric',
        'site_session_calendar' => 'required|date',
        'site_engagement_adjustment' => 'required|numeric',
        'site_engagement_calendar' => 'required|date',
        'site_device_iphone_adjustment' => 'required|numeric',
        'site_device_iphone_calendar' => 'required|date',
        'site_device_android_adjustment' => 'required|numeric',
        'site_device_android_calendar' => 'required|date',
        'site_pc_adjustment' => 'required|numeric',
        'site_pc_calendar' => 'required|date',
    ]);

    \DB::beginTransaction(); // Optional: Begin transaction for atomicity

    try {
        // Create a new adjustment record for each adjustment type
        foreach ($validatedData as $key => $value) {
            if (str_contains($key, '_adjustment')) {
                // Extract the type by removing '_adjustment' from the key
                $type = str_replace('_adjustment', '', $key);

                // Ensure the corresponding calendar key exists
                $calendarKey = "{$type}_calendar";
                if (!isset($validatedData[$calendarKey])) {
                    \Log::error("Missing calendar key for type: {$type}");
                    continue; // Skip if calendar key is missing
                }

                // Create the adjustment record
                Adjustment::create([
                    'type' => $type,
                    'value' => $value,
                    'date' => $validatedData[$calendarKey],
                ]);

                \Log::info("Adjustment saved for type: {$type}", [
                    'value' => $value,
                    'date' => $validatedData[$calendarKey],
                ]);
            }
        }

        \DB::commit(); // Commit transaction

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Adjustments saved successfully!',
        ]);
    } catch (\Exception $e) {
        \DB::rollBack(); // Rollback transaction on failure

        \Log::error('Error saving adjustments', ['error' => $e->getMessage()]);

        // Return an error response
        return response()->json([
            'success' => false,
            'message' => 'Failed to save adjustments. Please try again.',
        ], 500);
    }
}


    // Get total sum for a specific adjustment type
    public function getTotalForType($type)
    {
        return Adjustment::where('type', $type)->sum('value');
    }
}