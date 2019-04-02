<div class="container">
    <div class="col-md-12 pagina-servico">
        <div class="row">
            <h1>Serviços</h1>
            <p>Entre em contato conosco para agendamentos:</p>

            <div class="col-md-4 bloco-servico">
                <figure class="img-40 img-01">
                    <a href="<?php print base_url('servico/locacao-de-equipamentos');?>"><img src="<?php print base_url('assets/site/img/icon1.png');?>" alt="" /></a>
                </figure>
                <p>Locações de equipamentos</p>
            </div>
            <div class="col-md-4 bloco-servico">
                <figure class="img-40">
                    <a href="<?php print base_url('servico/venda-e-instalacao-de-equipamentos.php');?>"><img src="<?php print base_url('assets/site/img/icon2.png');?>" alt="" /></a>
                </figure>
                <p>Venda e instalação de equipamentos</p>
            </div>
            <div class="col-md-4 bloco-servico">
                <figure class="img-40">
                    <a href="<?php print base_url('servico/manutencao');?>"><img src="<?php print base_url('assets/site/img/icon3.png');?>" alt="" /></a>
                </figure>
                <p>Manutenção</p>
            </div>
            <div class="clear"></div>
            <div class="col-md-4 bloco-servico">
                <figure class="img-40">
                    <a href="<?php print base_url('servico/locacoes-emergenciais');?>"><img src="<?php print base_url('assets/site/img/icon4.png');?>" alt="" /></a>
                </figure>
                <p>Locações emergenciais</p>
            </div>
            <div class="col-md-4 bloco-servico">
                <figure class="img-40">
                    <a href="<?php print base_url('servico/reforma-e-modernizacao-de-geradores');?>"><img src="<?php print base_url('assets/site/img/recicle.png');?>" alt="" /></a>
                </figure>
                <p>Reforma e modernização de geradores</p>
            </div>
            <div class="col-md-4 bloco-servico">
                <figure class="img-40">
                    <a href="<?php print base_url('servico/atendimento-24h');?>"><img src="<?php print base_url('assets/site/img/icon55.png');?>" alt="" /></a>
                </figure>
                <p>Atendimento 24 horas</p>
            </div>

             <div class="col-md-6">
             <div class="form-contato">
                <form action="<?php print base_url('enviar_servico');?>" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-md" type="text" name="nome" placeholder="Nome:" required />
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-md" type="tel" name="telefone" placeholder="Telefone:" required />
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-md" type="tel" name="celular" placeholder="Celular:" required />
                    </div>

                    <div class="form-group">
                        <textarea class="form-control form-control-md" name="mensagem" placeholder="Mensagem:"></textarea>
                    </div>

                    <button type="submit" class="btn  btn-contato">Enviar</button>
                </form>
                </div>
             </div>
             <div class="col-md-6">
                <div class="col-md-12">   
                 <div id="icone">
                     <figure class="img-40">
                      <img src="<?php print base_url('assets/site/img/icon5.png');?>" alt="" />
                     </figure>
                 </div>
                 <h2 id="titulo-servico">Atendimento 24 horas</h2> 
               </div>
               <div class="col-md-12">
                 <p>
                     Lorem ipsum dolor sit amet, 
                     consectetur adipiscing elit. In ut vehicula sapien, 
                     in vehicula nibh. Vestibulum ante ipsum primis in faucibus orci 
                     luctus et ultrices posuere cubilia Curae;
                 </p>
              </div>
             </div>   
        </div>
    </div>
</div>