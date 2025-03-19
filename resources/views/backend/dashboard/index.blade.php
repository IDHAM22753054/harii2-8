@extends('backend.app')
@section('content')
    <div class="container-fluid mt-3">
        <div class="page-inner">
            Welcome Section
            <div class="jumbotron text-center text-white bg-dark p-3 rounded">
                <h2 class="fw-bold">Selamat Datang di Dashboard Julian!</h2>
                <p class="lead">"Dashboard ini dirancang untuk mempermudah pekerjaan Anda.<br>
                    Lihat data penting, pantau perkembangan, dan kelola informasi
                    dengan lebih praktis."</p>
            </div>

            <!-- Card Section -->
            <h3 class="fw-bold mb-3 mt-4">Card</h3>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Visitors</p>
                                        <h4 class="card-title">1,294</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-info card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Subscribers</p>
                                        <h4 class="card-title">1,303</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Sales</p>
                                        <h4 class="card-title">$ 1,345</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-secondary card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="far fa-check-circle"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Order</p>
                                        <h4 class="card-title">576</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Section -->
            <h3 class="fw-bold mb-3 mt-4">Grafik</h3>
            <div class="row ml-3"> <!-- Tambahkan margin kiri -->
                <div class="col-md-5 d-flex justify-content-center">
                    <canvas id="pieChart" style="max-width: 400px; max-height: 400px;"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="barChart" style="max-width: 600px; max-height: 500px;"></canvas>
                    <p class="text-muted mt-2" style="font-size: 14px; text-align: left;">
                        <strong>Keterangan Nilai:</strong><br>
                        A: 80 - 100<br>
                        B: 70 - 79<br>
                        C: 60 - 69<br>
                        D: 50 - 59<br>
                        E: < 50 </p>
                </div>
            </div>

        </div>
    </div>
    </div>

    @php
        $students = DB::table('students')->count();
        $teacher = DB::table('teacher')->count();
        $mapels = DB::table('mapels')->count();

        $grades = [
            'A' => DB::table('nilai')->whereBetween('nilai', [80, 100])->count(),
            'B' => DB::table('nilai')->whereBetween('nilai', [70, 79])->count(),
            'C' => DB::table('nilai')->whereBetween('nilai', [60, 69])->count(),
            'D' => DB::table('nilai')->whereBetween('nilai', [50, 59])->count(),
            'E' => DB::table('nilai')->where('nilai', '<', 50)->count(),
        ];
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Pie Chart
        var ctxPie = document.getElementById('pieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Students', 'Teachers', 'Mata Pelajaran'],
                datasets: [{
                    data: [{{ $students }}, {{ $teacher }}, {{ $mapels }}],
                    backgroundColor: ['#87CEEB', '#4682B4', '#00BFFF'] // Variasi biru muda
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Bar Chart
        var ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['A', 'B', 'C', 'D', 'E'],
                datasets: [{
                    label: 'Jumlah Nilai',
                    data: [{{ $grades['A'] }}, {{ $grades['B'] }}, {{ $grades['C'] }}, {{ $grades['D'] }}, {{ $grades['E'] }}],
                    backgroundColor: ['#87CEEB', '#5F9EA0', '#00CED1', '#1E90FF', '#4682B4'] // Warna biru muda dengan variasi gradasi
                }]
            },
        });
    </script>

@endsection