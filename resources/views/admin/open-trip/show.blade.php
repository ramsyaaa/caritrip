@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Detail Open Trip</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Kabin </th><td>{{ $open_trip->cabin ? $open_trip->cabin->name : '' }}</td></tr>
                                    <tr><th> Durasi </th><td>{{ $open_trip->duration }}</td></tr>
                                    <tr><th> Harga </th><td>{{ number_format($open_trip->price, 0, ',', '.') }}</td></tr>
                                    <tr><th> Harga Extra Kasur </th><td>{{ number_format($open_trip->extra_bed_price, 0, ',', '.') }}</td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/boat-travel-package/' . $boat_travel_package_id . '/open-trip') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
