<div class="form-group{{ $errors->has('category_name') ? 'has-error' : ''}}">
    {!! Form::label('category_name', 'Nama Kategori', ['class' => 'control-label']) !!}
    {!! Form::text('category_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('category_name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Batal dan Kembali</a>
</div>


<script>
    document.getElementById('resetForm').addEventListener('click', function() {
        document.querySelectorAll('input[type="text"]').forEach(input => input.value = '');
        document.querySelectorAll('select').forEach(select => select.value = '1');
    });
</script>
