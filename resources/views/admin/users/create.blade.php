@extends('admin/template/admin_template')
@section('content')

            @include('errors._check')
            <br />
            {!! Form::open(['route'=>'admin.users.store', 'files' => true]) !!}
            @include('admin.users._form')
            <div class="form-group">
                {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                <a href="{{route('admin.users.index')}}" class = "btn btn-default">Voltar</a>
            </div>
            {!! Form::close() !!}
    
@endsection
