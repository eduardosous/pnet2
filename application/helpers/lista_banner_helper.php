<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!function_exists('lista_banner_helper')) {

    function lista_banner_helper($bannerPage, $btnBannerAtivo) {

        switch ($bannerPage) {
            case "home":
                print ('<div id="banner" class="hidden-sm-down">
                    <div id="carousel-example-generic" class="carousel slide hidden-sm-down" data-ride="carousel">
	<ol class="carousel-indicators">
		<!-- <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li> -->
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
			<img style="width: 100%;" src="' . base_url('assets/site/img/fundo-banner1.jpg') . '"" alt="" />   
		</div>
		<div class="carousel-item">
			<img style="width: 100%;" src="' . base_url('assets/site/img/fundo-banner2.jpg') . '"" alt="" />   
		</div>
		<div class="carousel-item">
			<img style="width: 100%;" src="' . base_url('assets/site/img/fundo-banner3.jpg') . '"" alt="" />   
		</div>
	    
	</div>
	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="icon-prev" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="icon-next" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
                        
    </div>');

                break;

            case "busca-e-apreensao-de-veiculos":
                print ('<div id="banner" class="hidden-sm-down">
                           <div class="banner-busca-apreensao-veiculo"><img style="width: 100%;" src="' . base_url('assets/site/img/banner_servicos/banner-busca-1.jpg') . '"" alt="" /></div>
                           <div class="banner-busca-apreensao-veiculo2"><img style="width: 100%;" src="' . base_url('assets/site/img/banner_servicos/banner-busca-2.jpg') . '"" alt="" /></div>     
                            <div class="botoes-banner">
                            <a title="">
                             <div class="btn-banner-servico' . $btnBannerAtivo . ' " id="btn1">
                              <p>Evite busca e apreensão</p> 
                            </div>
                            </a>
                            <a  title=""> 
                            <div class="btn-banner-servico" id="btn2">
                              <p>Redução de juros abusivos</p> 
                            </div>
                            </a>
                            </div>
                        </div>');
                break;

            case "juros-abusivos-de-emprestimos":
                print ('<div id="banner" class="hidden-sm-down">
                           <div class="banner-busca-apreensao-veiculo"><img style="width: 100%;" src="' . base_url('assets/site/img/banner_servicos/banner-emprestimo-1.jpg') . '"" alt="" /></div>
                           <div class="banner-busca-apreensao-veiculo2"><img style="width: 100%;" src="' . base_url('assets/site/img/banner_servicos/banner-emprestimo-2.jpg') . '"" alt="" /></div>     
                            <div class="botoes-banner">
                            <a title="">
                             <div class="btn-banner-servico' . $btnBannerAtivo . ' " id="btn1">
                              <p>Limitação do Pagamento</p> 
                            </div>
                            </a>
                            <a  title=""> 
                            <div class="btn-banner-servico" id="btn2">
                              <p>Redução de juros abusivos</p> 
                            </div>
                            </a>
                            </div>
                        </div>');
                break;

            case "juros-abusivos-de-cartao-de-credito":
                print ('<div id="banner" class="hidden-sm-down">
                           <div class="banner-busca-apreensao-veiculo"><img style="width: 100%;" src="' . base_url('assets/site/img/banner_servicos/banner-cartao-1.jpg') . '"" alt="" /></div>
                        </div>');
                break;

            case "juros-abusivos-no-cheque-especial":
                print ('<div id="banner" class="hidden-sm-down">
                           <div class="banner-busca-apreensao-veiculo"><img style="width: 100%;" src="' . base_url('assets/site/img/banner_servicos/banner-cheque-1.jpg') . '"" alt="" /></div>
                        </div>');
                break;

            case "distrato-de-compra-de-imovel":
                print ('<div id="banner" class="hidden-sm-down">
                           <div class="banner-busca-apreensao-veiculo"><img style="width: 100%;" src="' . base_url('assets/site/img/banner_servicos/banner-distrato-1.jpg') . '"" alt="" /></div>
                        </div>');
                break;

            case "atraso-na-obra-e-taxas-indevidas":
                print ('<div id="banner" class="hidden-sm-down">
                           <div class="banner-busca-apreensao-veiculo"><img style="width: 100%;" src="' . base_url('assets/site/img/banner_servicos/banner-obras-1.jpg') . '"" alt="" /></div>
                           <div class="banner-busca-apreensao-veiculo2"><img style="width: 100%;" src="' . base_url('assets/site/img/banner_servicos/banner-obras-2.jpg') . '"" alt="" /></div>     
                            <div class="botoes-banner">
                            <a title="">
                             <div class="btn-banner-servico' . $btnBannerAtivo . ' " id="btn1">
                              <p>Atraso na Obra</p> 
                            </div>
                            </a>
                            <a  title=""> 
                            <div class="btn-banner-servico" id="btn2">
                              <p>Taxas Indevidas</p> 
                            </div>
                            </a>
                            </div>
                        </div>');
                break;

            case "usucapiao":
                print ('<div id="banner" class="hidden-sm-down">
                           <div class="banner-busca-apreensao-veiculo"><img style="width: 100%;" src="' . base_url('assets/site/img/banner_servicos/banner-usucapiao.jpg') . '"" alt="" /></div>
                        </div>');
                break;

            case "reducao-de-juros-e-financiamento-imobiliario":
                print ('<div id="banner" class="hidden-sm-down">
                           <div class="banner-busca-apreensao-veiculo"><img style="width: 100%;" src="' . base_url('assets/site/img/banner_servicos/banner-imobiliario-1.jpg') . '"" alt="" /></div>
                           <div class="banner-busca-apreensao-veiculo2"><img style="width: 100%;" src="' . base_url('assets/site/img/banner_servicos/banner-imobiliario-2.jpg') . '"" alt="" /></div>     
                            <div class="botoes-banner">
                            <a title="">
                             <div class="btn-banner-servico' . $btnBannerAtivo . ' " id="btn1">
                              <p>Juros Abusivos e Taxas Indevidas</p> 
                            </div>
                            </a>
                            <a  title=""> 
                            <div class="btn-banner-servico" id="btn2">
                              <p>Perda do Imóvel em Leilão</p> 
                            </div>
                            </a>
                            </div>
                        </div>');
                break;

            case "empresa":
                print ('<div id="banner" class="hidden-sm-down">
        <img style="width: 100%;" src="' . base_url('assets/site/img/fundo-banner.jpg') . '"" alt="" />                   
    </div>');

                break;

            /*case "contato":
                print ('<div id="banner" class="hidden-sm-down">
        <img style="width: 100%;" src="' . base_url('assets/site/img/fundo-banner.jpg') . '"" alt="" />                   
    </div>');*/

                break;

            default:
                break;
        }
    }

}
