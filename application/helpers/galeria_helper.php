<?php

if(!function_exists('listaGaleria'))
{
	function listaGaleria($galeria){
	    
	    // CASO NÃO EXISTA IMAGENS NA GALERIA
	    if ($galeria == FALSE) {
            print "";
            
        } else {
              
            foreach ($galeria->result() as $foto) {
                
                if ($foto->NM_ATIVO != 0) {
                    
                    print '
                    <!-- COLUNA IMG GALERIA -->
					<div class="col-md-4 offset-md-0 col-sm-6 offset-sm-0 col-xs-10 offset-xs-1 prod-galeria-img">
	                    <figure class="img-produto-galeria img-100">
	                        <a class="img_produto" href="'. base_url() .'assets/uploads/galerias/'. $foto->NM_IMAGEM .'" data-toggle="lightbox" data-gallery="galeria-produto">
	                        	<img src="'. base_url() .'assets/uploads/galerias/thumb/'. $foto->NM_IMAGEM. '" alt="'. $foto->NM_LEGENDA .'" />
	                        </a>
	                    </figure> 
	                </div>
	                <!-- /COLUNA IMG GALERIA -->';
                    
                }
            }
        }
  	}
}
