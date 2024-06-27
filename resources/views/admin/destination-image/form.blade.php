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
