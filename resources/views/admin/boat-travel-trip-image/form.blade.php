<div class="form-group{{ $errors->has('package_id') ? 'has-error' : ''}}">
    {!! Form::label('package_id', 'Package Id', ['class' => 'control-label']) !!}
    {!! Form::number('package_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('package_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('trip_id') ? 'has-error' : ''}}">
    {!! Form::label('trip_id', 'Trip Id', ['class' => 'control-label']) !!}
    {!! Form::number('trip_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('trip_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('images') ? 'has-error' : ''}}">
    {!! Form::label('images', 'Images', ['class' => 'control-label']) !!}
    {!! Form::textarea('images', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('images', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel and Back</a>
</div>
