<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeCtrl extends MY_Controller_Site {

    function __construct() {
        parent::__construct();
        
        
        //CARREGA OS HELPERS:
        $this->load->helper('categoria');
        
        //SETA O TITULO PARA A PÁGINA
        $this->template->set('title', 'Home');
        
        //SETA A PÁGINA PARA VERIFICAÇÃO
        $this->template->set('bannerPage', 'home');
        //$this->template->set('HomePag', TRUE);
        
        $this->template->set('btnBannerAtivo', FALSE);
        
        //SETA O NOME DA PÁGINA PARA DEIXAR O LINK DO MENU ATIVO
        $this->template->set('pagAtual', 'Home');

        //SETA OS ARQUIVOS CSS
        //$this->template->set('FilesCss', array("css/"));

        //SETA OS ARQUIVOS JS
        $this->template->set('FilesJs', array("js/funcao-modal"));
    }

    
    public function index() {
        
        //RECUPERA AS INFORMAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Site)
        $data = $this->data;
        
        //LISTA OS BANNERS
        $data['banners'] = $this->Banners->listar_banners_site();
        

        //CARREGA O TEMPLATE E A PÁGINA
        $this->template->load('site/template', 'site/home',$data);
    }

}
