@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Cabin Detail</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th>Name</th><td>{{ $cabin->name }}</td></tr>
                                    <tr><th>Amount</th><td>{{ $cabin->amount }} Unit</td></tr>
                                    <tr><th>Description</th><td>{{ $cabin->description }}</td></tr>
                                    <tr><th> Image </th><td>
                                        <img id="image_preview" src="{{ isset($cabin) && $cabin->image ? asset( $cabin->image) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($cabin) ? 'block' : 'none' }};" />
                                    </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/boat/' . $boat_id . '/cabins') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
