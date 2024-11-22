@extends('layout')

@section('content')
    <div class="container">
        <h1>Adjustment Form</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('insta.adjustment.submit') }}" method="POST" id="adjustmentForm">
            @csrf

            @php
                $rows = [
                    'Seed Input on date' => 'seed_input',
                    'Seed Response on date' => 'seed_response',
                    'Insta Visitor Adjustment' => 'insta_visitor',
                    'Facebook Visitor Adjustment' => 'facebook_visitor',
                    'Site Session Total Adjustment' => 'site_session',
                    'Site Engagement Adjustment' => 'site_engagement',
                    'Site Device Iphone Adjustment' => 'device_iphone',
                    'Site Device Android Adjustment' => 'device_android',
                    'Site PC Adjustment' => 'device_pc',
                ];
            @endphp

            @foreach ($rows as $label => $name)
                <div class="form-group mb-4">
                    <label for="{{ $name }}">{{ $label }}</label>
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Text Input -->
                            <input type="text" class="form-control" id="{{ $name }}" name="{{ $name }}" required placeholder="Enter {{ $label }}">
                        </div>
                        <div class="col-md-3">
                            <!-- Date Picker -->
                            <input type="date" class="form-control" name="{{ $name }}_date" required>
                        </div>
                        <div class="col-md-2">
                            <!-- Submit Button -->
                            <button type="button" class="btn btn-danger submit-row" data-name="{{ $name }}">OK</button>
                        </div>
                        <div class="col-md-3">
                            <!-- Current Total -->
                            <strong>Current Total:</strong> <span id="{{ $name }}_total">0</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </form>
    </div>

    <script>
    document.querySelectorAll('.submit-row').forEach(button => {
        button.addEventListener('click', function () {
            const name = this.getAttribute('data-name');
            const value = document.querySelector(`#${name}`).value;
            const date = document.querySelector(`[name="${name}_date"]`).value;

            if (!value || !date) {
                alert('Please fill out all fields for ' + name.replace(/_/g, ' '));
                return;
            }

            fetch('{{ route('insta.adjustments.submit') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    name: name,
                    value: value,
                    date: date
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector(`#${name}_total`).textContent = data.total;
                    alert(data.message);
                } else {
                    alert(data.error || 'Something went wrong!');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
    </script>
@endsection
