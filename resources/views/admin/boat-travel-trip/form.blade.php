<div class="form-group{{ $errors->has('package_id') ? 'has-error' : ''}}">
    {!! Form::label('package_id', 'Package Id', ['class' => 'control-label']) !!}
    {!! Form::number('package_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('package_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('trip_category') ? 'has-error' : ''}}">
    {!! Form::label('trip_category', 'Trip Category', ['class' => 'control-label']) !!}
    {!! Form::select('trip_category', json_decode('{"Open Trip":"Open Trip","Private Trip":"Private Trip","Full Day Cruise":"Full Day Cruise"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('trip_category', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('trip_subcategory') ? 'has-error' : ''}}">
    {!! Form::label('trip_subcategory', 'Trip Subcategory', ['class' => 'control-label']) !!}
    {!! Form::select('trip_subcategory', json_decode('{"Leisure Trip":"Leisure Trip","Diving Trip":"Diving Trip"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('trip_subcategory', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('trip_name') ? 'has-error' : ''}}">
    {!! Form::label('trip_name', 'Trip Name', ['class' => 'control-label']) !!}
    {!! Form::text('trip_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('trip_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('trip_days') ? 'has-error' : ''}}">
    {!! Form::label('trip_days', 'Trip Days', ['class' => 'control-label']) !!}
    {!! Form::text('trip_days', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('trip_days', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('trip_price') ? 'has-error' : ''}}">
    {!! Form::label('trip_price', 'Trip Price', ['class' => 'control-label']) !!}
    {!! Form::number('trip_price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('trip_price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('trip_note') ? 'has-error' : ''}}">
    {!! Form::label('trip_note', 'Trip Note', ['class' => 'control-label']) !!}
    {!! Form::text('trip_note', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('trip_note', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('language_id') ? 'has-error' : ''}}">
    {!! Form::label('language_id', 'Language Id', ['class' => 'control-label']) !!}
    {!! Form::number('language_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('language_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel and Back</a>
</div>
