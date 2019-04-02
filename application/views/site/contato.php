<div class="container contato">
    <h2>Contato</h2>
    
    <div class="col-md-6 contato-form">

    <p>FORMULÁRIO DE CONTATO</p>

        <form action="<?= base_url('enviar_contato'); ?>" method="post">
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

            <button type="submit" class="btn btn-contato">Enviar</button>
        </form>
    </div>

    <div class="col-md-6">
      <div class="col-md-8 info-contato-tel">  
       <figure class="img-15">
         <img src="<?php print base_url('assets/site/img/phone.png');?>" alt="" />
        </figure>
        <p>
            Tel: (11) 2259-0566
            Tel: (11) 2259-0549
        </p>
       </div> 
      
       <div class="col-md-8 info-contato-email"> 
        <figure class="img-15">
         <img src="<?php print base_url('assets/site/img/email.png');?>" alt="" />
        </figure>
        <p>
            CONTATO@GERASUPER.COM.BR
        </p>
      </div> 
        
      <div class="col-md-8 mapa-contato">
        <p>Unidade 1</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.622643188951!2d-46.57276448493555!3d-23.6536814846371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce43393f21f85d%3A0xb32935f63666ed19!2sRua+Helena+Jacquey%2C+110+-+Vila+Helena%2C+S%C3%A3o+Bernardo+do+Campo+-+SP%2C+09635-060!5e0!3m2!1spt-BR!2sbr!4v1530814557029" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="col-md-8 mapa-contato">  
        <p>Unidade 2</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.622643188951!2d-46.57276448493555!3d-23.6536814846371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce43393f21f85d%3A0xb32935f63666ed19!2sRua+Helena+Jacquey%2C+110+-+Vila+Helena%2C+S%C3%A3o+Bernardo+do+Campo+-+SP%2C+09635-060!5e0!3m2!1spt-BR!2sbr!4v1530814557029" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>    
     </div>    
    </div>
</div>