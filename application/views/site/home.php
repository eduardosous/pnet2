<?php
 $this->load->view('site/include/banner.php');
?>

<!--SERVIÇO-->
<div class="container servico">
    <div class="row">
    <section>
        <div class="col-md-6">
            <div id="texto-servico">
            <figure class="img-90">
                <img src="<?php print base_url("assets/site/img/mais-clientes-para-o-seu-negocio.png");?>" alt="">
            </figure>    
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-6 bloco-servico">
            <figure class="img-30">
                <img src="<?php print base_url('assets/site/img/google.png');?>" alt="logo google ads">
                </figure>
                <h2>Google Ads</h2>
                <p style="position:relative; top:-25px;">Os clientes que você procura, te encontram no Google! Aumente suas vendas, receba mais orçamentos e ligações de clientes.</p>
            </div>
            <div class="col-md-6 bloco-servico">
                <figure class="img-30">
                <img src="<?php print base_url('assets/site/img/redesociais1.png');?>" alt="logo google ads">
                </figure>
                <h2>Redes Sociais</h2>
                <p style="position:relative; top:-25px;">Engajar e relacionar-se com o público, aumentar o alcance da sua marca,potencializar as ações de Marketing Digital.</p>
            </div>
            <div class="col-md-6 bloco-servico">
            <figure class="img-30">
                <img src="<?php print base_url('assets/site/img/devices2.png');?>" alt="logo google ads">
                </figure>
                <h2>Criação <br> de Sites</h2>
                <p>Desenvolvimento de sites funcionais,baseados na experiência do usuário (UX) e claro, estratégias de palavras-chave e SEO.</p>
            </div>
            <div class="col-md-6 bloco-servico">
            <figure class="img-30">
                <img src="<?php print base_url('assets/site/img/campanhas.png');?>" alt="logo google ads">
                </figure>
                <h2>Campanhas</h2>
                <p>A web oferece diversas possibilidades para sua empresa atingir ou atrair o público e vender mais. Tudo que sua empresa precisa é definir as melhores estratégias e ações para atingir os seus objetivos!</p>
            </div>
        </div>
    </section>
   </div>
</div>
<!--/SERVIÇO-->

<!---ESCOLHA-A-PNET--->
<div class="container">
    <div class="row">
        <section>
        <div class="col-md-12">
           <div class="escolha-a-pnet">
               <figure class="img-100">
                <img src="<?php print base_url("assets/site/img/fundopnet.png");?>" alt="">
              </figure>
              <h3>Escolha a Plataformanet</h3>
              <p>
              Experiência de mercado, criatividade e uma equipe qualificada<br>
              para oferecer novas tecnologias e campanhas para sua empresa,<br>
              a Plataformanet está atuando a mais de 14 anos no segmento de<br>
              mídia digital e nosso foco é conectar o seu negócio ao resultado<br>
              de maneira objetiva e eficaz.
              </p>
           </div>    
        </div>
       </section>
    </div>
</div>
<!---/ESCOLHA-A-PNET--->

<!---RECEBA-NOSSO-CONTEUDO--->
<div class="container-fluid">
 <div class="row">   
 <div class="receba-nosso-conteudo">
  <div class="container">
   <div class="col-md-12">
      <div class="col-md-9"> 
       <h4>RECEBA NOSSOS CONTEÚDOS</h4>
     </div>
     <div class="col-md-3 link-news">
         <figure class="img-15">
          <img src="<?php print base_url("assets/site/img/rocket-newsletter.png");?>" alt="">
         </figure>
         <a href="#" class="" data-toggle="modal" data-target="#modalNews">INSCREVA-SE</a>
     </div> 
    </div>
    </div>
   </div>
  </div>
</div>
<!---/RECEBA-NOSSO-CONTEUDO--->

<!-- Modal -->
<div class="modal fade" id="modalNews" tabindex="-1" role="dialog" aria-labelledby="modalNewsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNewsLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
      <div class="form-group">
            <label for="exampleInputPassword1">Nome</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="exemplo.com.br">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>  
      </div>
    </div>
  </div>
</div>