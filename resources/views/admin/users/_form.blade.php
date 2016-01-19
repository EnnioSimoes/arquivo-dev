'name',
'sobrenome',
'email',
'password',
'grupo_id',
'remember_token',
'created_at',
'updated_at',
'ativo',
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
    {!! Form::text('email', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Repetir a Senha', 'Repetir a Senha:') !!}
    {!! Form::text('repetir-senha', null, ['class'=>'form-control']) !!}
</div>
{{-- 
<div class="form-group">
    {!! Form::label('Imagem', 'Imagem:') !!}
    @if(isset($data->imagem) && $data->imagem != '')
    <br>
    <img src="{{ asset('assets/images/posts') }}/{{ $data->imagem }}" style="max-width: 500px; max-height: 500px;">
    <br>
    <br>
    @endif
    {!! Form::file('imagem', ['id' => 'imageLoader']) !!}
    <p class="help-block">Selecione a area para cortar</p>
    <div style="max-width: 700px; max-height: 700px;">
        <canvas id="imageCanvas" class="hidden"></canvas>
    </div>
</div>

<div class="form-group">
    {!! Form::label('Categoria', 'Categoria:') !!}
    {!! Form::select('categoria_id', $categorias, null, ['class'=>'form-control']) !!}
</div> --}}
<div class="form-group">
    {!! Form::label('Status', 'Status:') !!}
    {!! Form::select('ativo', [1 => 'ativo', 2 => 'inativo'], null, ['class'=>'form-control']) !!}
</div>

{{-- HIDDENS --}}
    {!! Form::hidden('x1') !!}
    {!! Form::hidden('y1') !!}
    {!! Form::hidden('x2') !!}
    {!! Form::hidden('y2') !!}

<script type="text/javascript">
    $(document).ready(function () {
        $('#imageCanvas').imgAreaSelect({
            // var canvas = this;
            // console.log($('#imageCanvas'));
            // canvas.removeClass('hidden');
            onSelectEnd: function (img, selection) {
                $('input[name="x1"]').val(selection.x1);
                $('input[name="y1"]').val(selection.y1);
                $('input[name="x2"]').val(selection.x2);
                $('input[name="y2"]').val(selection.y2);
            }
        });
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