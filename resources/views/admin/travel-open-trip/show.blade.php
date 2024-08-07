@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Detail Open Trip Travel</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Tanggal </th><td>{{ $open_trip->date }}</td></tr>
                                    <tr><th> Durasi </th><td>{{ $open_trip->duration }}</td></tr>
                                    <tr><th> Harga </th><td>Rp{{ number_format($open_trip->price, 0, ',', '.') }} {{ $open_trip->unit }}</td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/travel-package/' . $travel_package_id . '/open-trip') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
