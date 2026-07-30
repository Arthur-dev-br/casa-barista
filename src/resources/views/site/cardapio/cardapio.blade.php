@extends('layout.site')

@section('content')

<section class="cardapio">
      <header class="parallax-padrao">
        <h2>
          Cardápio | {{$categoriaSelecionada->nome_categoria}}
        </h2>

        <nav>
            <ul>
                @foreach($listaCategorias as $linha)
                <li>
                    <a href="{{route('cardapio.categoria',$linha->id_categoria)}}">{{$linha->nome_categoria}}</a>
                </li>
                @endforeach
            </ul>
        </nav>


      </header>
      <div class=" site card-cardapio">

        @foreach($produtos as $linha)

        <div class="card-flip wow animate__animated animate__flipInX animate__delay-1s">
   
           <article class="card-flip-miolo">
             <div class="flip1">
               <h4>{{$linha->nome_produto}} </h4>
             </div>
             <div class="flip2">
               <h4>
                 {{$linha->nome_produto}}  <span> R$ {{number_format($linha->valor_produto, 2,  ',', '.')}}</span>
               </h4>
               <h5>
                 {{$linha->descricao_curta_produto}}
               </h5>
   
             </div>
             
           
           </article>
   
        </div>

        @endforeach


      </div>
      
      <div class="site btn-cardapio">
        <a class="btn" href="#">Veja mais</a>
      </div>
     
     </section>

@endsection