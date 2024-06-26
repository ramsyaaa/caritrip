@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Detail Paket Kapal</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Nama Paket </th><td> {{ $boattravelpackage->package_name }} </td></tr><tr><th> Kapal </th><td> {{ $boattravelpackage->boat ? $boattravelpackage->boat->boat_name : "" }} </td></tr><tr><th> Destinasi </th><td> {{ $boattravelpackage->destination ? $boattravelpackage->destination->name : "" }} </td></tr><tr><th> Sub Kategori Paket </th><td> {{ $boattravelpackage->trip_subcategory }} </td></tr>
                                    <tr><th> Gambar Paket </th><td>
                                        <img id="image_preview" src="{{ asset( $boattravelpackage->package_key_visual) }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($boattravelpackage) ? 'block' : 'none' }};" />
                                    </td></tr>
                                    <tr><th> Punya Itinerary </th><td> {{ $boattravelpackage->have_itenary ? 'Yes' : 'No' }} </td></tr><tr><th> Itenary List </th><td> {!! $boattravelpackage->itenary_list !!} </td></tr><tr><th> Include List </th><td> {!! $boattravelpackage->include_list !!} </td></tr><tr><th> Exclude List </th><td> {!! $boattravelpackage->exclude_list !!} </td></tr><tr><th> Paket Populer </th><td> {{ $boattravelpackage->is_popular ? 'Yes' : 'No' }} </td></tr><tr><th> Bahasa </th><td> {{ $boattravelpackage->language ? $boattravelpackage->language->language_name : '' }} </td></tr><tr><th> Seo Meta Description </th><td> {{ $boattravelpackage->seo_meta_description }} </td></tr><tr><th> Seo Meta Keywords </th><td> {{ $boattravelpackage->seo_meta_keywords }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/boat-travel-package') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Kembali</button></a>
                            <a href="{{ url('/admin/boat-travel-package/' . $boattravelpackage->id . '/images') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Gambar</button></a>
                            <a href="{{ url('/admin/boat-travel-package/' . $boattravelpackage->id . '/open-trip') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Open Trip</button></a>
                            <a href="{{ url('/admin/boat-travel-package/' . $boattravelpackage->id . '/private-trip') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Private Trip</button></a>
                            <a href="{{ url('/admin/boat-travel-package/' . $boattravelpackage->id . '/full-day-cruise') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Full Day Cruise</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
