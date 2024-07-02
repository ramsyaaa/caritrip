@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Detail Blog</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped" role="grid">
                                <tbody>
                                    <tr><th> Judul </th><td> {{ $blog->title }} </td></tr><tr><th> Kategori </th><td> {{ $blog->category->category_name }} </td></tr><tr><th> Author </th><td> {{ $blog->user->name }} </td></tr>
                                    <tr><th> Gambar </th><td>
                                        <img id="image_preview" src="{{ asset( $blog->featured_image) }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($blog) ? 'block' : 'none' }};" />
                                    </td></tr>
                                    <tr><th> Slug </th><td> {{ $blog->slug }} </td></tr><tr><th> Konten </th><td> {!! $blog->content !!} </td></tr><tr><th> Meta Deskripsi </th><td> {{ $blog->meta_description }} </td></tr><tr><th> Meta Keywords </th><td> {{ $blog->meta_keywords }} </td></tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/admin/blog') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-close" aria-hidden="true"></i> Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
