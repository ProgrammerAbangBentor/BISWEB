@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <!-- Card Total Admin -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Users</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalAdmin }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Total Data -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-folder"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Data</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalNews }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Total Laporan -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Laporan</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalReports }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistik Total Data per Tahun</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="dataChart" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistik Total Laporan per Tahun</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="laporanChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>

    <script>
        const dataPerYear = @json($dataPerYear);
        const laporanPerYear = @json($laporanPerYear);

        // Chart untuk Total Data
        const ctxData = document.getElementById('dataChart').getContext('2d');
        const dataChart = new Chart(ctxData, {
            type: 'bar',
            data: {
                labels: Object.keys(dataPerYear),
                datasets: [{
                    label: 'Total Data',
                    data: Object.values(dataPerYear),
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });

        // Chart untuk Total Laporan
        const ctxLaporan = document.getElementById('laporanChart').getContext('2d');
        const laporanChart = new Chart(ctxLaporan, {
            type: 'bar',
            data: {
                labels: Object.keys(laporanPerYear),
                datasets: [{
                    label: 'Total Laporan',
                    data: Object.values(laporanPerYear),
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
@endpush
