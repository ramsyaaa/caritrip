@extends('admin.layout.master')

@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Blog</h4>
                        </div>
                    </div>
                    <div class="card-body">
                       {!! Form::model($blog, [
                            'method' => 'PATCH',
                            'url' => ['/admin/blog', $blog->id],
                            'class' => '','enctype' => 'multipart/form-data']) !!}

                            @include ('admin.blog.form', ['formMode' => 'edit', 'blog_categories' => $blog_categories])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
