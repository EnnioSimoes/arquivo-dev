<div class="form-group">
    {!! Form::label('Nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Link', 'Link:') !!}
    {!! Form::text('link', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Logotipo', 'Logotipo:') !!}
    @if(isset($site->logotipo) && $site->logotipo != '')
    <br>
    <img src="{{ asset('assets/images/sites') }}/{{ $site->logotipo }}" style="max-width: 500px; max-height: 500px;">
    <br>
    <br>
    @endif
    {!! Form::file('logotipo', ['id' => 'imageLoader']) !!}
    <p class="help-block">Selecione a area para cortar</p>
    <div style="max-width: 700px; max-height: 700px;">
        <canvas id="imageCanvas" class="hidden"></canvas>
    </div>
</div>

<div class="form-group">
    {!! Form::label('Facebook', 'Facebook:') !!}
    {!! Form::text('facebook', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Youtube', 'Youtube:') !!}
    {!! Form::text('youtube', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Github', 'Github:') !!}
    {!! Form::text('github', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Google +', 'Google +:') !!}
    {!! Form::text('googleplus', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Twitter', 'Twitter:') !!}
    {!! Form::text('twitter', null, ['class'=>'form-control']) !!}
</div>
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
