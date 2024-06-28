@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit List Private Trip Travel</h4>
                        </div>
                    </div>
                    <div class="card-body">
                       {!! Form::model($private_trip, [
                            'method' => 'PATCH',
                            'url' => ['/admin/travel-package/' . $travel_package_id . '/private-trip', $private_trip->id],
                            'class' => '','enctype' => 'multipart/form-data']) !!}

                            @include ('admin.travel-private-trip.form', ['formMode' => 'edit'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
