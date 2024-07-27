<div class="form-group{{ $errors->has('days') || $errors->has('nights') ? 'has-error' : ''}}" style="display: flex; gap: 10px;">
    <div style="flex: 1;">
        {!! Form::label('days', 'Hari', ['class' => 'control-label']) !!}
        {!! Form::text('days', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('days', '<p class="help-block">:message</p>') !!}
    </div>
    <div style="flex: 1;">
        {!! Form::label('nights', 'Malam', ['class' => 'control-label']) !!}
        {!! Form::text('nights', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('nights', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('pax') ? 'has-error' : ''}}">
    {!! Form::label('pax', 'Jumlah Penumpang', ['class' => 'control-label']) !!}
    {!! Form::text('pax', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('pax', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Harga', ['class' => 'control-label']) !!}
    {!! Form::text('price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div style="display: flex; gap: 30px;">
    <div>
        <Label>Harga per pax</Label>
        <div class="flex items-center mb-4">
            <input name="per_pax" id="per_pax" type="checkbox" @if(isset($private_trip)) @if($private_trip->per_pax) checked @endif @endif>
            <label for="per_pax">Yes</label>
        </div>

    </div>
    <div>
        <Label>Harga per hari</Label>
        <div class="flex items-center mb-4">
            <input name="per_day" id="per_day" type="checkbox" @if(isset($private_trip)) @if($private_trip->per_day) checked @endif @endif>
            <label for="per_day">Yes</label>
        </div>

    </div>
</div>

<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Batal dan Kembali</a>
</div>

