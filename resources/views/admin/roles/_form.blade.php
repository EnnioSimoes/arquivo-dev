

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Nome', 'Nome:') !!}
            {!! Form::text('display_name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Slug', 'Slug:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Descrição', 'Descrição:') !!}
            {!! Form::text('description', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <h5>Permissões disponíveis</h5>
        @foreach($permissions as $permission)
            <div class="checkbox-style form-group">
                <input type="checkbox" name="permission[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}" autocomplete="off"
                @if(isset($data->permission))
                    @foreach($data->permission as $key => $role_permission)
                        @if($permission->id == $role_permission->id)
                            checked
                        @endif
                    @endforeach
                @endif
                >
                <div class="btn-group">
                    <label for="permission-{{ $permission->id }}" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-ok"></span>
                        <span>&nbsp;</span>
                    </label>
                    <label for="permission-{{ $permission->id }}" class="btn btn-default btn-xs active">
                        {{ $permission->display_name }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>
