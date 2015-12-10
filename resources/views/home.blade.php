@extends('template/site')
@section('content')
    @foreach($posts as $post)
    <article class="post">
        <img src="{{ $post->imagem }}" style="display:block;background:#000000;height:125px;position:relative;top:10px"></div>
        <header class="post-chamada">
            <h2 class="titulo">{{ $post->titulo }}</h2>
            <a href="{{ $post->link }}" title="" target="_blank" class="post-link">{{ $post->link }}</a>
        </header>
        <article class="post-resumo">
            <p>
            {{ $post->descricao }}
            </p>
        </article>
        <aside class="post-acoes-usuario">
          <span class="icone-curtir"></span>
          <span class="icone-compartilhar"></span>
          <span class="icone-comentar"></span>
        </aside>
    </article>
    @endforeach
@endsection