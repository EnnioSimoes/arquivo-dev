@extends('admin/template/admin_template')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Novo</a>
                    <div class="box-tools">
                        <form method="GET" action="{{ route('admin.roles.search') }}" >
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search" value="{{ isset($search) ? $search : '' }}">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Permissões</th>
                                @foreach ($roles as $key => $role)
                                    <th><p class="pull-right">{{ $role->display_name }}</p></th>
                                @endforeach
                            </tr>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td><a href="" >{{ $permission->display_name }}</a></td>
                                    @foreach($roles as $key => $role)

                                        <td>
                                            <input class="act-check-permission-role pull-right grupo-{{ $role->name }}" type="checkbox" value="{{ $role->name }}" data-role-id="{{ $role->id }}" data-permission-id="{{ $permission->id }}"
                                            @foreach($role->permission as $role_permission)
                                                @if($role_permission->id == $permission->id)
                                                    checked
                                                @endif
                                            @endforeach
                                            >
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <button class="act-envia-permission-role btn btn-primary pull-right">Gravar</button>
        </div>
    </div>
    <script src="{{ asset('/assets/admin/js/classes/RolesClass.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/roles.js') }}"></script>
@endsection
