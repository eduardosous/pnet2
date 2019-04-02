<div class="menu-produtos">
    
    <ul class="nav navbar-nav">

        <!-- CASO NÃO EXISTA CATEGORIAS CADASTRADAS... -->
        <?php if ($categorias == FALSE): ?>

            <h3>Nenhuma categoria cadastrada!</h3>

        <?php else: ?>

            <?php foreach ($categorias->result() as $key => $cat): ?>

                <!-- PRINTA O MENU, E DESCOBRE SE A CATEGORIA É ÚNICA OU NÃO -->
                <?php $unica = catCheckUnica($cat, $key, TRUE); ?>  

                <ul class="sub-menu collapse" id="collapse<?=$key; ?>" style="width: 100%">
                    <?php
                    // CARREGA AS SUBCATEGORIAS REFERENTE À CATEGORIA DA ITERAÇÃO ATUAL
                    $subcategorias = $this->Subcategorias->listar_subcategorias_categorias($cat->PK_CATEGORIA, TRUE);
                    ?>
                    <?php if ($subcategorias != FALSE): ?>
                        <?php foreach ($subcategorias->result() as $keySub => $sub): ?> 
                            <li class="active"><a href="<?=base_url('produtos').'/'.$cat->NM_LINK.'/'.$sub->NM_LINK; ?>"><?=$sub->NM_SUBCATEGORIA; ?></a></li>
                            <?php endforeach ?>
                        <?php endif ?>

                </ul>
            <?php endforeach ?>  
        <?php endif ?>
    </ul>
</div>