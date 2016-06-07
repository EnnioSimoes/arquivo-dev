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
    <br>
    @if(isset($data->logotipo) && $data->logotipo != '')
        <img id="imageAvatar" src="{{ asset('assets/images/sites') }}/{{ $data->logotipo }}" style="max-width: 500px; max-height: 400px;">
    @endif
    <div style="max-width: 500px; max-height: 500px;">
        <canvas style="max-width: 500px; max-height: 500px;" id="imageCanvas" class="hidden"></canvas>
    </div>
    <div id="alertCropImage" class="alert alert-warning hidden" role="alert"></div>
    <br>
    <br>
    {!! Form::file('logotipo', ['id' => 'imageLoader']) !!}
    <p class="help-block">Selecione a area para cortar</p>
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
@role('admin')
<div class="form-group">
    {!! Form::label('Status', 'Status:') !!}
    {!! Form::select('ativo', [1 => 'ativo', 2 => 'inativo'], null, ['class'=>'form-control']) !!}
</div>
@endrole
{{-- HIDDENS --}}
    {!! Form::hidden('x1') !!}
    {!! Form::hidden('y1') !!}
    {!! Form::hidden('x2') !!}
    {!! Form::hidden('y2') !!}

<script src="{{ asset('/assets/admin/js/jquery.imgareaselect.pack.js') }}"></script>
<script src="{{ asset('/assets/admin/js/classes/ManipulaImagensClass.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var teste = new ManipulaImagensClass();
        teste.iniciar();
    });
</script>
