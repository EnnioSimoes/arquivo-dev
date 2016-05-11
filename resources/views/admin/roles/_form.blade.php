{{-- <div class="form-group">
    {!! Form::label('Nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Opcional']) !!}
</div> --}}

<div class="row">
    <div class="col-md-6">
        <h3>Escolha um grupo de usuários</h3><hr>
        <select class="form-control">
            <option>Administrador</option>
            <option>Gestor de conteúdo</option>
            <option>Usuário</option>
        </select>
    </div>
</div>
<h3>Privilégios disponíveis</h3><hr>
<div class="row">
    <div class="col-md-6">
        <h4>Posts</h4>
        <?php for ($i=0; $i < 5; $i++): ?>
            <div class="checkbox-style form-group pull-left">
                <input type="checkbox" name="roles[]" value="2" id="role-2" autocomplete="off">
                <div class="btn-group">
                    <label for="role-2" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-ok"></span>
                        <span>&nbsp;</span>
                    </label>
                    <label for="role-2" class="btn btn-default btn-xs active">
                        Editar
                    </label>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h4>Categorias</h4>
        <?php for ($i=0; $i < 5; $i++): ?>
            <div class="checkbox-style form-group pull-left">
                <input type="checkbox" name="roles[]" value="2" id="role-2" autocomplete="off">
                <div class="btn-group">
                    <label for="role-2" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-ok"></span>
                        <span>&nbsp;</span>
                    </label>
                    <label for="role-2" class="btn btn-default btn-xs active">
                        Editar
                    </label>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h4>Sites</h4>
        <?php for ($i=0; $i < 5; $i++): ?>
            <div class="checkbox-style form-group pull-left">
                <input type="checkbox" name="roles[]" value="2" id="role-2" autocomplete="off">
                <div class="btn-group">
                    <label for="role-2" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-ok"></span>
                        <span>&nbsp;</span>
                    </label>
                    <label for="role-2" class="btn btn-default btn-xs active">
                        Editar
                    </label>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h4>Usuários</h4>
        <?php for ($i=0; $i < 5; $i++): ?>
            <div class="checkbox-style form-group pull-left">
                <input type="checkbox" name="roles[]" value="2" id="role-2" autocomplete="off">
                <div class="btn-group">
                    <label for="role-2" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-ok"></span>
                        <span>&nbsp;</span>
                    </label>
                    <label for="role-2" class="btn btn-default btn-xs active">
                        Editar
                    </label>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>
