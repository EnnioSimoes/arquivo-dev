  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('/assets/images/avatar') }}/{{ isset($usuario_logado) ? $usuario_logado->avatar : 'NULL'}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ isset($usuario_logado) ? $usuario_logado->name : 'NULL'}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active">
            <a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <li>
            <a href="{{ route('admin.posts.index') }}"><i class="fa fa-link"></i> <span>Posts</span></a>
        </li>
        <li>
            <a href="{{ route('admin.sites.index') }}"><i class="fa fa-link"></i> <span>Sites</span></a>
        </li>
        @role('admin')
            <li>
                <a href="{{ route('admin.categorias.index') }}"><i class="fa fa-link"></i> <span>Categorias</span></a>
            </li>
            <li>
                <a href="{{ route('admin.menus.index') }}"><i class="fa fa-link"></i> <span>Menus</span></a>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Controle de acesso</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-link"></i> <span>Usuários</span></a></li>
                <li><a href="{{ route('admin.roles.index') }}"><i class="fa fa-link"></i><span>Papéis</span></a></li>
                <li><a href="{{ route('admin.permissions.index') }}"><i class="fa fa-link"></i><span>Permissões</span></a></li>
              </ul>
            </li>
            <li>
                <a href="{{ route('admin.roles.manager') }}"><i class="fa fa-link"></i> <span>Papeis / Permissões</span></a>
            </li>
        @endrole
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
