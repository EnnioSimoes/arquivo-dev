@extends('admin/template/admin_template')
@section('content')
<div class="row">

  <div class="col-xs-12">
    @include('errors._check')
    <br />
    {!! Form::open(['route'=>'admin.permissions.store', 'files' => true]) !!}
        @include('admin.permissions._form')
        <div class="form-group">
            {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.permissions.index')}}" class = "btn btn-default">Voltar</a>
        </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection
