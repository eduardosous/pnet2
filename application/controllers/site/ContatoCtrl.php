<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContatoCtrl extends MY_Controller_Site {

   
    function __construct() {
        parent::__construct();
        
        //SETA O TITULO PARA A PÁGINA
        $this->template->set('title', 'Contato');
        
        //SETA A PÁGINA PARA VERIFICAÇÃO
        $this->template->set('HomePag', FALSE);
        
        $this->template->set('bannerPage', 'contato');
        
        $this->template->set('btnBannerAtivo', FALSE);
        
        //SETA O NOME DA PÁGINA PARA DEIXAR O LINK DO MENU ATIVO
        $this->template->set('pagAtual', 'Contato');
        
        //SETA O NOME DA CLASSE PARA MUDAR O BACKGROUND DAS PÁGINAS
        $this->template->set('bodyImg', 'contato');

        //SETA OS ARQUIVOS CSS
        //$this->template->set('FilesCss', array("css/"));

        //SETA OS ARQUIVOS JS
        $this->template->set('FilesJs', array(""));
    }


    public function index() {
        
        //RECUPERA AS INFORMAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Site)
        $data = $this->data;

        //CARREGA O TEMPLATE E A PÁGINA
        $this->template->load('site/template', 'site/contato', $data);
    }

}
