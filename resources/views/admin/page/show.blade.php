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
                                    <tr><th> Page Title </th><td> {{ $page->page_title }} </td></tr><tr><th> Page Breadcrumbs Title </th><td> {{ $page->page_breadcrumbs_title }} </td></tr>
                                    <tr><th> Page Og Image </th><td>
                                        <img id="og_image_preview" src="{{ asset( $page->page_og_image) }}" alt="Og Image Preview" style="max-height: 300px; display: {{ isset($page) ? 'block' : 'none' }};" />
                                    </td></tr>
                                    <tr><th> Page Og Image </th><td>
                                        <img id="banner_image_preview" src="{{ asset( $page->page_banner_image) }}" alt="Banner Image Preview" style="max-height: 300px; display: {{ isset($page) ? 'block' : 'none' }};" />
                                    </td></tr>
                                    <tr><th> Page Meta Description </th><td> {{ $page->page_meta_description }} </td></tr><tr><th> Page Friendly Url </th><td> {{ $page->page_friendly_url }} </td></tr><tr><th> Page Meta Keywords </th><td> {{ $page->page_meta_keywords }} </td></tr><tr><th> Page Category </th><td> {{ $page->page_category }} </td></tr><tr><th> Language </th><td> {{ $page->language ? $page->language->language_name : '' }} </td></tr>
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
