<div class="form-group{{ $errors->has('package_name') ? 'has-error' : ''}}">
    {!! Form::label('package_name', 'Package Name', ['class' => 'control-label']) !!}
    {!! Form::text('package_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('package_name', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group{{ $errors->has('boat_id') ? 'has-error' : ''}}">
    {!! Form::label('boat_id', 'Boat Id', ['class' => 'control-label']) !!}
    {!! Form::number('boat_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_id', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group{{ $errors->has('boat_id') ? 'has-error' : ''}}">
    {!! Form::label('boat_id', 'Boat', ['class' => 'control-label']) !!}
    {!! Form::select('boat_id', $boats->pluck('boat_name', 'id')->prepend('Choose Boat', ''), null, ['class' => 'form-control']) !!}
    {!! $errors->first('boat_id', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group{{ $errors->has('package_key_visual') ? 'has-error' : ''}}">
    {!! Form::label('package_key_visual', 'Package Key Visual', ['class' => 'control-label']) !!}
    {!! Form::file('package_key_visual', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('package_key_visual', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group{{ $errors->has('package_key_visual') ? 'has-error' : ''}}">
    {!! Form::label('package_key_visual', 'Key Visual', ['class' => 'control-label']) !!}
    {!! Form::file('package_key_visual', ['class' => 'form-control', 'id' => 'package_key_visual', 'onchange' => 'previewImage(event)']) !!}
    {!! $errors->first('package_key_visual', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <img id="image_preview" src="{{ isset($boattravelpackage) && $boattravelpackage->package_key_visual ? asset( $boattravelpackage->package_key_visual) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($boattravelpackage) && $boattravelpackage->package_key_visual ? 'block' : 'none' }};" />
</div>
<div class="form-group{{ $errors->has('package_short_description') ? 'has-error' : ''}}">
    {!! Form::label('package_short_description', 'Package Short Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('package_short_description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('package_short_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('package_description') ? 'has-error' : ''}}">
    {!! Form::label('package_description', 'Package Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('package_description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('package_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('location') ? 'has-error' : ''}}">
    {!! Form::label('location', 'Location', ['class' => 'control-label']) !!}
    {!! Form::text('location', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('have_itenary') ? 'has-error' : ''}}">
    {!! Form::label('have_itenary', 'Have Itenary', ['class' => 'control-label']) !!}
    <br>
    {!! Form::radio('have_itenary', '1', true, ['id' => 'yes']) !!}
    {!! Form::label('yes', 'Yes') !!}
    <br>
    {!! Form::radio('have_itenary', '0', false, ['id' => 'no']) !!}
    {!! Form::label('no', 'No') !!}
    <br>
    {!! $errors->first('have_itenary', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('itenary_list') ? 'has-error' : ''}}">
    {!! Form::label('itenary_list', 'Itenary List', ['class' => 'control-label']) !!}
    {!! Form::textarea('itenary_list', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('itenary_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('include_list') ? 'has-error' : ''}}">
    {!! Form::label('include_list', 'Include List', ['class' => 'control-label']) !!}
    {!! Form::textarea('include_list', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('include_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('exclude_list') ? 'has-error' : ''}}">
    {!! Form::label('exclude_list', 'Exclude List', ['class' => 'control-label']) !!}
    {!! Form::textarea('exclude_list', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('exclude_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('seo_meta_description') ? 'has-error' : ''}}">
    {!! Form::label('seo_meta_description', 'Seo Meta Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('seo_meta_description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('seo_meta_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('seo_meta_keywords') ? 'has-error' : ''}}">
    {!! Form::label('seo_meta_keywords', 'Seo Meta Keywords', ['class' => 'control-label']) !!}
    {!! Form::textarea('seo_meta_keywords', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('seo_meta_keywords', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('highlight_video') ? 'has-error' : ''}}">
    {!! Form::label('highlight_video', 'Highlight Video', ['class' => 'control-label']) !!}
    {!! Form::text('highlight_video', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('highlight_video', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group{{ $errors->has('language_id') ? 'has-error' : ''}}">
    {!! Form::label('language_id', 'Language Id', ['class' => 'control-label']) !!}
    {!! Form::number('language_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('language_id', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group{{ $errors->has('language_id') ? 'has-error' : ''}}">
    {!! Form::label('language_id', 'Language', ['class' => 'control-label']) !!}
    {!! Form::select('language_id', $languages->pluck('language_name', 'id')->prepend('Choose Language', ''), null, ['class' => 'form-control']) !!}
    {!! $errors->first('language_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    {!! Form::reset('Reset', ['class' => 'btn btn-warning']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger">Cancel and Back</a>
</div>


<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('image_preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
