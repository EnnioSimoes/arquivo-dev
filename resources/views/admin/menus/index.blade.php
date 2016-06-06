@extends('admin/template/admin_template')
@section('content')
    <link rel="stylesheet" href="{{ asset('/bower_components/domenu/jquery.domenu-0.95.77.css') }}">
    <link rel="stylesheet" href="{{ asset('/bower_components/select2/dist/css/select2.min.css') }}">

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Escolha um menu para gerenciar</b>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="menu">Menus disponíveis</label>
                        <select class="form-control" name="menu">
                            <option>Navegação Principal</option>
                            <option>Sidebar do Blog</option>
                            <option>Sidebar Categoria Tal</option>
                        </select>
                    </div>
                    <hr>
                    <form class="" action="index.html" method="post">
                        <div class="form-group">
                            <label for="nome">Criar novo menu</label>
                            <input type="text" name="nome" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="criar-menu" class="btn btn-primary form-control"  value="Criar novo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Navegação Principal</b>
                </div>
                <div class="panel-body">

                    <div class="dd" id="domenu-1">
                      <button id="domenu-add-item-btn" class="dd-new-item">+</button>
                      <!-- .dd-item-blueprint is a template for all .dd-item's -->
                      <li class="dd-item-blueprint">
                        <!-- @migrating-from 0.48.59 button container -->
                        <button class="collapse" data-action="collapse" type="button" style="display: none;">–</button>
                        <button class="expand" data-action="expand" type="button" style="display: none;">+</button>
                        <div class="dd-handle dd3-handle">Drag</div>
                        <div class="dd3-content">
                          <span class="item-name">[item_name]</span>
                          <!-- @migrating-from 0.13.29 button container-->
                          <!-- .dd-button-container will hide once an item enters the edit mode -->
                          <div class="dd-button-container">
                            <!-- @migrating-from 0.13.29 add button-->
                            <button class="custom-button-example">&#x270E;</button>
                            <button class="item-add">+</button>
                            <button class="item-remove" data-confirm-class="item-remove-confirm">&times;</button>
                          </div>
                          <!-- Inside of .dd-edit-box you can add your custom input fields -->
                          <div class="dd-edit-box" style="display: none;">
                            <!-- data-placeholder has a higher priority than placeholder -->
                            <!-- data-placeholder can use token-values; when not present will be set to "" -->
                            <!-- data-default-value specifies a default value for the input; when not present will be set to "" -->
                            <input type="text" name="title" autocomplete="off" placeholder="Item"
                                   data-placeholder="Any nice idea for the title?"
                                   data-default-value="doMenu List Item. {?numeric.increment}">
                            <select name="custom-select">
                              <option>select something...</option>
                              <optgroup label="Pages">
                                <option value="http://example.com/page/1">http://example.com/page/1</option>
                                <option value="http://example.com/page/2">http://example.com/page/2</option>
                              </optgroup>
                              <optgroup label="Categories">
                                <option value="3">News</option>
                                <option value="4">Stories</option>
                              </optgroup>
                            </select>
                            <i class="end-edit">save</i>
                          </div>
                        </div>
                      </li>

                      <ol class="dd-list"></ol>
                    </div>


                    {{-- <div id="domenu-1-output" class="output-preview-container">
                      <h4>JSON Output Preview (User menu)</h4>
                      <textarea style="width: 100%; min-height: 300px;" name="jsonOutput" class="jsonOutput"></textarea>
                      <input type="checkbox" name="keepchages" class="keepChanges" checked> Keep changes after page reload (localStorage)
                      <br><br>
                      <input style="display:none;" type="button" name="clearLocalStorage" class="clearLocalStorage" value="Reset demo">
                    </div> --}}

                </div>
                <div class="panel-footer">
                    <div class="container">
                        <button type="submit" name="gravar-menu" class="btn btn-primary pull-left">Gravar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/bower_components/domenu/jquery.domenu-0.95.77.min.js') }}"></script>
    <script src="{{ asset('/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/menus.js') }}"></script>
@endsection
