<div class="container contato">
    <h2>CONTATO</h2>

    <div class="col-md-12">
     <p></p>
     
    </div>
    
    <form action="<?= base_url('enviar_contato'); ?>" method="post">
    <div class="col-md-6 contato-form">
            <div class="form-group">
                <input class="form-control form-control-md" type="text" name="nome" placeholder="Nome:" required />
            </div>

            <div class="form-group">
               <input class="form-control form-control-md" type="tel" name="celular" placeholder="Celular:" required />
            </div>

            <div class="form-group">
             <textarea class="form-control form-control-md" name="mensagem" placeholder="Mensagem:"></textarea>
             </div>

            <button type="submit" class="btn btn-contato">Enviar</button>
        
    </div>

    <div class="col-md-6">
     
    <div class="form-group">
        <input class="form-control form-control-md" type="tel" name="telefone" placeholder="Telefone:" required />
     </div>
  
     <div class="form-group">
                <input class="form-control form-control-md" type="email" name="email" placeholder="Email:" required />
            </div>  

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.8407348633064!2d-46.53699698480714!3d-23.645874070604204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce42bf8e800df9%3A0x89b9dfc4fed2730d!2sAv.+Industrial%2C+780+-+Jardim%2C+Santo+Andr%C3%A9+-+SP%2C+09080-510!5e0!3m2!1spt-BR!2sbr!4v1554467232123!5m2!1spt-BR!2sbr" width="100%" height="260" frameborder="0" style="border:0" allowfullscreen></iframe>
      
    </div>

    </form>

    
</div>