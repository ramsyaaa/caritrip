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
                                    <tr><th> Boat Name </th><td> {{ $boat->boat_name }} </td></tr><tr><th> Boat Length </th><td> {{ $boat->boat_length }} m </td></tr><tr><th> Boat Width </th><td> {{ $boat->boat_width }} m </td></tr><tr><th> Boat Depth </th><td> {{ $boat->boat_depth }} m </td></tr><tr><th> Boat Speed </th><td> {{ $boat->boat_speed }} knots </td></tr><tr><th> Boat Year Built </th><td> {{ $boat->boat_year_built }} </td></tr><tr><th> Boat Fuel Capacity </th><td> {{ $boat->boat_fuel_capacity }} liters </td></tr><tr><th> Boat Water Capacity </th><td> {{ $boat->boat_water_capacity }} liters </td></tr><tr><th> Boat Origin </th><td> {{ $boat->boat_origin }} </td></tr><tr><th> Boat Material </th><td> {{ $boat->boat_material }} </td></tr><tr><th> Boat Main Engine </th><td> {{ $boat->boat_main_engine }} </td></tr><tr><th> Boat Dingy </th><td> {{ $boat->boat_dingy }} </td></tr><tr><th> Boat Safety Equipment </th><td> {!! $boat->boat_safety_equipment !!} </td></tr><tr><th> Boat Facility </th><td> {!! $boat->boat_facility !!} </td></tr><tr><th> Boat Capacity </th><td> {{ $boat->boat_capacity }} pax </td></tr><tr><th> Boat Entertainment </th><td> {{ $boat->boat_entertainment }} </td></tr><tr><th> Boat Image </th><td>
                                        <img id="image_preview" src="{{ isset($boat) && $boat->boat_featured_image ? asset( $boat->boat_featured_image) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($boat) ? 'block' : 'none' }};" />
                                    </td></tr><tr><th> Highligt Video </th><td> {{ $boat->highlight_video }} </td></tr><tr><th> Language </th><td> {{ $boat->language ? $boat->language->language_name : '' }} </td></tr><tr><th> Seo Meta Description </th><td> {{ $boat->seo_meta_description }} </td></tr><tr><th> Seo Meta Keywords </th><td> {{ $boat->seo_meta_keywords }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/boat') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ url('/admin/boat/' . $boat->id . '/images') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Images</button></a>
                            <a href="{{ url('/admin/boat/' . $boat->id . '/cabins') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Cabins</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
