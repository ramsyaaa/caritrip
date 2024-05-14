<div class="form-group{{ $errors->has('boat_id') ? 'has-error' : ''}}">
    {!! Form::label('boat_id', 'Boat Id', ['class' => 'control-label']) !!}
    {!! Form::number('boat_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
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
<div class="form-group{{ $errors->has('key_visual') ? 'has-error' : ''}}">
    {!! Form::label('key_visual', 'Key Visual', ['class' => 'control-label']) !!}
    {!! Form::file('key_visual', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('key_visual', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel and Back</a>
</div>
