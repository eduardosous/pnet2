<div class="container">
    <div class="col-md-12 pagina-servico">
        <div class="row">
            <h1>Reforma e modernização de geradores</h1>
            <p>Entre em contato conosco para agendamentos:</p>

            <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled it to make a 
            type specimen book. It has survived not only five centuries, but also the 
            leap into electronic typesetting, remaining essentially unchanged. 
            It was popularised in the 1960s with the release of Letraset sheets containing 
            Lorem Ipsum passages, and more recently with desktop publishing software 
            like Aldus PageMaker including versions of Lorem Ipsum.
            </p>

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
               
        </div>
    </div>
</div>