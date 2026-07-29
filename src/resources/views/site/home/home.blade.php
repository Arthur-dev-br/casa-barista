
@extends('layout.site')


@section ('content')

  <!-- inicio Cabeçalho -->

  

  <!-- Fim cabeçalho -->

  <!-- Corpo -->
  

    <!-- inicio banner -->
    @include ('site.home.banner')

    <!-- fim banner -->

    <!-- inicio Bem vindo -->

    @include('site.home.bemvindo')

    <!-- fim bem vindo -->


    <!-- Destaque-inicio -->

    @include('site.home.destaque')

    <!-- destaque fim -->


    <!-- Cardápio inicio -->
    @include('site.home.cardapio')

    <!-- Cardápio fim -->


    <!-- Inicio equipe -->

    @include('site.home.equipe')


    <!-- equipe fim -->

    <!-- Eventos inicio -->

    @include('site.home.evento')

    <!-- eventos fim -->

    <!-- Galeria inicio -->
    @include('site.home.galeria')

    <!-- Galeria fim -->

    <!-- Depoimentos inicio -->

    @include('site.home.depoimento')

    <!-- Depoimentos Fim -->

@endsection

