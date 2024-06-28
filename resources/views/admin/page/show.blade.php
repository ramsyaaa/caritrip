@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Detail Halaman</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Judul Halaman </th><td> {{ $page->page_title }} </td></tr><tr><th> Judul Breadcrumbs Halaman </th><td> {{ $page->page_breadcrumbs_title }} </td></tr>
                                    <tr><th> Gambar Og </th><td>
                                        <img id="og_image_preview" src="{{ asset( $page->page_og_image) }}" alt="Og Image Preview" style="max-height: 300px; display: {{ isset($page) ? 'block' : 'none' }};" />
                                    </td></tr>
                                    <tr><th> Gambar Banner </th><td>
                                        <img id="banner_image_preview" src="{{ asset( $page->page_banner_image) }}" alt="Banner Image Preview" style="max-height: 300px; display: {{ isset($page) ? 'block' : 'none' }};" />
                                    </td></tr>
                                    <tr><th> Meta Deskripsi Halaman </th><td> {{ $page->page_meta_description }} </td></tr><tr><th> Friendly Url </th><td> {{ $page->page_friendly_url }} </td></tr><tr><th> Meta Keywords Halaman </th><td> {{ $page->page_meta_keywords }} </td></tr><tr><th> Kategori Halaman </th><td> {{ $page->page_category }} </td></tr><tr><th> Bahasa </th><td> {{ $page->language ? $page->language->language_name : '' }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/page') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
