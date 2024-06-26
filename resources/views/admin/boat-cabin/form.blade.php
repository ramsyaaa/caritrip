<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Nama Kabin', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('amount') ? 'has-error' : ''}}">
    {!! Form::label('amount', 'Jumlah Kabin', ['class' => 'control-label']) !!}
    {!! Form::text('amount', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Deskripsi Kabin', ['class' => 'control-label']) !!}
    {!! Form::text('description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Gambar', ['class' => 'control-label']) !!}
    {!! Form::file('image', ['class' => 'form-control', 'id' => 'image', 'onchange' => 'previewImage(event)']) !!}
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <img id="image_preview" src="{{ isset($cabin) && $cabin->image ? asset( $cabin->image) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($cabin) && $cabin->image ? 'block' : 'none' }};" />
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
