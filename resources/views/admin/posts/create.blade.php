@extends('admin/template/admin_template')
@section('content')
<div class="row">
    {{ $categorias[0]->nome }}
  <div class="col-xs-12">
    @include('errors._check')
    <br />
    {!! Form::open(['route'=>'admin.posts.store']) !!}
        @include('admin.posts._form')
        <div class="form-group">
            {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection
