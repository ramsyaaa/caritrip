<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Destinasi', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div>
    <Label>Destinasi Internasional</Label>
    <div class="flex items-center">
        <input name="is_international" id="is_international" type="checkbox" @if(isset($destination)) @if($destination->is_international) checked @endif @endif>
        <label for="is_international">Yes</label>
    </div>
    {!! $errors->first('is_international', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Deskripsi', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'editor']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('destination_image') ? 'has-error' : ''}}">
    {!! Form::label('destination_image', 'Gambar', ['class' => 'control-label']) !!}
    {!! Form::file('destination_image', ['class' => 'form-control', 'id' => 'destination_image', 'onchange' => 'previewImage(event)']) !!}
    {!! $errors->first('destination_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <img id="image_preview" src="{{ isset($destination) && $destination->destination_image ? asset( $destination->destination_image) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($destination) && $destination->destination_image ? 'block' : 'none' }};" />
</div>

<div class="form-group" align="right">

    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    @if($formMode === 'edit')
        <a href="/admin/destination/{{ $destination->id }}/images" class="btn btn-warning">Gambar</a>
    @endif
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
