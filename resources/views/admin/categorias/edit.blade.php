@extends('admin/template/admin_template')
@section('content')
<div class="row">
  <div class="col-xs-12">
    @include('errors._check')
    <br />
    {!! Form::model($categoria, ['route' => ['admin.categorias.update', $categoria->id], 'files' => true]) !!}
        @include('admin.categorias._form')
        <div class="form-group">
            {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection
