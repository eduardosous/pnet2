<div class="container orcamento">
    <?php
    // SE O TOTAL DE ITENS DO CARRINHO FOR MAIOR QUE 1 OU SEJA, SE TIVER ALGUM PRODUTO ADICIONADO, É EXIBIDO O FORMULÁRIO DE CADASTRO E O CARRINHO.
    if ($this->cart->total_items() > 0):
        ?> 
        <h2>Lista de Orçamento</h2>
        <p>Insira a quantidade desejada para orçamento:</p>

        <div class="row">
           <div class="col-md-12"> 
            <div class="info-carrinho">
                <table class="table table-responsivo">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Descrição</th>
                            <th>QTD</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->cart->contents() as $key => $item): ?>
                            <tr>
                                <td style="width:30%;">
                                    <div class="img-carrinho">
                                        <figure>
                                            <img src="<?= $url_uploads; ?>assets/uploads/<?= $pasta_uploads; ?>/produtos/thumb/<?= $item['options']['imagem']; ?>" alt="<?= $item['options']['modelo'] ?>">
                                        </figure>
                                    </div>

                                </td>

                                <td class="descricao-prod">
                                    <p><?= $item['name']; ?></p>
                                </td>

                                <td class="">
                                    <select name="<?php print $item['rowid']; ?>" class="qtn-orcamento" data-url="<?= base_url(); ?>">
                                        <?php foreach (range(1, 50, 1) as $qntd): ?>
                                            <?php if ($item['qty'] == $qntd): ?>
                                                <option selected="selected"><?php echo $qntd; ?></option>
                                            <?php else: ?>
                                                <option><?php echo $qntd; ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </td>

                                <td class="btn-del-td">
                                    <a href="<?= base_url('remove_carrinho'); ?>/<?= $item['rowid']; ?>">
                                        <button class=" btn btn-del">X</button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <form action="<?= base_url('enviar_orcamento'); ?>" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-md" type="text" name="nome" placeholder="Nome:" required />
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-md" type="email" name="email" placeholder="Email:" required />
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-md" type="tel" name="telefone" placeholder="Telefone:" required />
                    </div>

                    <div class="form-group">
                        <textarea class="form-control form-control-md" name="mensagem" placeholder="Descrição:"></textarea>
                    </div>

                    <button type="submit" class="btn btn-orcamento">Solicitar orçamento</button>
                </form>
              </div>
            </div>


        </div>
        <?php
    // SE NÃO, É EXIBIDA A MENSAGEM.
    else:
        ?>

        <div
            class="text-center" style="margin-bottom: 2em;">Nenhum
            Produto Adicionado ao Carrinho.</div>

    <?php
    endif;
    ?>
</div>