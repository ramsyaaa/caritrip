<div class="form-group{{ $errors->has('page_title') ? 'has-error' : ''}}">
    {!! Form::label('page_title', 'Judul Halaman', ['class' => 'control-label']) !!}
    {!! Form::text('page_title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('page_breadcrumbs_title') ? 'has-error' : ''}}">
    {!! Form::label('page_breadcrumbs_title', 'Judul Breadcrumbs Halaman', ['class' => 'control-label']) !!}
    {!! Form::text('page_breadcrumbs_title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_breadcrumbs_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('page_og_image') ? 'has-error' : ''}}">
    {!! Form::label('page_og_image', 'Gambar OG', ['class' => 'control-label']) !!}
    {!! Form::file('page_og_image', ['class' => 'form-control', 'id' => 'page_og_image', 'onchange' => 'previewOgImage(event)']) !!}
    {!! $errors->first('page_og_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <img id="og_image_preview" src="{{ isset($page) && $page->page_og_image ? asset( $page->page_og_image) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($page) && $page->page_og_image ? 'block' : 'none' }};" />
</div>
<div class="form-group{{ $errors->has('page_banner_image') ? 'has-error' : ''}}">
    {!! Form::label('page_banner_image', 'Gambar Banner', ['class' => 'control-label']) !!}
    {!! Form::file('page_banner_image', ['class' => 'form-control', 'id' => 'page_banner_image', 'onchange' => 'previewBannerImage(event)']) !!}
    {!! $errors->first('page_banner_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <img id="banner_image_preview" src="{{ isset($page) && $page->page_banner_image ? asset( $page->page_banner_image) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($page) && $page->page_banner_image ? 'block' : 'none' }};" />
</div>
<div class="form-group{{ $errors->has('page_meta_description') ? 'has-error' : ''}}">
    {!! Form::label('page_meta_description', 'Meta Deskripsi Halaman', ['class' => 'control-label']) !!}
    {!! Form::textarea('page_meta_description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_meta_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('page_friendly_url') ? 'has-error' : ''}}">
    {!! Form::label('page_friendly_url', 'Friendly URL', ['class' => 'control-label']) !!}
    {!! Form::text('page_friendly_url', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_friendly_url', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('page_meta_keywords') ? 'has-error' : ''}}">
    {!! Form::label('page_meta_keywords', 'Meta Keyword Halaman', ['class' => 'control-label']) !!}
    {!! Form::textarea('page_meta_keywords', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_meta_keywords', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('page_category') ? 'has-error' : ''}}">
    {!! Form::label('page_category', 'Kategori Halaman', ['class' => 'control-label']) !!}
    {!! Form::select('page_category', json_decode('{"Home":"Home","About":"About","Boats":"Boats","Packages":"Packages","Blogs":"Blogs","Contact":"Contact"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_category', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('language_id') ? 'has-error' : ''}}">
    {!! Form::label('language_id', 'Bahasa', ['class' => 'control-label']) !!}
    {!! Form::select('language_id', $languages->pluck('language_name', 'id')->prepend('Choose Language', ''), null, ['class' => 'form-control']) !!}
    {!! $errors->first('language_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Batal dan Kembali</a>
</div>

<script>
    function previewOgImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('og_image_preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function previewBannerImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('banner_image_preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
