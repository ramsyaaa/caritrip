<div class="form-group{{ $errors->has('cabin_id') ? 'has-error' : ''}}">
    {!! Form::label('cabin_id', 'Kabin', ['class' => 'control-label']) !!}
    {!! Form::select('cabin_id', $cabins->pluck('name', 'id')->prepend('Pilih Kabin', ''), null, ['class' => 'form-control']) !!}
    {!! $errors->first('cabin_id', '<p class="help-block">:message</p>') !!}
</div>
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
<div class="form-group{{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Harga', ['class' => 'control-label']) !!}
    {!! Form::text('price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div style="display: flex; gap: 30px;">
    <div>
        <Label>Harga per pax</Label>
        <div class="flex items-center mb-4">
            <input name="per_pax" id="per_pax" type="checkbox" @if(isset($open_trip)) @if($open_trip->per_pax) checked @endif @endif>
            <label for="per_pax">Yes</label>
        </div>

    </div>
    <div>
        <Label>Harga per hari</Label>
        <div class="flex items-center mb-4">
            <input name="per_day" id="per_day" type="checkbox" @if(isset($open_trip)) @if($open_trip->per_day) checked @endif @endif>
            <label for="per_day">Yes</label>
        </div>

    </div>
</div>
{!! $errors->first('per_pax', '<p class="help-block">:message</p>') !!}
{!! $errors->first('per_day', '<p class="help-block">:message</p>') !!}

<div class="form-group{{ $errors->has('extra_bed_price') ? 'has-error' : ''}}">
    {!! Form::label('extra_bed_price', 'Harga Extra Kasur', ['class' => 'control-label']) !!}
    {!! Form::text('extra_bed_price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('extra_bed_price', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Batal dan Kembali</a>
</div>

