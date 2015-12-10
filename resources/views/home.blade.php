@extends('template/site')
@section('content')
    @for ($i = 0; $i <= 17; $i++)
    <article class="post">
        <div style="display:block;background:#000000;height:125px;position:relative;top:10px"></div>
        <header class="post-chamada">
            <h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h2>
            <a href="http://laravel.com/docs/5.1/blade" title="" target="_blank" class="post-link">laravel.com/docs/5.1/blade</a>
        </header>
        <article class="post-resumo">
            <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit aliquid dolore soluta officia eos unde temporibus, minus ipsam praesentium commodi magnam sunt eligendi deleniti aspernatur harum error, architecto veritatis ducimus.
            </p>
        </article>
        <aside class="post-acoes-usuario">
          <span class="icone-curtir"></span>
          <span class="icone-compartilhar"></span>
          <span class="icone-comentar"></span>
        </aside>
    </article>
    @endfor
@endsection