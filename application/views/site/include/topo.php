<header>
   <!---TOPO---->
   <div class="container-fluid">
     <div class="row">
       <div class="topo-redes-sociais">
       <div class="container">
       <div class="col-md-3">  
              <div class="logo">
                <a href="<?php print base_url();?>"><img src="<?php print base_url('assets/site/img/logo-topo.png');?>" alt="logo Gera Super" /></a>
              </div>
            </div>
            <div class="col-md-6 hidden-sm-down">
              <div class="menu-topo">
                <ul>
                  <li class=" <? ativo($pagAtual, "Home") ?>"><a href="<?php print base_url('');?>">Sobre nós</a></li>
                  <li class=" <? ativo($pagAtual, "Servicos") ?>"><a href="<?php print base_url('servicos');?>">Serviços</a></li>
                  <li class=" <? ativo($pagAtual, "Portfolio") ?>"><a href="<?php print base_url('portfolio');?>">Portfólio</a></li>
                  <li class=" <? ativo($pagAtual, "Blog") ?>"><a href="<?php print base_url('blogs');?>">Blog</a></li>
                  <li class=" <? ativo($pagAtual, "Contato") ?>"><a href="<?php print base_url('contato');?>">Contato</a></li>
                </ul>
              </div>
            </div>        
       <div class="col-md-3">
         <div class="col-md-4 col-sm-3">
          <figure class="img-100">   
          <a href="https://api.whatsapp.com/send?phone=5511963372342" target="blank">
           <img src="<?php print base_url('assets/site/img/whatsapp.png');?>" alt="whatsapp" />
          </a> 
         </figure>
         </div>
         <div class="col-md-4 col-sm-3"> 
         <figure class="img-100">
         <a href="https://www.facebook.com/plataformanet/" target="_blank">
          <img src="<?php print base_url('assets/site/img/facebook.png');?>" alt="facebook" />
          </a>
         </figure> 
         </div> 
         <!--<div class="col-md-4 col-sm-3">
           <figure class="img-100"> 
            <a href="https://pt.linkedin.com/company/plataformanet" target="_blank">
             <img src="<?php print base_url('assets/site/img/icone-linkedin.png');?>" alt="linkdin" />
            </a>
            </figure>
         </div>-->
         <div class="col-md-4 col-sm-3">
         <figure class="img-100"> 
         <a href="https://www.instagram.com/agenciaplataformanet/" target="_blank">
          <img src="<?php print base_url('assets/site/img/instagram.png');?>" alt="instagram" />
          </a>
        </figure>
         </div>
       </div>
       </div>
      </div>
     </div>
   </div>
   <!---/TOPO---->

  <div class="menu-xs col-md-4 col-xs-12 hidden-md-up">
      <?php
        $this->load->view('site/include/sidenav-menu.php');
      ?>
  </div>

   
</header>
 