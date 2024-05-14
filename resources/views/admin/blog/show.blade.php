@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Blog Detail</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $blog->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $blog->title }} </td></tr><tr><th> Id Category </th><td> {{ $blog->id_category }} </td></tr><tr><th> Featured Image </th><td> {{ $blog->featured_image }} </td></tr><tr><th> Slug </th><td> {{ $blog->slug }} </td></tr><tr><th> Content </th><td> {{ $blog->content }} </td></tr><tr><th> Meta Description </th><td> {{ $blog->meta_description }} </td></tr><tr><th> Meta Keywords </th><td> {{ $blog->meta_keywords }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/blog') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection