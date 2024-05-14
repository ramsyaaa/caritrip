<div class="form-group{{ $errors->has('language_name') ? 'has-error' : ''}}">
    {!! Form::label('language_name', 'Language Name', ['class' => 'control-label']) !!}
    {!! Form::text('language_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('language_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('language_code') ? 'has-error' : ''}}">
    {!! Form::label('language_code', 'Language Code', ['class' => 'control-label']) !!}
    {!! Form::text('language_code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('language_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('is_default') ? 'has-error' : ''}}">
    {!! Form::label('is_default', 'Is Default', ['class' => 'control-label']) !!}
    {!! Form::select('is_default', json_decode('{"1":"Yes","0":"No"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('is_default', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('is_active') ? 'has-error' : ''}}">
    {!! Form::label('is_active', 'Is Active', ['class' => 'control-label']) !!}
    {!! Form::select('is_active', json_decode('{"1":"Yes","0":"No"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel and Back</a>
</div>
