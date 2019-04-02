<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Erro404Ctrl extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        
        //SETA O TITULO PARA A PÁGINA
        $this->template->set('title', 'Erro 404 - Página não Encontrada');
        
        //SETA A PÁGINA PARA VERIFICAÇÃO
        $this->template->set('HomePag', FALSE);
        
        //SETA O NOME DA PÁGINA PARA DEIXAR O LINK DO MENU ATIVO
        $this->template->set('pagAtual', 'Erro 404');
        
        //SETA O NOME DA CLASSE PARA MUDAR O BACKGROUND DAS PÁGINAS
        $this->template->set('bodyImg', 'erro404');

        //SETA OS ARQUIVOS CSS
        $this->template->set('FilesCss', array("css/"));

        //SETA OS ARQUIVOS JS
        $this->template->set('FilesJs', array("js/",
            "")
        );
    }


    public function erro404() {

        //CARREGA O TEMPLATE E A PÁGINA
        $this->template->load('site/template', 'site/erro404');
    }

}
