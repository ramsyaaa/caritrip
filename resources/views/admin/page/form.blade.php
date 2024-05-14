<div class="form-group{{ $errors->has('page_title') ? 'has-error' : ''}}">
    {!! Form::label('page_title', 'Page Title', ['class' => 'control-label']) !!}
    {!! Form::text('page_title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('page_breadcrumbs_title') ? 'has-error' : ''}}">
    {!! Form::label('page_breadcrumbs_title', 'Page Breadcrumbs Title', ['class' => 'control-label']) !!}
    {!! Form::text('page_breadcrumbs_title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_breadcrumbs_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('page_og_image') ? 'has-error' : ''}}">
    {!! Form::label('page_og_image', 'Page Og Image', ['class' => 'control-label']) !!}
    {!! Form::file('page_og_image', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_og_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('page_banner_image') ? 'has-error' : ''}}">
    {!! Form::label('page_banner_image', 'Page Banner Image', ['class' => 'control-label']) !!}
    {!! Form::file('page_banner_image', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_banner_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('page_meta_description') ? 'has-error' : ''}}">
    {!! Form::label('page_meta_description', 'Page Meta Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('page_meta_description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_meta_description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('page_friendly_url') ? 'has-error' : ''}}">
    {!! Form::label('page_friendly_url', 'Page Friendly Url', ['class' => 'control-label']) !!}
    {!! Form::text('page_friendly_url', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_friendly_url', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('page_meta_keywords') ? 'has-error' : ''}}">
    {!! Form::label('page_meta_keywords', 'Page Meta Keywords', ['class' => 'control-label']) !!}
    {!! Form::textarea('page_meta_keywords', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_meta_keywords', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('page_category') ? 'has-error' : ''}}">
    {!! Form::label('page_category', 'Page Category', ['class' => 'control-label']) !!}
    {!! Form::select('page_category', json_decode('{"Home":"Home","About":"About","Products":"Products","Packages":"Packages","Portfolios":"Portfolios","Services":"Services","Contact":"Contact"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('page_category', '<p class="help-block">:message</p>') !!}
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
