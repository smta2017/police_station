<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/accuses.fields.id').':') !!}
    <p>{{ $accuse->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/accuses.fields.name').':') !!}
    <p>{{ $accuse->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/accuses.fields.created_at').':') !!}
    <p>{{ $accuse->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/accuses.fields.updated_at').':') !!}
    <p>{{ $accuse->updated_at }}</p>
</div>

