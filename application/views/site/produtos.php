<div class="container produtos">

    <div class="col-md-4">

        <?php
        $this->load->view('site/include/menu-produtos.php');
        ?>
    </div>

    <div class="col-md-8">
        <div class="row">
            <div class="titulo-produto">
                <h1>Produtos/ destaque</h1>
                <p>CONFIRA OS MODELOS DÍSPONIVEIS</p>
            </div>

            <div class="col-md-12">
            
                <div class="row">
                    <?php
                    if($produtos == FALSE){
                        print "Nenhum produto disponivel"; 
                    }else{
                    foreach (array_chunk($produtos, 3) as $key => $lista_produtos) {   
                        ?>
                        <div class="col-md-12">
                        <?php
                        foreach ($lista_produtos as $k => $lista) {
                       ?>
                       
                        <div class="col-md-4 bloco-produto">
                            <a href="<?= base_url('produto/' . $lista['NM_LINK']) ?>"> 	 
                             <figure class="img-100">   
                              <img src="<?php print $url_uploads.'assets/uploads/'.$pasta_uploads.'/produtos/'.$lista['IMAGEM']; ?>" title="<?php print $lista['NM_PRODUTO']; ?>" alt="<?php print $lista['NM_PRODUTO']; ?>">
                             </figure>
                            </a>     
                            <h3><?php print $lista['NM_PRODUTO']; ?></h3>
                        </div>
                       <?php
                        }
                       ?> 
                       </div>
                        
                         <div class="clear"></div>
                        
                        <?php
                        }
                    }
                    ?>
                </div>
                      
            </div>
        </div>
    </div>
</div>