@extends('admin/template/admin_template')
@section('content')
<div class="row">
  <div class="col-xs-12">
    @include('errors._check')
    <br />
    {!! Form::model($data, ['route' => ['admin.users.update', $data->id], 'files' => true]) !!}
        @include('admin.users._form')
        <div class="form-group">
            {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.users.index')}}" class = "btn btn-default">Voltar</a>
        </div>
    {!! Form::close() !!}
  </div>
</div>

@endsection
