@extends('layout')

@section('content')
    
<div class="header">
        <h1>Social Media Analytics</h1>
    </div>
    <div class="container">
        <!-- Google Analytics Pie Chart -->
     
        <div class="chart-container">
        <h2>Google Analytics Chart</h2>
            <canvas id="googleAnalyticsChart"></canvas>
        </div>

        <!-- Microsoft Clarity Pie Chart -->
        <div class="chart-container">
        <h2>Microsoft Clarity Chart</h2>
            <canvas id="microsoftClarityChart"></canvas>
        </div>
    </div>
    <div class="container">
        <!-- Facebook Pie Chart -->
        <div class="chart-container">
        <h2>Facebook Chart</h2>
            <canvas id="facebookChart"></canvas>
        </div>

        <!-- Instagram Pie Chart -->
        <div class="chart-container">
        <h2>Instagram Chart</h2>
            <canvas id="instagramChart"></canvas>
        </div>
    </div>
    <div class="container">
        <!-- Snapchat Pie Chart -->
        <div class="chart-container">
        <h2>Snapchat Chart</h2>
            <canvas id="snapchatChart"></canvas>
        </div>
    </div>

    <script>
        const googleAnalyticsData = @json($googleAnalytics);
        const microsoftClarityData = @json($microsoftClarity);
        const facebookData = @json($facebook);
        const instagramData = @json($instagram);
        const snapchatData = @json($snapchat);

        function createPieChart(ctx, data, labels) {
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    }
                }
            });
        }

        // Google Analytics Chart
        createPieChart(document.getElementById('googleAnalyticsChart').getContext('2d'), 
            [googleAnalyticsData.sessions, googleAnalyticsData.users, googleAnalyticsData.pageviews], 
            ['Sessions', 'Users', 'Pageviews']);

        // Microsoft Clarity Chart
        createPieChart(document.getElementById('microsoftClarityChart').getContext('2d'), 
            [microsoftClarityData.visitors, microsoftClarityData.clicks, microsoftClarityData.scroll_depth], 
            ['Visitors', 'Clicks', 'Scroll Depth']);

        // Facebook Chart
        createPieChart(document.getElementById('facebookChart').getContext('2d'), 
            [facebookData.likes, facebookData.comments, facebookData.shares], 
            ['Likes', 'Comments', 'Shares']);

        // Instagram Chart
        createPieChart(document.getElementById('instagramChart').getContext('2d'), 
            [instagramData.followers, instagramData.likes, instagramData.comments], 
            ['Followers', 'Likes', 'Comments']);

        // Snapchat Chart
        createPieChart(document.getElementById('snapchatChart').getContext('2d'), 
            [snapchatData.views, snapchatData.swipes, snapchatData.screenshots], 
            ['Views', 'Swipes', 'Screenshots']);
    </script>


@endsection
