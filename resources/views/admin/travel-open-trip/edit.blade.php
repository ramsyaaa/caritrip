@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Travel Open Trip</h4>
                        </div>
                    </div>
                    <div class="card-body">
                       {!! Form::model($open_trip, [
                            'method' => 'PATCH',
                            'url' => ['/admin/travel-package/' . $travel_package_id . '/open-trip', $open_trip->id],
                            'class' => '','enctype' => 'multipart/form-data']) !!}

                            @include ('admin.travel-open-trip.form', ['formMode' => 'edit'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
