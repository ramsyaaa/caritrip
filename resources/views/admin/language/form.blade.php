<div class="form-group{{ $errors->has('language_name') ? 'has-error' : ''}}">
    {!! Form::label('language_name', 'Language Name', ['class' => 'control-label']) !!}
    {!! Form::text('language_name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('language_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('language_code') ? 'has-error' : ''}}">
    {!! Form::label('language_code', 'Language Code', ['class' => 'control-label']) !!}
    {!! Form::text('language_code', null, ['class' => 'form-control']) !!}
    {!! $errors->first('language_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('is_default') ? 'has-error' : ''}}">
    {!! Form::label('is_default', 'Is Default', ['class' => 'control-label']) !!}
    {!! Form::select('is_default', json_decode('{"1":"Yes","0":"No"}', true), null, ['class' => 'form-control']) !!}
    {!! $errors->first('is_default', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('is_active') ? 'has-error' : ''}}">
    {!! Form::label('is_active', 'Is Active', ['class' => 'control-label']) !!}
    {!! Form::select('is_active', json_decode('{"1":"Yes","0":"No"}', true), null, ['class' => 'form-control']) !!}
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    <button type="button" class="btn btn-warning" id="resetForm">Reset</button>
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel and Back</a>
</div>

<script>
document.getElementById('resetForm').addEventListener('click', function() {
    document.querySelectorAll('input[type="text"]').forEach(input => input.value = '');
    document.querySelectorAll('select').forEach(select => select.value = '1');
});
</script>
