@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Boat Travel Trip Image Detail</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Package </th><td> {{ $boattraveltripimage->package ? $boattraveltripimage->package->package_name : '' }} </td></tr><tr><th> Trip </th><td> {{ $boattraveltripimage->trip ? $boattraveltripimage->trip->trip_name : '' }} </td></tr><tr><th> Images </th><td> {{ $boattraveltripimage->images }} </td></tr>
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
