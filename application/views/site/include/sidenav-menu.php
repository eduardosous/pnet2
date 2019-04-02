<span style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-window-close" aria-hidden="true"></i></a>
    <ul class="nav navbar-nav">
    <li class=" <? ativo($pagAtual, "Home") ?>"><a href="<?php print base_url('');?>">Home</a></li>
    <li class=" <? ativo($pagAtual, "Empresa") ?>"><a href="<?php print base_url('empresa');?>">Quem Somos</a></li>
    <li class=" <? ativo($pagAtual, "Produtos") ?>"><a href="<?php print base_url('produtos');?>">Produtos</a></li>
    <li class=" <? ativo($pagAtual, "Servicos") ?>"><a href="<?php print base_url('servicos');?>">Serviços</a></li>
    <li class=" <? ativo($pagAtual, "Contato") ?>"><a href="<?php print base_url('contato');?>">Contato</a></li>
    </ul>
</div>