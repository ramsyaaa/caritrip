@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">BoatTravelTrip Detail</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $boattraveltrip->id }}</td>
                                    </tr>
                                    <tr><th> Package Id </th><td> {{ $boattraveltrip->package_id }} </td></tr><tr><th> Trip Category </th><td> {{ $boattraveltrip->trip_category }} </td></tr><tr><th> Trip Subcategory </th><td> {{ $boattraveltrip->trip_subcategory }} </td></tr><tr><th> Trip Name </th><td> {{ $boattraveltrip->trip_name }} </td></tr><tr><th> Trip Days </th><td> {{ $boattraveltrip->trip_days }} </td></tr><tr><th> Trip Price </th><td> {{ $boattraveltrip->trip_price }} </td></tr><tr><th> Trip Note </th><td> {{ $boattraveltrip->trip_note }} </td></tr><tr><th> Language Id </th><td> {{ $boattraveltrip->language_id }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/boat-travel-trip') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection