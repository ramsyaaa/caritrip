@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">BoatImage Detail</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $boatimage->id }}</td>
                                    </tr>
                                    <tr><th> Boat Id </th><td> {{ $boatimage->boat_id }} </td></tr><tr><th> Image Name </th><td> {{ $boatimage->image_name }} </td></tr><tr><th> Image Description </th><td> {{ $boatimage->image_description }} </td></tr><tr><th> Key Visual </th><td> {{ $boatimage->key_visual }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/boat-image') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection