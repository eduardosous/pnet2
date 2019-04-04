<?php
 $this->load->view('site/include/banner.php');
?>

<!--SERVIÇO-->
<div class="container servico">
    <div class="row">
     <div class="col-md-12">
       <h1 class="titulo-servico">O QUE NÓS FAZEMOS</h1>

       <?php
          $this->load->view('site/include/modais-servicos.php');
        ?>

       <div class="col-md-4 bloco-servico-01">
           <figure class="img-20">
            <img src="<?php print base_url("assets/site/img/design.png");?>" alt="">
           </figure>
           <h2>DESIGN</h2>
            <p>Criamos e mudamos o <br>
               DNA da sua empresa
            </p>
            <div class="saiba-mais-servico">
                <button class="link"  id="design">SAIBA MAIS</button>
            </div> 
       </div>
       <div class="col-md-4 bloco-servico-02">
       <figure class="img-20">
            <img src="<?php print base_url("assets/site/img/links-patrocinados.png");?>" alt="">
           </figure>
           <h2>Links Patrocinados</h2>
            <p>Criamos e mudamos o <br>
               DNA da sua empresa
            </p>
            <div class="saiba-mais-servico">
            <button class="link"  id="links">SAIBA MAIS</button>
            </div>
       </div>
       <div class="col-md-4 bloco-servico-03">
       <figure class="img-20">
            <img src="<?php print base_url("assets/site/img/redes-sociais.png");?>" alt="">
           </figure>
           <h2>Redes sociais</h2>
            <p>Esteja sempre presente e <br> 
                atualize seu público 
            </p>
            <div class="saiba-mais-servico">
             <button class="link"  id="redes-sociais">SAIBA MAIS</button>
            </div>
       </div>
       <div class="clear"></div>
       <div class="col-md-4 bloco-servico-04">
       <figure class="img-20">
            <img src="<?php print base_url("assets/site/img/hospedagem.png");?>" alt="">
           </figure>
           <h2>Hospedagem</h2>
            <p>
                Maior Performance e <br> Velocidade com suporte. 
            </p>
            <div class="saiba-mais-servico">
            <button class="link"  id="hospedagem">SAIBA MAIS</button>
            </div>
       </div>
       <div class="col-md-4 bloco-servico-05">
       <figure class="img-20">
            <img src="<?php print base_url("assets/site/img/criacao-de-sites.png");?>" alt="">
           </figure>
           <h2>Criação de Sites</h2>
            <p>
            O cartão de visitas da sua <br> empresa, digital.
            </p>
            <div class="saiba-mais-servico">
            <button class="link"  id="criacao-sites">SAIBA MAIS</button>
            </div>
       </div>
       <div class="col-md-4 bloco-servico-06">
       <figure class="img-20">
            <img src="<?php print base_url("assets/site/img/otimizacao.png");?>" alt="">
           </figure>
           <h2>Otimização de sites</h2>
            <p>
            Melhore e potencialize <br> sua empresa na web
            </p>
            <div class="saiba-mais-servico">
            <button class="link"  id="otimizacao">SAIBA MAIS</button>
            </div>
       </div>
       <div class="clear"></div>
       <div class="col-md-4 bloco-servico-07">
       <figure class="img-20">
            <img src="<?php print base_url("assets/site/img/inbound.png");?>" alt="">
           </figure>
           <h2>Inbound MKT</h2>
            <p>
            Relacionamento entre sua empresa <br>
            e seus possíveis clientes
            </p>
            <div class="saiba-mais-servico">
            <button class="link"  id="inbound">SAIBA MAIS</button>
            </div>
       </div>
       <div class="col-md-4 bloco-servico-08">
       <figure class="img-20">
            <img src="<?php print base_url("assets/site/img/conteudo.png");?>" alt="">
           </figure>
           <h2>Conteúdo</h2>
            <p>
            Textos e redações com <br> qualidade e revisão.
            </p>
            <div class="saiba-mais-servico">
            <button class="link"  id="conteudo">SAIBA MAIS</button>
            </div>
       </div>
       <div class="col-md-4 bloco-servico-09">
       <figure class="img-20">
            <img src="<?php print base_url("assets/site/img/propaganda.png");?>" alt="">
           </figure>
           <h2>Propaganda</h2>
            <p>
            Anunciamos seu produtos <br>
            em diversas PLATAFORMAS.
            </p>
            <div class="saiba-mais-servico">
            <button class="link"  id="propaganda">SAIBA MAIS</button>
            </div>
       </div>
       <div class="clear"></div>
       <div class="col-md-4 bloco-servico-10">
       <figure class="img-20">
            <img src="<?php print base_url("assets/site/img/email.png");?>" alt="">
           </figure>
           <h2>Email Marketing</h2>
            <p>
            Comunique sua empresa e seus <br>
            consumidores ou potenciais <br>
            clientes, via email
            </p>
            <div class="saiba-mais-servico">
            <button class="link"  id="email">SAIBA MAIS</button>
            </div>
       </div>
       <div class="col-md-4 bloco-servico-11">
       <figure class="img-20">
            <img src="<?php print base_url("assets/site/img/multimidia.png");?>" alt="">
           </figure>
           <h2>Multimídia</h2>
            <p>
            Edição profissional do seu <br>
            conteúdo, seja vídeo ou foto.
            </p>
            <div class="saiba-mais-servico">
            <button class="link"  id="multimidia">SAIBA MAIS</button>
            </div>
       </div>
       <div class="col-md-4 bloco-servico-12">
       <figure class="img-20">
            <img src="<?php print base_url("assets/site/img/desenvolvimento.png");?>" alt="">
           </figure>
           <h2>Desenvolvimento</h2>
            <p>
            Seus aplicativos e sistemas, <br> 
            desenvolva suas ideias!
            </p>
            <div class="saiba-mais-servico">
            <button class="link"  id="desenvolvimento">SAIBA MAIS</button>
            </div>
       </div>
       </div>
     </div>
   </div>
