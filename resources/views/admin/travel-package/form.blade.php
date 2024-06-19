<div class="form-group{{ $errors->has('package_name') ? 'has-error' : ''}}">
    {!! Form::label('package_name', 'Package Name', ['class' => 'control-label']) !!}
    {!! Form::text('package_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('package_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('destination_id') ? 'has-error' : ''}}">
    {!! Form::label('destination_id', 'Destination', ['class' => 'control-label']) !!}
    {!! Form::select('destination_id', $destinations->pluck('name', 'id')->prepend('Choose Destination', ''), null, ['class' => 'form-control']) !!}
    {!! $errors->first('destination_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'editor']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('package_key_visual') ? 'has-error' : ''}}">
    {!! Form::label('package_key_visual', 'Key Visual', ['class' => 'control-label']) !!}
    {!! Form::file('package_key_visual', ['class' => 'form-control', 'id' => 'package_key_visual', 'onchange' => 'previewImage(event)']) !!}
    {!! $errors->first('package_key_visual', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <img id="image_preview" src="{{ isset($travelpackage) && $travelpackage->package_key_visual ? asset( $travelpackage->package_key_visual) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($travelpackage) && $travelpackage->package_key_visual ? 'block' : 'none' }};" />
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
<div class="form-group{{ $errors->has('itenary_list') ? ' has-error' : '' }}">
    {!! Form::label('itenary_list', 'Itenary List', ['class' => 'control-label']) !!}
    {!! Form::textarea('itenary_list', null, ['class' => 'form-control', 'id' => 'itenary_list']) !!}
    {!! $errors->first('itenary_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('include_list') ? ' has-error' : '' }}">
    {!! Form::label('include_list', 'Include List', ['class' => 'control-label']) !!}
    {!! Form::textarea('include_list', null, ['class' => 'form-control', 'id' => 'include_list']) !!}
    {!! $errors->first('include_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('exclude_list') ? ' has-error' : '' }}">
    {!! Form::label('exclude_list', 'Exclude List', ['class' => 'control-label']) !!}
    {!! Form::textarea('exclude_list', null, ['class' => 'form-control', 'id' => 'exclude_list']) !!}
    {!! $errors->first('exclude_list', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('language_id') ? 'has-error' : ''}}">
    {!! Form::label('language_id', 'Language', ['class' => 'control-label']) !!}
    {!! Form::select('language_id', $languages->pluck('language_name', 'id')->prepend('Choose Language', ''), null, ['class' => 'form-control']) !!}
    {!! $errors->first('language_id', '<p class="help-block">:message</p>') !!}
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

<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
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
