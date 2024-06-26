<div class="form-group{{ $errors->has('image_name') ? 'has-error' : ''}}">
    {!! Form::label('image_name', 'Nama Gambar', ['class' => 'control-label']) !!}
    {!! Form::text('image_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('image_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('image_description') ? 'has-error' : ''}}">
    {!! Form::label('image_description', 'Deskripsi Gambar', ['class' => 'control-label']) !!}
    {!! Form::textarea('image_description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('image_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('key_visual') ? 'has-error' : ''}}">
    {!! Form::label('key_visual', 'Gambar', ['class' => 'control-label']) !!}
    {!! Form::file('key_visual', ['class' => 'form-control', 'id' => 'key_visual', 'onchange' => 'previewImage(event)']) !!}
    {!! $errors->first('key_visual', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <img id="image_preview" src="{{ isset($boatimage) && $boatimage->key_visual ? asset( $boatimage->key_visual) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($boatimage) && $boatimage->key_visual ? 'block' : 'none' }};" />
</div>


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
