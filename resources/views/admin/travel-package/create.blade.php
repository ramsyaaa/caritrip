@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Tambah Paket Travel</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => '/admin/travel-package', 'class' => '', 'enctype' => 'multipart/form-data'])  !!}
                            @include ('admin.travel-package.form', ['formMode' => 'create', 'languages' => $languages, 'destinations' => $destinations])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
