{{-- <div class="form-group{{ $errors->has('boat_id') ? 'has-error' : ''}}">
    {!! Form::label('boat_id', 'Boat Id', ['class' => 'control-label']) !!}
    {!! Form::number('boat_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_id', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group{{ $errors->has('boat_id') ? 'has-error' : ''}}">
    {!! Form::label('boat_id', 'Boat', ['class' => 'control-label']) !!}
    {!! Form::select('boat_id', $boats->pluck('boat_name', 'id')->prepend('Choose Boat', ''), null, ['class' => 'form-control']) !!}
    {!! $errors->first('boat_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('image_name') ? 'has-error' : ''}}">
    {!! Form::label('image_name', 'Image Name', ['class' => 'control-label']) !!}
    {!! Form::text('image_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('image_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('image_description') ? 'has-error' : ''}}">
    {!! Form::label('image_description', 'Image Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('image_description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('image_description', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group{{ $errors->has('key_visual') ? 'has-error' : ''}}">
    {!! Form::label('key_visual', 'Key Visual', ['class' => 'control-label']) !!}
    {!! Form::file('key_visual', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('key_visual', '<p class="help-block">:message</p>') !!}
</div> --}}

<div class="form-group{{ $errors->has('key_visual') ? 'has-error' : ''}}">
    {!! Form::label('key_visual', 'Key Visual', ['class' => 'control-label']) !!}
    {!! Form::file('key_visual', ['class' => 'form-control', 'id' => 'key_visual', 'onchange' => 'previewImage(event)']) !!}
    {!! $errors->first('key_visual', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <img id="image_preview" src="{{ isset($boatimage) && $boatimage->key_visual ? asset( $boatimage->key_visual) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($boatimage) && $boatimage->key_visual ? 'block' : 'none' }};" />
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel and Back</a>
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
