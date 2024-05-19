<div class="form-group{{ $errors->has('boat_name') ? 'has-error' : ''}}">
    {!! Form::label('boat_name', 'Boat Name', ['class' => 'control-label']) !!}
    {!! Form::text('boat_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_length') ? 'has-error' : ''}}">
    {!! Form::label('boat_length', 'Boat Length', ['class' => 'control-label']) !!}
    {!! Form::number('boat_length', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_length', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_width') ? 'has-error' : ''}}">
    {!! Form::label('boat_width', 'Boat Width', ['class' => 'control-label']) !!}
    {!! Form::number('boat_width', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_width', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_depth') ? 'has-error' : ''}}">
    {!! Form::label('boat_depth', 'Boat Depth', ['class' => 'control-label']) !!}
    {!! Form::number('boat_depth', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_depth', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_speed') ? 'has-error' : ''}}">
    {!! Form::label('boat_speed', 'Boat Speed', ['class' => 'control-label']) !!}
    {!! Form::text('boat_speed', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_speed', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_year_built') ? 'has-error' : ''}}">
    {!! Form::label('boat_year_built', 'Boat Year Built', ['class' => 'control-label']) !!}
    {!! Form::number('boat_year_built', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_year_built', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_fuel_capacity') ? 'has-error' : ''}}">
    {!! Form::label('boat_fuel_capacity', 'Boat Fuel Capacity', ['class' => 'control-label']) !!}
    {!! Form::number('boat_fuel_capacity', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_fuel_capacity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_water_capacity') ? 'has-error' : ''}}">
    {!! Form::label('boat_water_capacity', 'Boat Water Capacity', ['class' => 'control-label']) !!}
    {!! Form::number('boat_water_capacity', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_water_capacity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_origin') ? 'has-error' : ''}}">
    {!! Form::label('boat_origin', 'Boat Origin', ['class' => 'control-label']) !!}
    {!! Form::text('boat_origin', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_origin', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_material') ? 'has-error' : ''}}">
    {!! Form::label('boat_material', 'Boat Material', ['class' => 'control-label']) !!}
    {!! Form::text('boat_material', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_material', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_main_engine') ? 'has-error' : ''}}">
    {!! Form::label('boat_main_engine', 'Boat Main Engine', ['class' => 'control-label']) !!}
    {!! Form::text('boat_main_engine', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_main_engine', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_dingy') ? 'has-error' : ''}}">
    {!! Form::label('boat_dingy', 'Boat Dingy', ['class' => 'control-label']) !!}
    {!! Form::text('boat_dingy', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_dingy', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_safety_equipment') ? 'has-error' : ''}}">
    {!! Form::label('boat_safety_equipment', 'Boat Safety Equipment', ['class' => 'control-label']) !!}
    {!! Form::textarea('boat_safety_equipment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_safety_equipment', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_facility') ? 'has-error' : ''}}">
    {!! Form::label('boat_facility', 'Boat Facility', ['class' => 'control-label']) !!}
    {!! Form::textarea('boat_facility', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_facility', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_capacity') ? 'has-error' : ''}}">
    {!! Form::label('boat_capacity', 'Boat Capacity', ['class' => 'control-label']) !!}
    {!! Form::number('boat_capacity', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_capacity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_entertainment') ? 'has-error' : ''}}">
    {!! Form::label('boat_entertainment', 'Boat Entertainment', ['class' => 'control-label']) !!}
    {!! Form::text('boat_entertainment', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_entertainment', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('boat_featured_image') ? 'has-error' : ''}}">
    {!! Form::label('boat_featured_image', 'Featured Image', ['class' => 'control-label']) !!}
    {!! Form::file('boat_featured_image', ['class' => 'form-control', 'id' => 'boat_featured_image', 'onchange' => 'previewImage(event)']) !!}
    {!! $errors->first('boat_featured_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <img id="image_preview" src="{{ isset($boat) && $boat->boat_featured_image ? asset( $boat->boat_featured_image) : '' }}" alt="Image Preview" style="max-height: 300px; display: {{ isset($boat) && $boat->boat_featured_image ? 'block' : 'none' }};" />
</div>
{{-- <div class="form-group{{ $errors->has('boat_featured_image') ? 'has-error' : ''}}">
    {!! Form::label('boat_featured_image', 'Boat Featured Image', ['class' => 'control-label']) !!}
    {!! Form::file('boat_featured_image', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('boat_featured_image', '<p class="help-block">:message</p>') !!}
</div> --}}
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
<div class="form-group{{ $errors->has('language_id') ? 'has-error' : ''}}">
    {!! Form::label('language_id', 'Id Category', ['class' => 'control-label']) !!}
    {!! Form::select('language_id', $languages->pluck('language_name', 'id')->prepend('Choose Language', ''), null, ['class' => 'form-control']) !!}
    {!! $errors->first('language_id', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group{{ $errors->has('language_id') ? 'has-error' : ''}}">
    {!! Form::label('language_id', 'Language Id', ['class' => 'control-label']) !!}
    {!! Form::number('language_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('language_id', '<p class="help-block">:message</p>') !!}
</div> --}}


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
