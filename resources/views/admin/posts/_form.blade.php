<div class="form-group">
    {!! Form::label('Título', 'Título:') !!}
    {!! Form::text('post[titulo]', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Link', 'Link:') !!}
    {!! Form::text('post[link]', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Imagem', 'Imagem:') !!}
    {!! Form::file('imagem', ['id' => 'imageLoader']) !!}
    <p class="help-block">Selecione a area para cortar</p>
    <div style="width: 50%;">
        <canvas id="imageCanvas"></canvas>
    </div>
</div>
<div class="form-group">
    {!! Form::label('Descrição', 'Descrição:') !!}
    {!! Form::text('post[descricao]', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Autor', 'Autor:') !!}
    {!! Form::text('post[autor]', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Categoria', 'Categoria:') !!}
    {!! Form::select('post[categoria_id]', $categorias, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Site', 'Site:') !!}
    {!! Form::select('post[site]', $sites, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Status', 'Status:') !!}
    {!! Form::select('post[ativo]', [1 => 'ativo', 2 => 'inativo'], null, ['class'=>'form-control']) !!}
</div>

{{-- HIDDENS --}}
    {!! Form::hidden('post[x1]') !!}
    {!! Form::hidden('post[y1]') !!}
    {!! Form::hidden('post[x2]') !!}
    {!! Form::hidden('post[y2]') !!}

<script type="text/javascript">
    $(document).ready(function () {
        $('#imageCanvas').imgAreaSelect({
            onSelectEnd: function (img, selection) {
                $('input[name="post[x1]"]').val(selection.x1);
                $('input[name="post[y1]"]').val(selection.y1);
                $('input[name="post[x2]"]').val(selection.x2);
                $('input[name="post[y2]"]').val(selection.y2);
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
