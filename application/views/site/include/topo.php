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
                  <li class=" <? ativo($pagAtual, "Empresa") ?>"><a href="<?php print base_url('empresa');?>">Serviços</a></li>
                  <li class=" <? ativo($pagAtual, "Produtos") ?>"><a href="<?php print base_url('produtos');?>">Portfólio</a></li>
                  <li class=" <? ativo($pagAtual, "Servicos") ?>"><a href="<?php print base_url('servicos');?>">Blog</a></li>
                  <li class=" <? ativo($pagAtual, "Contato") ?>"><a href="<?php print base_url('contato');?>">Contato</a></li>
                </ul>
              </div>
            </div>        
       <div class="col-md-3">
         <div class="col-md-4 col-sm-3">
          <figure class="img-100">   
           <img src="<?php print base_url('assets/site/img/whatsapp.png');?>" alt="whatsapp" />
         </figure>
         </div>
         <div class="col-md-4 col-sm-3"> 
         <figure class="img-100">
          <img src="<?php print base_url('assets/site/img/facebook.png');?>" alt="facebook" />
         </figure> 
         </div> 
         <div class="col-md-4 col-sm-3">
         <figure class="img-100"> 
          <img src="<?php print base_url('assets/site/img/instagram.png');?>" alt="instagram" />
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
 