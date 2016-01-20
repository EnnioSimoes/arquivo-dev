@extends('admin/template/admin_template')
@section('content')
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <a href="{{ route('admin.grupos.create') }}" class="btn btn-primary">Novo</a>
		  <div class="box-tools">
			<form method="GET" action="{{ route('admin.grupos.search') }}" >
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
			  <th>Nome</th>
			  <th>Ação</th>
			</tr>
			@foreach($data as $grupo)
			<tr>
			  <td><a href="{{route('admin.grupos.edit', ['id'=>$grupo->id]) }}" >{{ $grupo->nome }}</a></td>
			  <td>
				<div class="btn-group">
				  <button type="button" class="btn btn-default">Ação</button>
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<span class="caret"></span>
					<span class="sr-only">Toggle Dropdown</span>
				  </button>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="{{route('admin.grupos.edit', ['id'=>$grupo->id]) }}">Editar</a></li>
					<li><a href="#" id="excluir" data-toggle="modal" data-id="{{ $grupo->id }}" data-target="#myModal">Excluir</a></li>
				  </ul>
				</div>
			  </td>
			</tr>
			@endforeach
		  </table>
		  @if(isset($search))
			{!! $data->appends(['table_search' => $search])->render() !!}
		  @else
			{!! $data->render() !!}
		  @endif
		</div>
	  <!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
</div>
{{-- MODAL EXCLUIR --}}
<div id="myModal" class="modal modal-danger">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">×</span></button>
		<h4 class="modal-title">Excluir Grupo</h4>
	  </div>
	  <div class="modal-body">
		<p>Deseja excluir este grupo?</p>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
		<a href="grupos/delete/" id="act-link-delete"><button type="button" class="btn btn-outline">Sim</button></a>
	  </div>
	</div>
	<!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection
