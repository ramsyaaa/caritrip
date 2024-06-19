@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit BoatTravelTrip</h4>
                        </div>
                    </div>
                    <div class="card-body">
                       {!! Form::model($boattraveltrip, [
                            'method' => 'PATCH',
                            'url' => ['/admin/boat-travel-trip', $boattraveltrip->id],
                            'class' => '','enctype' => 'multipart/form-data']) !!}

                            @include ('admin.boat-travel-trip.form', ['formMode' => 'edit', 'packages' => $packages, 'languages' => $languages])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
