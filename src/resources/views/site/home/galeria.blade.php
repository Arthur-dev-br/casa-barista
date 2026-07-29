<section class="galeria">
        <header class="parallax-padrao">
          <h2>
            Galeria
          </h2>
          <h3>
            Um retrato da nossa essência
          </h3>
        </header>
      <div class="site-card cardgaleria slideGaleria wow animate__animated animate__fadeInUp">
        @foreach ($listaGaleria as $linha)
          <article>
            <img src="{{ asset ("barista/assets/$linha->imagem_galeria") }}" alt="{{ $linha->nome_galeria }}">
          </article>
        @endforeach

          


        

  
      </div>


</section>