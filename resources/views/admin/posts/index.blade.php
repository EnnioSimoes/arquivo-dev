@extends('admin/template/admin_template')
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a class="btn btn-primary">Novo</a>
          <div class="box-tools">
            <form method="GET" action="{{ route('admin.posts.search') }}" >
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
              <th>Título</th>
              <th width="50%">Descrição</th>
              <th>Autor</th>
              <th>Status</th>
              <th>Ação</th>
            </tr>
            @foreach($posts as $post)
            <tr>
              <td><a href="#" target="_blank">{{ $post->titulo }}</a></td>
              <td>{{ $post->descricao }}</td>
              <td>{{ $post->autor }}</td>
              <td>
                  @if($post->ativo == 1)
                    <span class="label label-success">Ativo</span>
                  @else
                    <span class="label label-danger">Inativo</span>
                  @endif
              </td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-default">Ação</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Editar</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal">Excluir</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            @endforeach
          </table>
          @if(isset($search))
            {!! $posts->appends(['table_search' => $search])->render() !!}
          @else
            {!! $posts->render() !!}
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
        <h4 class="modal-title">Excluir Post</h4>
      </div>
      <div class="modal-body">
        <p>Deseja excluir este post?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-outline">Sim</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection
