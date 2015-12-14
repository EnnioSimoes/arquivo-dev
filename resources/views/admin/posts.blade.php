@extends('admin/template/admin_template')
@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Posts</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Título</th>
                  <th>Descrição</th>
                  <th>Autor</th>
                  <th>Status</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                  <td>{{ $post->titulo }}</td>
                  <td>{{ $post->descricao }}</td>
                  <td>{{ $post->autor }}</td>
                  <td>
                      @if($post->ativo == 1)  
                        <span class="label label-success">Ativo</span>
                      @else
                        <span class="label label-danger">Inativo</span>
                      @endif
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
@endsection