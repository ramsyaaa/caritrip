@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Tambah List Open Trip</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => '/admin/boat-travel-package/' . $boat_travel_package_id . '/open-trip', 'class' => '', 'enctype' => 'multipart/form-data'])  !!}
                            @include ('admin.open-trip.form', ['formMode' => 'create', 'cabins' => $cabins])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
