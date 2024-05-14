@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">BoatTravelPackage Detail</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $boattravelpackage->id }}</td>
                                    </tr>
                                    <tr><th> Package Name </th><td> {{ $boattravelpackage->package_name }} </td></tr><tr><th> Boat Id </th><td> {{ $boattravelpackage->boat_id }} </td></tr><tr><th> Package Key Visual </th><td> {{ $boattravelpackage->package_key_visual }} </td></tr><tr><th> Package Short Description </th><td> {{ $boattravelpackage->package_short_description }} </td></tr><tr><th> Package Description </th><td> {{ $boattravelpackage->package_description }} </td></tr><tr><th> Location </th><td> {{ $boattravelpackage->location }} </td></tr><tr><th> Have Itenary </th><td> {{ $boattravelpackage->have_itenary }} </td></tr><tr><th> Itenary List </th><td> {{ $boattravelpackage->itenary_list }} </td></tr><tr><th> Include List </th><td> {{ $boattravelpackage->include_list }} </td></tr><tr><th> Exclude List </th><td> {{ $boattravelpackage->exclude_list }} </td></tr><tr><th> Seo Meta Description </th><td> {{ $boattravelpackage->seo_meta_description }} </td></tr><tr><th> Seo Meta Keywords </th><td> {{ $boattravelpackage->seo_meta_keywords }} </td></tr><tr><th> Highlight Video </th><td> {{ $boattravelpackage->highlight_video }} </td></tr><tr><th> Language Id </th><td> {{ $boattravelpackage->language_id }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/boat-travel-package') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection