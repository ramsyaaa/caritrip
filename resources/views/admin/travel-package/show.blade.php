@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Travel Package Detail</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Package Name </th><td> {{ $travelpackage->package_name }} </td></tr><tr><th> Destination </th><td> {{ $travelpackage->destination ? $travelpackage->destination->name : "" }} </td></tr>
                                    <tr><th> Package Image </th><td>
                                        <img id="image_preview" src="{{ asset( $travelpackage->package_key_visual) }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($travelpackage) ? 'block' : 'none' }};" />
                                    </td></tr>
                                    <tr><th> Have Itenary </th><td> {{ $travelpackage->have_itenary ? 'Yes' : 'No' }} </td></tr><tr><th> Itenary List </th><td> {!! $travelpackage->itenary_list !!} </td></tr><tr><th> Include List </th><td> {!! $travelpackage->include_list !!} </td></tr><tr><th> Exclude List </th><td> {!! $travelpackage->exclude_list !!} </td></tr><tr><th> Language </th><td> {{ $travelpackage->language ? $travelpackage->language->language_name : '' }} </td></tr><tr><th> Seo Meta Description </th><td> {{ $travelpackage->seo_meta_description }} </td></tr><tr><th> Seo Meta Keywords </th><td> {{ $travelpackage->seo_meta_keywords }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/travel-package') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ url('/admin/travel-package/' . $travelpackage->id . '/images') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Images</button></a>
                            <a href="{{ url('/admin/travel-package/' . $travelpackage->id . '/open-trip') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Open Trip</button></a>
                            <a href="{{ url('/admin/travel-package/' . $travelpackage->id . '/private-trip') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Private Trip</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
