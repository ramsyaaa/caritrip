<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Destinasi', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div>
    <Label>Destinasi Internasional</Label>
    <div class="flex items-center">
        <input name="is_international" id="is_international" type="checkbox" @if(isset($destination)) @if($destination->is_international) checked @endif @endif>
        <label for="is_international">Yes</label>
    </div>
    {!! $errors->first('is_international', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Batal dan Kembali</a>
</div>
