@extends('layouts.admin_dashboard_layout')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>

        <div class="row">
            <!-- Total Users Graph -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Users</div>
                    <div class="card-body">
                        <canvas id="totalUsersChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Total Contents Graph -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Contents</div>
                    <div class="card-body">
                        <canvas id="totalContentsChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Total Categories Graph -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Categories</div>
                    <div class="card-body">
                        <canvas id="totalCategoriesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Dynamic Data
            const totalUsersData = {{ $totalUsers }};
            const totalContentsData = {
                articles: {{ $totalContents['articles'] }},
                comments: {{ $totalContents['comments'] }}
            };
            const totalCategoriesData = {{ $totalCategories }};

            // Total Users Chart
            const totalUsersCtx = document.getElementById('totalUsersChart').getContext('2d');
            new Chart(totalUsersCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Users'],
                    datasets: [{
                        data: [totalUsersData],
                        backgroundColor: ['#007bff'],
                    }]
                }
            });

            // Total Contents Chart
            const totalContentsCtx = document.getElementById('totalContentsChart').getContext('2d');
            new Chart(totalContentsCtx, {
                type: 'bar',
                data: {
                    labels: ['Articles', 'Comments'],
                    datasets: [{
                        data: [totalContentsData.articles, totalContentsData.comments],
                        backgroundColor: ['#28a745', '#ffc107'],
                    }]
                }
            });

            // Total Categories Chart
            const totalCategoriesCtx = document.getElementById('totalCategoriesChart').getContext('2d');
            new Chart(totalCategoriesCtx, {
                type: 'pie',
                data: {
                    labels: ['Categories'],
                    datasets: [{
                        data: [totalCategoriesData],
                        backgroundColor: ['#dc3545'],
                    }]
                }
            });
        });
    </script>
@endsection