</div>
<!--/SERVIÇO-->

<!---COMO FAZEMOS-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 como-fazemos">
                <h2 class="titulo-como-fazemos">
                    <figure class="img-80">
                     <img src="<?php print base_url("assets/site/img/como-fazemos.png");?>" alt="Como Fazemos">
                  </figure>
                </h2>
                <p>A Plataformanet conta com uma equipe para cuidar do processo e planejamento de seus <br>
                    projetos, nossos contatos iniciam antes do briefing e seguem até o pós-venda.</p>
            </div>
            <!---COL-MD-5--->
            <div class="col-md-5">
                <div class="bloco-servicos-esquerdo">
                <div class="col-md-12">
                <h3>
                    BRIEFING
                </h3>
                <p>
                Nossa equipe auxilia no briefing do seu projeto de acordo com objetivos, produtos, público e até 
mesmo orçamento.
                </p>
               </div>
               <div class="col-md-12">
                <h3>
                Ferramentas
                </h3>
                <p>
                Possímos a mais alta tecnologia e trabalhamos sempre com as novidades
de mercado, Google, Rd station, loja integrada , cia shop, loja integrada e outros!
                </p>
               </div>
               <div class="col-md-12">
                <h3>
                Gerenciamento de campanhas
                </h3>
                <p>
                Sua campanha é sempre gerenciada e acompanhada diariamente pela nossa equipe, 
oferecendo as melhores otimizações e estratégias para garantir o sucesso e resultados da sua empresa.
                </p>
               </div>
             </div>
            </div>
           <!---/COL-MD-5--->

            <!---COL-MD-2---> 
            <div class="col-md-1 foguete">
               <figure class="img-100"> 
                <img src="<?php print base_url("assets/site/img/foguetinho.png");?>" alt="">
              </figure>
               <div class="linha-foguete"></div> 
            </div>
            <!---COL-MD-2--->  

            <!---COL-MD-5--->
            <div class="col-md-5">
            <div class="bloco-servicos-direito">    
            <div class="col-md-12">
                <h3>
                Planejamento
                </h3>
                <p>
                Fazemos o planejamento de suas campanhas, seja longo ou curto prazo.
Temos know-how para desenvolver o seu projeto de forma objetiva e otimizando
sempre os recursos da sua empresa.
                </p>
               </div>
               <div class="col-md-12">
                <h3>
                Criação
                </h3>
                <p>
                Participamos ativamente de todo o processo criativo das campanhas 
e identidade da empresa, desde a melhor escolha de cores para o seu Site, até 
mesmo no branding aplicado.
                </p>
               </div>
               <div class="col-md-12">
                <h3>
                Pós-Venda
                </h3>
                <p>
                Acompanhado de entregas de KPI'S, nossa equipe se reune com a sua empresa
para discutir a melhor estratégia a ser utilizada na próxima campanha,
pensando sempre em melhorar o seu próximo projeto!
                </p>
               </div>
             </div>
            </div>
            <!---COL-MD-5--->
        </div>
    </div>
</div>
<!---/COMO FAZEMOS-->

