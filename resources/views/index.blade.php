<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Adjustments</title>
    <!-- Pikaday CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.2/css/pikaday.min.css">
    <!-- Pikaday JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.2/pikaday.min.js"></script>

    <style>
        .submit-btn {
            background-color: #a40001;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #8a0000; /* Hover color */
        }

        .current-total {
            font-size: 14px;
            color: #333;
            margin-left: 10px;
        }

        .row {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="number"], input[type="text"] {
            width: 200px;
            padding: 10px;
            margin-right: 10px;
        }

        input[type="text"].calendar {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Adjustments Form</h2>

    <div id="form-container">
        <form action="{{ route('adjustments.store') }}" method="POST" id="adjustment-form">
            @csrf
            <!-- First Row: Seed Input on date -->
            <div>
        <!-- First Row: Seed Input on date -->
        <input type="number" id="seed-input-date" class="input-field" placeholder="Enter value">
        <input type="date" id="seed-input-calendar" name="seed-input-calendar" class="datepicker" readonly>
        <button id="seed-input-submit" onclick="submitRow('seed')">OK</button>
        <span id="seed-input-total">Current Total: 0</span>
    </div>

    <div>
        <!-- Second Row: Seed Response on date -->
        <input type="number" id="seed-response-date" class="input-field" placeholder="Enter value">
        <input type="date" id="seed-response-calendar" class="date-picker" readonly>
        <button id="seed-response-submit" onclick="submitRow('response')">OK</button>
        <span id="seed-response-total">Current Total: 0</span>
    </div>

    <div>
        <!-- Third Row: Insta Visitor Adjustment -->
        <input type="number" id="insta-visitor-adjustment" class="input-field" placeholder="Enter value">
        <input type="date" id="insta-visitor-calendar" class="date-picker" readonly>
        <button id="insta-visitor-submit" onclick="submitRow('insta')">OK</button>
        <span id="insta-visitor-total">Current Total: 0</span>
    </div>

    <div>
        <!-- Fourth Row: Facebook Visitor Adjustment -->
        <input type="number" id="facebook-visitor-adjustment" class="input-field" placeholder="Enter value">
        <input type="date" id="facebook-visitor-calendar" class="date-picker" readonly>
        <button id="facebook-visitor-submit" onclick="submitRow('facebook')">OK</button>
        <span id="facebook-visitor-total">Current Total: 0</span>
    </div>

    <div>
        <!-- Fifth Row: Site Session Total Adjustment -->
        <input type="number" id="site-session-total-adjustment" class="input-field" placeholder="Enter value">
        <input type="date" id="site-session-calendar" class="date-picker" readonly>
        <button id="site-session-submit" onclick="submitRow('site-session')">OK</button>
        <span id="site-session-total">Current Total: 0</span>
    </div>

    <div>
        <!-- Sixth Row: Site Engagement Adjustment -->
        <input type="number" id="site-engagement-adjustment" class="input-field" placeholder="Enter value">
        <input type="date" id="site-engagement-calendar" class="date-picker" readonly>
        <button id="site-engagement-submit" onclick="submitRow('site-engagement')">OK</button>
        <span id="site-engagement-total">Current Total: 0</span>
    </div>

    <div>
        <!-- Seventh Row: Site Device iPhone Adjustment -->
        <input type="number" id="site-device-iphone-adjustment" class="input-field" placeholder="Enter value">
        <input type="date" id="site-device-iphone-calendar" class="date-picker" readonly>
        <button id="site-device-iphone-submit" onclick="submitRow('site-device-iphone')">OK</button>
        <span id="site-device-iphone-total">Current Total: 0</span>
    </div>

    <div>
        <!-- Eighth Row: Site Device Android Adjustment -->
        <input type="number" id="site-device-android-adjustment" class="input-field" placeholder="Enter value">
        <input type="date" id="site-device-android-calendar" class="date-picker" readonly>
        <button id="site-device-android-submit" onclick="submitRow('site-device-android')">OK</button>
        <span id="site-device-android-total">Current Total: 0</span>
    </div>

    <div>
        <!-- Ninth Row: Site PC Adjustment -->
        <input type="number"  id="site-pc-adjustment" name="site-pc-adjustment" class="input-field" placeholder="Enter value">
        <input type="date" id="site_pc_calendar" name="site_pc_calendar" class="date-picker calendar" readonly>
        <button id="site-pc-submit" onclick="submitRow('site-pc')">OK</button>
        <span id="site-pc-total">Current Total: 0</span>
    </div>

            <!-- Other rows as needed... -->

        </form>
    </div>

    <script>
   function submitRow(type) {
    const form = document.getElementById('adjustment-form');
    form.submit(); // Submits the entire form
}



        document.addEventListener('DOMContentLoaded', function () {
            // Initialize date pickers
   /*         const calendars = document.querySelectorAll('.calendar');
            calendars.forEach(calendar => {
                calendar.addEventListener('click', function () {
                    const picker = new Pikaday({
                        field: calendar,
                        format: 'YYYY-MM-DD',
                        onSelect: function (date) {
                            calendar.value = picker.toString();
                        }
                    });
                });
            });
*/
const calendars = document.querySelectorAll('.calendar');
    
    calendars.forEach(calendar => {
        // Initialize Pikaday for each calendar input field
        const picker = new Pikaday({
            field: calendar,             // Target the input field
            format: 'YYYY-MM-DD',        // Set the desired date format
            toString: function (date) {
                // Format the selected date as 'YYYY-MM-DD'
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0'); // Month is zero-based
                const day = String(date.getDate()).padStart(2, '0');
                return ${year}-${month}-${day};
            },
            onSelect: function (date) {
                // Ensure the input gets the properly formatted date
                calendar.value = this.toString(date);
            }
        });
    });
            // Handle form submission for each row
            const form = document.getElementById('adjustment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                // Get the row values
                const values = {};
                form.querySelectorAll('.row').forEach((row) => {
                    const inputValue = row.querySelector('input[type="number"]').value;
                    const dateValue = row.querySelector('.calendar').value;

                    if (inputValue && dateValue) {
                        const key = row.querySelector('label').innerText.trim().toLowerCase().replace(/\s+/g, '_');
                        values[key] = { value: inputValue, date: dateValue };
                    }
                });

                // Handle sending data to backend (simulate this here, integrate with backend)
                console.log('Form submitted with values:', values);

                // Dynamically update current total
                updateCurrentTotal(values);
            });

            // Update current total dynamically
            function updateCurrentTotal(values) {
                for (const key in values) {
                    const currentTotalElement = document.getElementById(${key}-total);
                    let currentSum = parseFloat(currentTotalElement.textContent.split(': ')[1]) || 0;
                    currentSum += parseFloat(values[key].value);
                    currentTotalElement.textContent = Current Total: ${currentSum};
                }
            }
        });
    </script>
</body>
</html>