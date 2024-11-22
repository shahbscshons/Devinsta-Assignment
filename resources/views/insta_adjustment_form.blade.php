<!-- resources/views/insta_adjustment_form.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Insta Adjustment Form</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form for submission -->
        <form action="{{ route('insta-adjustments.submit') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="seed_input">Seed Input:</label>
                <input type="text" class="form-control" id="seed_input" name="seed_input" required>
                <label for="seed_input_date">Pick Date:</label>
                <input type="date" class="form-control" id="seed_input_date" name="seed_input_date" required>
                <button type="submit" class="btn btn-danger">OK</button>
                <div>
                    <strong>Current Total Seed Input:</strong> {{ $currentTotalSeedInput }}
                </div>
            </div>

            <div class="form-group">
                <label for="seed_response">Seed Response:</label>
                <input type="text" class="form-control" id="seed_response" name="seed_response" required>
                <label for="seed_response_date">Pick Date:</label>
                <input type="date" class="form-control" id="seed_response_date" name="seed_response_date" required>
                <button type="submit" class="btn btn-danger">OK</button>
                <div>
                    <strong>Current Total Seed Response:</strong> {{ $currentTotalSeedResponse }}
                </div>
            </div>

            <!-- Repeat the same structure for the other fields... -->

        </form>
    </div>
@endsection
