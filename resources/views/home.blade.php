@extends('layout')

@section('content')
  

<div class="content">
        <div style="width: 80%; margin: 20px auto;">
            <canvas id="heartbeatChart"></canvas>
        </div>
    </div>

    <script>
        // Fetch data from the route
        fetch('/get-seed-data')
            .then(response => response.json())
            .then(data => {
                const months = Array.from({ length: 12 }, (_, index) => `Month ${index + 1}`);

                const seedInputData = data.seed_input.map(item => item.value);
                const seedResponseData = data.seed_response.map(item => item.value);

                const ctx = document.getElementById('heartbeatChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: months,
                        datasets: [
                            {
                                label: 'Seed Input',
                                data: seedInputData,
                                borderColor: '#40d8fe',
                                backgroundColor: 'rgba(64, 216, 254, 0.2)',
                                borderWidth: 2,
                                fill: true,
                                tension: 0.4,
                            },
                            {
                                label: 'Seed Response',
                                data: seedResponseData,
                                borderColor: '#68bbff',
                                backgroundColor: 'rgba(104, 187, 255, 0.2)',
                                borderWidth: 2,
                                fill: true,
                                tension: 0.4,
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Months',
                                    color: '#333'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Values',
                                    color: '#333'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>







<div class="chart-container">
            <canvas id="pieChart"></canvas>
        </div>

        <script>
        // Get the data passed from the controller
        const chartData = @json($chartData);

        // Pie chart data preparation
        const pieData = {
            labels: chartData.labels,  // Field names (from field_name column)
            datasets: [{
                data: chartData.values,  // Values (from value column)
                backgroundColor: [
                    '#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF7F50', '#FFD700', '#8A2BE2'
                ],
                hoverBackgroundColor: [
                    '#FF4384', '#36A2DB', '#FFBE56', '#5ACF50', '#FF6F50', '#FFBF00', '#7A2DE2'
                ]
            }]
        };

        // Pie chart configuration
        const config = {
            type: 'pie',
            data: pieData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        };

        // Render the pie chart
        const ctx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctx, config);
    </script>



@endsection
