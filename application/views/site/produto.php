<div class="container produto">
    <div class="col-md-4">
        <?php
        $this->load->view('site/include/menu-produtos.php');
        ?>
    </div>

    <div class="col-md-8 desc-prod">
        <div class="row-produto">
            <div class="titulo-do-produto">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <h3>Produtos/ <?= $categoria; ?></h3>
                    </div>
                    <div class="col-md-6 col-xs-12 orcamento-produtos">
                    <i class="fa fa-shopping-cart fa-1x"></i>
                        <a href="<?php print base_url('orcamento');?>"><h3>Lista de Orçamento</h3></a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xs-12 info-produtos">
                <div class="col-md-5">
                    <div class="row img-produto">
                        <a href="<?= $url_uploads . 'assets/uploads/' . $pasta_uploads . '/produtos/' . $imagem; ?>" title="" data-toggle="lightbox" data-gallery="example-gallery" data-title="">
                        <figure class="img-100">    
                         <img src="<?= $url_uploads . 'assets/uploads/' . $pasta_uploads . '/produtos/' . $imagem; ?>" title="<?= $produto; ?>" alt="<?= $produto; ?>">
                        </figure>
                        </a>
                    </div>

                    <?php
                    if ($galeria != FALSE) {
                        ?>
                        <div class="row imagens-thumb">
                            <?php
                            foreach ($galeria->result() as $key => $list_gallery) {
                                ?>
                                <div class="col-md-4 col-xs-6">
                                    <a href="<?php print $url_uploads . 'assets/uploads/' . $pasta_uploads . '/galeria-produto/' . $list_gallery->NM_IMAGEM; ?>" title="" data-toggle="lightbox" data-gallery="example-gallery" data-title="">
                                  <figure class="img-100">        
                                    <img src="<?php print $url_uploads . 'assets/uploads/' . $pasta_uploads . '/galeria-produto/thumb/' . $list_gallery->NM_IMAGEM; ?>" alt="<?php print $list_gallery->NM_LEGENDA; ?>" title="" alt="">
                                    </figure> 
                                </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="col-md-7 col-xs-12">
                    <h3><?= $produto; ?></h3>
                    <!--<p>modelo/código</p>-->
                    <p><?= $descricao; ?></p>

                    <div class="row orcamento-produto">
                        <a href="<?=base_url('add_carrinho').'/'.$id_produto; ?>"><button class="btn btn-orcamento-produto">Incluir na lista de orçamento</button></a>
                    </div>

                    <!---BOTAO-VOLTAR--->
                    <div class="col-md-6 btn-voltar offset-md-3">
                        <figure class="img-30"> 
                            <img src="<?php print base_url('assets/site/img/voltar.png');?>" alt="voltar">
                        </figure>
                        <a href="<?php print base_url('produtos');?>">
                           Voltar
                        </a>
                   </div>
                   <!---BOTAO-VOLTAR--->
                </div>

                

                <?php if (!isset($ficha_tecnica)) : ?>

                    <div  class="col-md-12 tecnica">
                        <h2 class="sublinhado-tit">Especificações técnicas</h2>
                    </div>
                    <div class="col-md-12 texto-tecnica">
                        <div class="txt">	
                            <?= $ficha_tecnica; ?>
                        </div>
                    </div>

                <?php else : ?>	

                <?php endif; ?>	
            </div>
        </div>
    </div>
</div>

<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="" />
            </div>
        </div>
    </div>
</div>