<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;

class StatisticController extends Controller
{
    public function index()
    {
        // Fetch the first row of data from the 'statistics' table
        $data = Statistic::first();

        return view('home', compact('data'));
    }
}
