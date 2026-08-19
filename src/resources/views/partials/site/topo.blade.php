<header class="topo" id='topoFixo'>


   <div class="site">

     <h1>Casa do Barista</h1>
     <button class="abrir-menu"></button>
     <nav class="menu">
       <button class="fechar-menu"></button>
      
       <ul>
         <li><a class="menu-ativo" href="{{ route('home') }}">Home</a></li>

         <li><a class="" href="{{ route('sobre') }}">Sobre</a></li>

         <li class="item-submenu"><a class="" href="{{ route('cardapio') }}">Cardápio</a>

          <!-- submenu -->
        <ul class="submenu">
          @foreach($categoriaMenu as $linha)



            <li>

              <a href="{{route ('cardapio.categoria',$linha->id_categoria) }}">{{$linha->nome_categoria}}</a>

            </li>

            @endforeach

          </ul>

          <!--fim submenu -->
        
        
        </li> <!--fim cardápio -->

         <li><a class="" href="{{ route('eventos') }}">Eventos</a></li>

         <li><a class="" href="{{ route('contato') }}">Contato</a></li>

       </ul>

       <div class="login">

         <a href="#">
           <img src="{{ asset('barista/assets/login.png') }}" alt="Login Casa do Barista">
         </a>
       </div>

       <ul class="rede-social">

         <li><a href="#" target="_blank"><img src="{{ asset('barista/assets/facebook-24.png')}}" alt="Logo facebook"></a></li>
         <li><a href="#" target="_blank"><img src="{{ asset('barista/assets/instagram-24.png')}}" alt="Logo instagram"></a></li>
         <li><a href="https://wa.me/5511999999999" target="_blank"><img src="{{ asset('barista/assets/whatsapp-24.png')}}" alt="Logo whatsapp"></a></li>

       </ul>


     </nav>

     <!-- ul>li*3>a>img+tab -->

     <!-- LOGIN -->

   </div>




 </header>