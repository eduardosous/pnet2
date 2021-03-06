<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BlogCtrl extends MY_Controller_Site {
    
    function __construct() {
        parent::__construct();
        
        //SETA O TITULO PARA A PÁGINA
        $this->template->set('title', 'Empresa');

        //SETA A PÁGINA PARA VERIFICAÇÃO
        $this->template->set('BlogPag', FALSE);

        $this->template->set('bannerPage', 'empresa');
        
        $this->template->set('btnBannerAtivo', FALSE);
        
        //SETA O NOME DA CLASSE PARA MUDAR O BACKGROUND DAS PÁGINAS
        $this->template->set('bodyImg', 'blog'); 

        //SETA O NOME DA PÁGINA PARA DEIXAR O LINK DO MENU ATIVO
        $this->template->set('pagAtual', 'Blog');

        //SETA OS ARQUIVOS CSS
        //$this->template->set('FilesCss', array("css/"));

        //SETA OS ARQUIVOS JS
        $this->template->set('FilesJs', array(""));
    }

    
    public function index() {
        
        //RECUPERA AS INFORMAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Site)
        $data = $this->data;

        //LISTA OS BANNERS
        $data['banners'] = $this->Banners->listar_banners_site();
        
        //CARREGA O TEMPLATE E A PÁGINA
        $this->template->load('site/template', 'site/blog', $data);
    }

    public function blog($linkBlog) {
  
        //RECUPERA AS INFORMAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Site)
        $data = $this->data;

        //LISTA OS BANNERS
        $data['banners'] = $this->Banners->listar_banners_site();
        
        //CARREGA O TEMPLATE E A PÁGINA
        $this->template->load('site/template', 'site/'.$linkBlog, $data);
    }

}
