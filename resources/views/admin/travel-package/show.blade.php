@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Detail Paket Travel</h4>
                        </div>
                        <div>
                            <a href="{{ url('/admin/travel-package/' . $travelpackage->id . '/images') }}" class="flex items-center justify-center text-white rounded-lg px-3 py-2 text-[14px] bg-[#2C2D84]" style="background-color: #2C2D84;border-radius: 10px">Gambar</a>
                            <a href="{{ url('/admin/travel-package/' . $travelpackage->id . '/open-trip') }}" class="flex items-center justify-center text-white rounded-lg px-3 py-2 text-[14px] bg-[#2C2D84]" style="background-color: #2C2D84;border-radius: 10px">Open Trip</a>
                            <a href="{{ url('/admin/travel-package/' . $travelpackage->id . '/private-trip') }}" class="flex items-center justify-center text-white rounded-lg px-3 py-2 text-[14px] bg-[#2C2D84]" style="background-color: #2C2D84;border-radius: 10px">Private Trip</a>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Nama Paket </th><td> {{ $travelpackage->package_name }} </td></tr><tr><th> Destinasi </th><td> {{ $travelpackage->destination ? $travelpackage->destination->name : "" }} </td></tr><tr><th> Tanggal Keberangaktan </th><td> {{ $travelpackage->date_of_departure }} </td></tr>
                                    <tr><th> Deskripsi </th><td> {!! $travelpackage->description !!} </td></tr>
                                    <tr><th> Gambar </th><td>
                                        <img id="image_preview" src="{{ asset( $travelpackage->package_key_visual) }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($travelpackage) ? 'block' : 'none' }};" />
                                    </td></tr>
                                    <tr><th> Punya Itinerary </th><td> {{ $travelpackage->have_itenary ? 'Yes' : 'No' }} </td></tr><tr><th> Itenary List </th><td> {!! $travelpackage->itenary_list !!} </td></tr><tr><th> Include List </th><td> {!! $travelpackage->include_list !!} </td></tr><tr><th> Exclude List </th><td> {!! $travelpackage->exclude_list !!} </td></tr><tr><th> Instagram Post Embed </th><td>{!! $travelpackage->instagram_post !!}</td></tr><tr><th> Paket Populer </th><td> {{ $travelpackage->is_popular ? "Yes" : 'No' }} </td></tr><tr><th> Bahasa </th><td> {{ $travelpackage->language ? $travelpackage->language->language_name : '' }} </td></tr><tr><th> Seo Meta Description </th><td> {{ $travelpackage->seo_meta_description }} </td></tr><tr><th> Seo Meta Keywords </th><td> {{ $travelpackage->seo_meta_keywords }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/travel-package') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
