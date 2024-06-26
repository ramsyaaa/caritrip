@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Detail Kapal</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Nama Kapal </th><td> {{ $boat->boat_name }} </td></tr><tr><th> Panjang Kapal </th><td> {{ $boat->boat_length }} m </td></tr><tr><th> Lebar Kapal </th><td> {{ $boat->boat_width }} m </td></tr><tr><th> Kedalaman Perahu </th><td> {{ $boat->boat_depth }} m </td></tr><tr><th> Kecepatan </th><td> {{ $boat->boat_speed }} knots </td></tr><tr><th> Tahun Pembuatan </th><td> {{ $boat->boat_year_built }} </td></tr><tr><th> Kapasitas Bensin </th><td> {{ $boat->boat_fuel_capacity }} liters </td></tr><tr><th> Kapasitas Air </th><td> {{ $boat->boat_water_capacity }} liters </td></tr><tr><th> Asal Kapal </th><td> {{ $boat->boat_origin }} </td></tr><tr><th> Material Kapal </th><td> {{ $boat->boat_material }} </td></tr><tr><th> Mesin Utama </th><td> {{ $boat->boat_main_engine }} </td></tr><tr><th> Dinghy </th><td> {{ $boat->boat_dingy }} </td></tr><tr><th> Peralatan Keselamatan </th><td> {!! $boat->boat_safety_equipment !!} </td></tr><tr><th> Fasilitas </th><td> {!! $boat->boat_facility !!} </td></tr><tr><th> Kapasitas </th><td> {{ $boat->boat_capacity }} pax </td></tr><tr><th> Hiburan </th><td> {{ $boat->boat_entertainment }} </td></tr><tr><th> Kapal </th><td>
                                        <img id="image_preview" src="{{ isset($boat) && $boat->boat_featured_image ? asset( $boat->boat_featured_image) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($boat) ? 'block' : 'none' }};" />
                                    </td></tr><tr><th> Highlight Video </th><td> {{ $boat->highlight_video }} </td></tr><tr><th> Bahasa </th><td> {{ $boat->language ? $boat->language->language_name : '' }} </td></tr><tr><th> Seo Meta Deskripsi </th><td> {{ $boat->seo_meta_description }} </td></tr><tr><th> Seo Meta Keywords </th><td> {{ $boat->seo_meta_keywords }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/boat') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Kembali</button></a>
                            <a href="{{ url('/admin/boat/' . $boat->id . '/images') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Gambar</button></a>
                            <a href="{{ url('/admin/boat/' . $boat->id . '/cabins') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Kabin</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
