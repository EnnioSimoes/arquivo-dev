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
		  <table class="table table-hover">
			<tr>
			  <th>Permissões</th>
			  <th><p class="pull-right">Administrador</p></th>
			  <th><p class="pull-right">Editor</p></th>
			  <th><p class="pull-right">Usuário</p></th>
			</tr>
			<tr>
			  <td><a href="" >Criar Posts</a></td>
			  <td><input class="pull-right" type="checkbox"></td>
			  <td><input class="pull-right" type="checkbox"></td>
			  <td><input class="pull-right" type="checkbox"></td>
			</tr>
		  </table>
		  {{-- @if(isset($search))
			{!! $data->appends(['table_search' => $search])->render() !!}
		  @else
			{!! $data->render() !!}
		  @endif --}}
		</div>
	  <!-- /.box-body -->
	  </div>
	  <!-- /.box -->
  </div>
</div>

@endsection
