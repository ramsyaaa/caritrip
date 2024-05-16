@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Language Detail</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Language Name </th><td> {{ $language->language_name }} </td></tr><tr><th> Language Code </th><td> {{ $language->language_code }} </td></tr><tr><th> Is Default </th><td> {{ $language->is_default ? 'Yes' : 'No' }} </td></tr><tr><th> Is Active </th><td> {{ $language->is_active ? 'Yes' : 'No' }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url($language_default . '/admin/language') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
