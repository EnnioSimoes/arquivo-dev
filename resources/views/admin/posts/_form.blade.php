<div class="form-group">
    {!! Form::label('Título', 'Título:') !!}
    {!! Form::text('post[titulo]', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Link', 'Link:') !!}
    {!! Form::text('post[link]', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Imagem', 'Imagem:') !!}
    {!! Form::text('post[imagem]', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Descrição', 'Descrição:') !!}
    {!! Form::text('post[descricao]', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Autor', 'Autor:') !!}
    {!! Form::text('post[autor]', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Categoria', 'Categoria:') !!}
    {!! Form::select('post[categoria_id]', $categorias, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Site', 'Site:') !!}
    {!! Form::select('post[site]', $sites, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Status', 'Status:') !!}
    {!! Form::select('post[ativo]', [1 => 'ativo', 2 => 'inativo'], null, ['class'=>'form-control']) !!}
</div>
