<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Imagem', 'Imagem:') !!}
            @if(isset($data->avatar) && $data->avatar != '')
                <br>
                <img src="{{ asset('assets/images/avatar') }}/{{ $data->avatar }}" style="max-width: 500px; max-height: 400px;">
                <br>
                <br>
            @endif
            {!! Form::file('avatar', ['id' => 'imageLoader']) !!}
            <p class="help-block">Selecione a area para cortar</p>
            <div style="max-width: 450px; max-height: 450px;">
                <canvas style="max-width: 450px; max-height: 450px;" id="imageCanvas" class="hidden"></canvas>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Nome', 'Nome:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Sobrenome', 'Sobrenome:') !!}
            {!! Form::text('sobrenome', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('E-mail', 'E-mail:') !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Senha', 'Senha:') !!}
            {!! Form::text('password', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Repetir a Senha', 'Repetir a Senha:') !!}
            {!! Form::text('repetir-password', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Status', 'Status:') !!}
            {!! Form::select('ativo', [1 => 'ativo', 2 => 'inativo'], null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="[ col-xs-12 col-sm-6 ]">
            <h3>Papéis disponíveis</h3><hr />

            @foreach($roles as $role)
                <div class="checkbox-style form-group">
                        <input type="checkbox" name="roles[]" value="{{$role->id}}" id="role-{{$role->id}}" autocomplete="off"
                        @foreach($data->roles as $role_user)
                        @if($role_user->pivot->role_id == $role->id)
                            checked="checked"
                        @endif
                    @endforeach
                        />
                    <div class="btn-group">
                        <label for="role-{{$role->id}}" class="btn btn-default btn-xs">
                            <span class="glyphicon glyphicon-ok"></span>
                            <span> </span>
                        </label>
                        <label for="role-{{$role->id}}" class="btn btn-default btn-xs active">
                            {{$role->display_name}}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
{{-- HIDDENS --}}
    {!! Form::hidden('x1') !!}
    {!! Form::hidden('y1') !!}
    {!! Form::hidden('x2') !!}
    {!! Form::hidden('y2') !!}
<script src="{{ asset('/assets/admin/js/jquery.imgareaselect.pack.js') }}"></script>
<script src="{{ asset('/assets/admin/js/classes/ManipulaImagensClass.js') }}"></script>
<script type="text/javascript">

</script>

<script type="text/javascript">
    $(document).ready(function () {
        var teste = new ManipulaImagensClass();
        teste.iniciar();        
        
//        $('#imageCanvas').imgAreaSelect({
//            // var canvas = this;
//            // console.log($('#imageCanvas'));
//            // canvas.removeClass('hidden');
//            onSelectEnd: function (img, selection) {
//                $('input[name="x1"]').val(selection.x1);
//                $('input[name="y1"]').val(selection.y1);
//                $('input[name="x2"]').val(selection.x2);
//                $('input[name="y2"]').val(selection.y2);
//            }
//        });
    });
</script>
<script type="text/javascript">
    var imageLoader = document.getElementById('imageLoader');
        imageLoader.addEventListener('change', handleImage, false);
    var canvas = document.getElementById('imageCanvas');
    var ctx = canvas.getContext('2d');

    function handleImage(e){
        var reader = new FileReader();
        reader.onload = function(event){
            console.log(canvas);
            $('#imageCanvas').removeClass('hidden');
            var img = new Image();
            img.onload = function(){
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img,0,0);
            }
            img.src = event.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    }
</script>
