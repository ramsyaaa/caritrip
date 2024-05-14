@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Page Detail</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $page->id }}</td>
                                    </tr>
                                    <tr><th> Page Title </th><td> {{ $page->page_title }} </td></tr><tr><th> Page Breadcrumbs Title </th><td> {{ $page->page_breadcrumbs_title }} </td></tr><tr><th> Page Og Image </th><td> {{ $page->page_og_image }} </td></tr><tr><th> Page Banner Image </th><td> {{ $page->page_banner_image }} </td></tr><tr><th> Page Meta Description </th><td> {{ $page->page_meta_description }} </td></tr><tr><th> Page Friendly Url </th><td> {{ $page->page_friendly_url }} </td></tr><tr><th> Page Meta Keywords </th><td> {{ $page->page_meta_keywords }} </td></tr><tr><th> Page Category </th><td> {{ $page->page_category }} </td></tr><tr><th> Language Id </th><td> {{ $page->language_id }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/page') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection