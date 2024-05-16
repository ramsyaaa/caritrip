@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add New Language</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => $language_default . '/admin/language', 'class' => '', 'enctype' => 'multipart/form-data'])  !!}
                            @include ('admin.language.form', ['formMode' => 'create'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
