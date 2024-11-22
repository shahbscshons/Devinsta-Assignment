<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SocialController extends Controller
{
    public function index()
    {
        // Load the data from the JSON files
        $googleAnalytics = $this->getSocialData('google_analytics.json');
        $microsoftClarity = $this->getSocialData('microsoft_clarity.json');
        $facebook = $this->getSocialData('facebook.json');
        $instagram = $this->getSocialData('instagram.json');
        $snapchat = $this->getSocialData('snapchat.json');

        // Pass the data to the view
        return view('social', compact('googleAnalytics', 'microsoftClarity', 'facebook', 'instagram', 'snapchat'));
    }

    private function getSocialData($filename)
    {
        // Get the path to the JSON file
        $path = storage_path('app/public/' . $filename);

        // Check if the file exists and return the data
        if (File::exists($path)) {
            return json_decode(File::get($path), true)['data'];
        }

        return [];
    }
}
