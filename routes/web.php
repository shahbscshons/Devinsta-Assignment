<?php
/*
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}); */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdjustmentController;
use App\Http\Controllers\InstaAdjustmentController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DataController;

use App\Http\Controllers\SocialController;

Route::get('/social', [SocialController::class, 'index']);



Route::get('/', function () {
    return view('home');
});

Route::get('/web', function () {
    return view('web');
});
/*
Route::get('/social', function () {
    return view('social');
}); */

Route::get('/admin', function () {
    return view('admin');
});

/*
Route::get('/adjustments', [AdjustmentController::class, 'index']);
Route::post('/store', [AdjustmentController::class, 'store']);
*/




//Route::get('adjustments', [AdjustmentController::class, 'index']);
//Route::post('adjustments', [AdjustmentController::class, 'store'])->name('adjustments.store');
// web.php
Route::post('/adjustments/store', [AdjustmentController::class, 'store'])->name('adjustments.store');




Route::get('/adjustments', [AdjustmentController::class, 'index'])->name('adjustments.index');
Route::post('/adjustments', [AdjustmentController::class, 'store'])->name('adjustments.store');

// routes/web.php


Route::post('/store-insta-adjustment', [InstaAdjustmentController::class, 'store'])->name('store.insta.adjustment');





// Route to display the form
Route::get('/insta-adjustment-form', [InstaAdjustmentController::class, 'showForm'])->name('insta.adjustment.form');

// Route to handle form submission
Route::post('/insta-adjustment-submit', [InstaAdjustmentController::class, 'store'])->name('insta.adjustment.submit');




Route::get('/insta-adjustments', [InstaAdjustmentController::class, 'index'])->name('insta.adjustments.index');

// For showing the form (if necessary, optional if you combine with the index method)
Route::get('/insta-adjustment-form', [InstaAdjustmentController::class, 'index'])->name('insta.adjustment.form');

// Handle the form submission
Route::post('/insta-adjustments/submit', [InstaAdjustmentController::class, 'submit'])->name('insta.adjustments.submit');




Route::get('/', [StatisticController::class, 'index']);
Route::get('/get-seed-data', function () {
    // Fetch the data for both field_name: 'seed_input' and 'seed_response'
    $seedInputData = DB::table('insta_adjustments')
        ->where('field_name', 'seed_input')
        ->orderBy('date', 'asc')
        ->select(DB::raw('MONTH(date) as month'), 'value')
        ->get();

    $seedResponseData = DB::table('insta_adjustments')
        ->where('field_name', 'seed_response')
        ->orderBy('date', 'asc')
        ->select(DB::raw('MONTH(date) as month'), 'value')
        ->get();

    return response()->json([
        'seed_input' => $seedInputData,
        'seed_response' => $seedResponseData
    ]);
});




Route::get('/', [DataController::class, 'index']);
