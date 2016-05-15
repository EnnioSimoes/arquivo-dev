

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Nome', 'Nome:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Slug', 'Slug:') !!}
            {!! Form::text('slug', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<h3>Privilégios disponíveis</h3><hr>
<div class="row">
    @foreach($resources as $key => $resource)
        <div class="col-sm-6 col-md-3">
            <h4>{{ $resource->display_name }}</h4>
            @foreach($resource->permissions as $permission)
                <div class="checkbox-style form-group">
                    <input type="checkbox" name="permission[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}" autocomplete="off">
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
    @endforeach
</div>
