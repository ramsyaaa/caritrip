@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Gambar Paket Kapal</h4>
                        </div>
                    </div>
                    <div class="card-body">
                       {!! Form::model($boatimage, [
                            'method' => 'PATCH',
                            'url' => ['/admin/boat-travel-package/' . $boat_travel_package_id . '/images', $boatimage->id],
                            'class' => '','enctype' => 'multipart/form-data']) !!}

                            @include ('admin.boat-travel-package-image.form', ['formMode' => 'edit'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
