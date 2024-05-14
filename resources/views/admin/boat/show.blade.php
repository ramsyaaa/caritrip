@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Boat Detail</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $boat->id }}</td>
                                    </tr>
                                    <tr><th> Boat Name </th><td> {{ $boat->boat_name }} </td></tr><tr><th> Boat Length </th><td> {{ $boat->boat_length }} </td></tr><tr><th> Boat Width </th><td> {{ $boat->boat_width }} </td></tr><tr><th> Boat Depth </th><td> {{ $boat->boat_depth }} </td></tr><tr><th> Boat Speed </th><td> {{ $boat->boat_speed }} </td></tr><tr><th> Boat Year Built </th><td> {{ $boat->boat_year_built }} </td></tr><tr><th> Boat Fuel Capacity </th><td> {{ $boat->boat_fuel_capacity }} </td></tr><tr><th> Boat Water Capacity </th><td> {{ $boat->boat_water_capacity }} </td></tr><tr><th> Boat Origin </th><td> {{ $boat->boat_origin }} </td></tr><tr><th> Boat Material </th><td> {{ $boat->boat_material }} </td></tr><tr><th> Boat Main Engine </th><td> {{ $boat->boat_main_engine }} </td></tr><tr><th> Boat Dingy </th><td> {{ $boat->boat_dingy }} </td></tr><tr><th> Boat Safety Equipment </th><td> {{ $boat->boat_safety_equipment }} </td></tr><tr><th> Boat Facility </th><td> {{ $boat->boat_facility }} </td></tr><tr><th> Boat Capacity </th><td> {{ $boat->boat_capacity }} </td></tr><tr><th> Boat Entertainment </th><td> {{ $boat->boat_entertainment }} </td></tr><tr><th> Boat Featured Image </th><td> {{ $boat->boat_featured_image }} </td></tr><tr><th> Seo Meta Description </th><td> {{ $boat->seo_meta_description }} </td></tr><tr><th> Seo Meta Keywords </th><td> {{ $boat->seo_meta_keywords }} </td></tr><tr><th> Language Id </th><td> {{ $boat->language_id }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/boat') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection