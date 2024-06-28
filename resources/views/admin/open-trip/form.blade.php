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
<div class="form-group{{ $errors->has('extra_bed_price') ? 'has-error' : ''}}">
    {!! Form::label('extra_bed_price', 'Harga Extra Kasur', ['class' => 'control-label']) !!}
    {!! Form::text('extra_bed_price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('extra_bed_price', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Batal dan Kembali</a>
</div>

