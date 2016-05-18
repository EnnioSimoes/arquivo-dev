<div class="form-group">
    {!! Form::label('Nome', 'Nome:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Slug', 'Slug:') !!}
    {!! Form::text('display_name', null, ['class'=>'form-control', 'placeholder'=>'Opcional']) !!}
</div>
<div class="form-group">
    {!! Form::label('Descrição', 'Descrição:') !!}
    {!! Form::text('description', null, ['class'=>'form-control', 'placeholder'=>'Opcional']) !!}
</div>
