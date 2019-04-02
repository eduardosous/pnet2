<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrcamentoCtrl extends MY_Controller_Site {

    function __construct() {
        parent::__construct();

        //CARREGA OS HELPERS:
        $this->load->helper('categoria');

        //SETA O TITULO PARA A PÁGINA
        $this->template->set('title', 'Home');

        //SETA A PÁGINA PARA VERIFICAÇÃO, CASO NÃO SEJA A HOME, DEFINIR COMO FALSE
        $this->template->set('HomePag', FALSE);

        //SETA O NOME DA CLASSE PARA MUDAR O BACKGROUND DAS PÁGINAS
        $this->template->set('bodyImg', 'orcamento');

        //SETA O NOME DA PÁGINA PARA DEIXAR O LINK DO MENU ATIVO
        $this->template->set('pagAtual', 'Produtos');

        //SETA OS ARQUIVOS CSS, DESCOMENTAR CASO FOR USAR
        //$this->template->set('FilesCss', array("css/"));
        ////SETA OS ARQUIVOS JS, DESCOMENTAR CASO FOR USAR
        $this->template->set('FilesJs', array("libs/jquery-mask-plugin/dist/jquery.mask.min", "js/orcamento"));
    }

    public function index() {

        //RECUPERA AS INFORMAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Site)
        $data = $this->data;

        // LISTA AS CATEGORIAS
        $data['categorias'] = $this->Categorias->listar_categorias(TRUE);
        // SEPARA O ARRAY DE CATEGORIAS EM DOIS
        // $data['arraysCats'] = separaArray($data['categorias']);

        //CARREGA O TEMPLATE E A PÁGINA
        $this->template->load('site/template', 'site/orcamento', $data);
    }

    public function add_carrinho($id_produto = NULL) {

        if ($id_produto == NULL) {
            jsAlert("Erro ao adicionar o produto no carrinho!", "", TRUE);
        } else {
            if ($this->Produtos->carregar_produto_unico($id_produto, TRUE) == TRUE) {

                //VERIFICA SE O PRODUTO JÁ EXISTE
                $existe = FALSE;
                foreach ($this->cart->contents() as $items) {
                    if ($items['id'] == $id_produto) {
                        $existe = TRUE;
                        $id_carrinho = $items['rowid'];
                        $qntd = $items['qty'];
                    }
                }

                //VERIFICA SE O PRODUTO JÁ EXISTE NO CARRINHO:
                if ($existe == FALSE) {

                    $data = array(
                        'id' => $id_produto,
                        'qty' => 1,
                        'price' => 1.00,
                        'name' => $this->Produtos->produto,
                        'options' => array('modelo' => $this->Produtos->modelo, 'imagem' => $this->Produtos->imagem, 'link' => $this->Produtos->link)
                    );

                    $this->cart->insert($data);
                } else {
                    //AUTO INCREMENTA A QUANTIDADE ATÉ NO MÁXIMO 10:
                    $qntd++;
                    if ($qntd > 50) {
                        $qntd = 50;
                    }

                    $data = array(
                        'rowid' => $id_carrinho,
                        'qty' => $qntd
                    );

                    $this->cart->update($data);
                }

                $this->Produtos->produto;

                $this->load->helper('url');
                redirect(base_url("orcamento"), 'refresh');
            } else {
                jsAlert("Erro ao adicionar o produto no carrinho!", "", TRUE);
            }
        }
    }

    public function atualiza_carrinho($qntd = NULL, $id_carrinho = NULL) {

        if ($qntd == NULL || $id_carrinho == NULL) {
            jsAlert("Erro ao atualizar o produto no carrinho!", "", TRUE);
        } else {

            if ($qntd > 50) {
                $qntd = 50;
            }

            $data = array(
                'rowid' => $id_carrinho,
                'qty' => $qntd
            );

            $this->cart->update($data);
            print $this->cart->total_items();
        }
    }

    public function remove_carrinho($id_carrinho = NULL) {

        if ($id_carrinho == NULL) {
            jsAlert("Erro ao excluir o produto do carrinho!", "", TRUE);
        } else {
            $data = array(
                'rowid' => $id_carrinho,
                'qty' => 0
            );

            $this->cart->update($data);
            $this->load->helper('url');
            redirect(base_url("orcamento"), 'refresh');
        }
    }

}