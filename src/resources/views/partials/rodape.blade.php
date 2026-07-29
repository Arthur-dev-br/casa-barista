<footer class="rodape ">
      <!-- Conteúdo principal do rodapé -->
      <section class="site rodape-grid">

        <div class="coluna-end wow animate__animated animate__fadeInUp">
          <h3>
            Nosso Endereço
          </h3>
          <address>
            Av Marechal Tito, 1500 <br>
            São Miguel Paulista
          </address>
          <a href="#">Mapa</a>

        </div>

        <div class="coluna-reserva">
          
          <div class="box-reserva">

            <h3>Faça sua reserva</h3>
            <div class="linha-box">
              <hr>
              <img src="assets/coffee.svg" alt="grão café">
              <hr>
            </div>
            <ul>
              <li><span>Segunda - Sexta</span> 
                <span>09:00 - 00:00</span></li>

              <li><span>Sábado</span> 
                <span>08:00 - 00:00</span></li>

              <li><span>Domingo</span>
                 <span>16:00 - 00:00</span></li>

              <li><span>Feriado</span>
                 <span>16:00 - 02:00</span></li>

            </ul>
            <a href="#" class="btn">Reserva</a>
          </div>

          <div class="box-email wow animate__animated animate__fadeInUp">
            <p>Informe seu email para receber as novidades e promoções da Casa do Barista</p>
            <form action="#" method="post">
              <label for="email">Inscreva-se</label>
              <input type="email" name="email" id="email" placeholder="informe seu email">
              <button type="submit" aria-label="Enviar">
                <img src="{{ asset('barista/assets/arrow.svg')}}" alt="Botão Enviar">
              </button>
            </form>
          </div>

        </div>
        <div class="coluna-contato wow animate__animated animate__fadeInUp">
          <h3>
            Contate-nos
          </h3>
          <a class="link-contato" href="mailto:contato@email.com.br">contato@email.com.br</a>
          <a class="link-contato" href="tel:+5511999999888">(11)999-999-888</a>

          <ul class="margenzinha rede-social">

      <li><a href="#" target="_blank"><img src="{{ asset('barista/assets/facebook-24.png')}}" alt="Logo facebook"></a></li>

      <li><a href="#" target="_blank"><img src="{{ asset('barista/assets/instagram-24.png')}}" alt="Logo instagram"></a></li>

      <li><a href="#" target="_blank"><img src="{{ asset('barista/assets/linkedin-24.png')}}" alt="Logo linkedin"></a></li>
      
      <li><a href="https://wa.me/5511999999999" target="_blank"><img src="{{ asset('barista/assets/whatsapp-24.png')}}" alt="Logo whatsapp"></a></li>

    </ul>

          


        </div>


      </section>

      <!-- Barra final -->

      <div class="barra-final">

        <p>
          <?php  $data = date('Y');
          echo $data ?>
          -Criado e desenvolvido por TIPI 06 - Senac Smp

        </p>
      </div>




</footer>