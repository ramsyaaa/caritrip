@extends('admin.layout.master')

@section('content')
<main class="main-content">
    <div class="position-relative">
    </div>
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div
            class="d-flex justify-content-between align-items-center flex-wrap mb-4 gap-3"
        >
            <div class="d-flex flex-column">
                <h3>Quick Insights</h3>
                <p class="text-primary mb-0">Admin Dashboard</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-3">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div
                            class="d-flex align-items-start justify-content-between mb-2"
                        >
                            <p class="mb-0 text-dark">Total Pengguna</p>
                            {{-- <a
                                class="badge rounded-pill bg-soft-primary"
                                href="javascript:void(0);"
                            >
                                View
                            </a> --}}
                        </div>
                        <div class="mb-3">
                            <h2 class="counter">{{ number_format($total_users, 0, ',', '.') }}</h2>
                            {{-- <small>Last updated 1 hour ago.</small> --}}
                        </div>
                        <div>
                            <div id="chart_div"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Negara</th><th>Browser</th><th>URL</th><th>Grup</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($today_logs as $i => $item)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $item->country }}</td><td>{{ $item->browser }}</td><td>{{ $item->url }}</td><td>{{ $item->group_page }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
                // Load the Visualization API and the corechart package
                google.charts.load('current', {'packages':['corechart']});

                // Set a callback to run when the Google Visualization API is loaded
                google.charts.setOnLoadCallback(drawChart);

                // Fungsi untuk menggambar chart
                function drawChart() {
                    // Mengambil data dari PHP
                    var days = JSON.parse('<?php echo json_encode(array_keys($last_users)); ?>');
                    var values = JSON.parse('<?php echo json_encode(array_values($last_users)); ?>');

                    // Format data untuk Google Charts
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Day');
                    data.addColumn('number', 'Number of Users');

                    for (var i = 0; i < days.length; i++) {
                        data.addRow([days[i], values[i]]);
                    }

                    // Set options untuk chart
                    var options = {
                        title: 'Pengguna yang mengakses dalam 7 hari terakhir',
                        hAxis: {title: 'Hari'},
                        vAxis: {title: 'Jumlah Pengguna'},
                        legend: 'none',
                        series: {
                            0: {
                                // Menampilkan bar chart berupa garis
                                type: 'line',
                                lineWidth: 5,
                                pointSize: 5
                            }
                        },
                        bar: { groupWidth: '95%' }
                    };

                    // Instantiate and draw the chart
                    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
            </script>
        </div>
    </div>
</main>
@endsection
