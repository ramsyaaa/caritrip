@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">BoatTravelTripImage Detail</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $boattraveltripimage->id }}</td>
                                    </tr>
                                    <tr><th> Package Id </th><td> {{ $boattraveltripimage->package_id }} </td></tr><tr><th> Trip Id </th><td> {{ $boattraveltripimage->trip_id }} </td></tr><tr><th> Images </th><td> {{ $boattraveltripimage->images }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/boat-travel-trip-image') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection