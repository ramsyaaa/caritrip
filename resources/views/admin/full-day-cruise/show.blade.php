@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Full Day Cruise Detail</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Durasi </th><td>{{ $full_day_cruise->duration }}</td></tr>
                                    <tr><th> Jumlah Penumpang </th><td>{{ $full_day_cruise->pax }}</td></tr>
                                    <tr><th> Harga </th><td>{{ number_format($full_day_cruise->price, 0, ',', '.') }}</td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/boat-travel-package/' . $boat_travel_package_id . '/full-day-cruise') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
