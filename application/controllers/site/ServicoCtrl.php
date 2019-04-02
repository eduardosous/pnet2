<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ServicoCtrl extends CI_Controller {

    function __construct() {
        parent::__construct();

        //SETA O TITULO PARA A PÁGINA
        $this->template->set('title', 'Servico');

        //SETA A PÁGINA PARA VERIFICAÇÃO
        $this->template->set('HomePag', FALSE);

        //SETA O NOME DA PÁGINA PARA DEIXAR O LINK DO MENU ATIVO
        $this->template->set('pagAtual', 'Servicos');

        //SETA O NOME DA CLASSE PARA MUDAR O BACKGROUND DAS PÁGINAS
        $this->template->set('bodyImg', 'servicos');

        //SETA OS ARQUIVOS CSS
        $this->template->set('FilesCss', array("libs/magnific-popup/dist/magnific-popup"));

        //SETA OS ARQUIVOS JS
        $this->template->set('FilesJs', array("libs/magnific-popup/dist/jquery.magnific-popup.min", "js/funcao-lightbox-magnific-popup"));
    }

    public function servicos($linkServico) {

        //CARREGA O TEMPLATE E A PÁGINA
        $this->template->load('site/template', 'site/' . $linkServico . '');
    }

}
