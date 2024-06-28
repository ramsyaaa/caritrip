<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Judul', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('id_category') ? 'has-error' : ''}}">
    {!! Form::label('id_category', 'Kategori', ['class' => 'control-label']) !!}
    {!! Form::select('id_category', $blog_categories->pluck('category_name', 'id')->prepend('Pilih Kategori', ''), null, ['class' => 'form-control']) !!}
    {!! $errors->first('id_category', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('featured_image') ? 'has-error' : ''}}">
    {!! Form::label('featured_image', 'Gambar', ['class' => 'control-label']) !!}
    {!! Form::file('featured_image', ['class' => 'form-control', 'id' => 'featured_image', 'onchange' => 'previewImage(event)']) !!}
    {!! $errors->first('featured_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <img id="image_preview" src="{{ isset($blog) && $blog->featured_image ? asset( $blog->featured_image) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($blog) && $blog->featured_image ? 'block' : 'none' }};" />
</div>
<div class="form-group{{ $errors->has('slug') ? 'has-error' : ''}}">
    {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}
    {!! Form::text('slug', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
    {!! Form::label('content', 'Konten', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'editor']) !!}
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('meta_description') ? 'has-error' : ''}}">
    {!! Form::label('meta_description', 'Meta Deskripsi', ['class' => 'control-label']) !!}
    {!! Form::textarea('meta_description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('meta_keywords') ? 'has-error' : ''}}">
    {!! Form::label('meta_keywords', 'Meta Keywords', ['class' => 'control-label']) !!}
    {!! Form::textarea('meta_keywords', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('meta_keywords', '<p class="help-block">:message</p>') !!}
</div>
</script>

<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Batal dan Kembali</a>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('image_preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
