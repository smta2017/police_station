<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', __('models/accuses.fields.id').':') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/accuses.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', __('models/accuses.fields.created_at').':') !!}
    {!! Form::text('created_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', __('models/accuses.fields.updated_at').':') !!}
    {!! Form::text('updated_at', null, ['class' => 'form-control']) !!}
</div>