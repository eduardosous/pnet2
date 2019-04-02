<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Este é o Controller responsável pela Página de Produtos no Site
 * @author Carlos Silva <carlos@plataformanet.com.br>
 * @version 3.0
 * @copyright Copyright © 2017, Plataformanet Mídia Online
 * @access public
 * @package MY_Controller_Adm
 * @subpackage ProdutosCtrl
 */
class ProdutosCtrl extends MY_Controller_Site {

    public function __construct() {

        // CHAMA O CONSTRUTOR DA CLASSE PAI(MY_Controller_Site)
        parent::__construct();

        //CARREGA OS HELPERS:
        $this->load->helper('categoria');
        $this->load->helper('produto');
        $this->load->helper('galeria');
    }

    public function index($categoria = NULL, $subcategoria = NULL) {

        //RECUPERA AS INFORMAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Site)
        $data = $this->data;

        //CARREGA MENUS (CATEGORIA/SUBCATEGORIA):
        $data['categorias'] = $this->Categorias->listar_categorias(TRUE);


        //  ----- SETA O TITULO PARA A PÁGINA -----
        $this->template->set('title', 'Produtos');


        //  ----- SETA VARIÁVEIS PARA VERIFICAÇÃO -----
        //SETA O NOME DA PÁGINA PARA DEIXAR O LINK DO MENU ATIVO
        $this->template->set('pagAtual', 'Produtos');


        //  ----- SETA OS ARQUIVOS CSS E JS -----
        //  O CAMINHO BASE JÁ APONTA PARA A PASTA: "/assets/site/"
        $this->template->set('FilesCss', array("libs/ekko-lightbox/dist/ekko-lightbox.min"));
        $this->template->set('FilesJs', array("libs/ekko-lightbox/dist/ekko-lightbox.min", "js/funcao-lightbox"));

        // FUNÇÃO LISTA PRODUTOS    
        $data['lista_produtos'] = $this->Produtos->lista_produtos();

        // CASO NÃO EXISTE OS LINKS DE CATEGORIA E SUBCATEGORIA, 
        // LISTE OS PRODUTOS EM DESTAQUE
        if ($categoria == NULL && $subcategoria == NULL) {
            $data['produtos'] = $this->Produtos->lista_destaques();

            //CARREGA O TEMPLATE E A PÁGINA
            $this->template->load('site/template', 'site/produtos', $data);
        }



        //VERIFICA A CATEGORIA:
        if ($categoria != NULL) {

            $this->Categorias->carregar_categoria_link($categoria);



            //VERIFICA SE A CATEGORIA É UNICA:
            if ($this->Categorias->unica == 1) {

                //VERIFICA QUANTOS PRODUTOS EXISTEM PARA ESTA CATEGORIA UNICA:
                $query_produtos_categoria = $this->Produtos->contar_produtos_categoria_site($this->Categorias->id_categoria);
                $qtd_produtos_categoria = $query_produtos_categoria->num_rows();

                //SE FOR IGUAL A ZERO, PÁGINA DE ERRO:
                if ($qtd_produtos_categoria <= 0) {
                    redirect(base_url("site/erro_404"), 'refresh');
                }
                //SE FOR SOMENTE UM PRODUTO:
                elseif ($qtd_produtos_categoria == 1) {
                    $linha = $query_produtos_categoria->row(0);
                    $this->Produtos->carregar_produto_unico($linha->PK_PRODUTO, TRUE);

                    // 'JUNTA' O ARRAY $data COM O ARRAY DO PRODUTO
                    $data = array_merge($data, carregaProduto($this->Produtos));

                    //  ----- SETA O TITULO PARA A PÁGINA -----
                    $this->template->set('title', $data['produto']);

                    //CARREGA A GALERIA:
                    $this->load->model('Galerias');
                    $data['galeria'] = $this->Galerias->carregar_galeria_site($this->Produtos->id_produto);
                    $data['galeria2'] = $this->Galerias->carregar_galeria_site2($data['id_produto']);

                    //CARREGA O TEMPLATE E A PÁGINA
                    $this->template->load('site/template', 'site/produto', $data);
                }
                //SE FOR MAIS QUE UM, TRAZ TODOS:
                else {

                    $data['categoria'] = $this->Categorias->categoria;
                    $data['meta_titulo'] = $this->Categorias->meta_titulo;
                    $data['meta_palavras'] = $this->Categorias->meta_palavras;
                    $data['meta_descricao'] = $this->Categorias->meta_descricao;
                    $data['produtos'] = $this->Produtos->lista_produtos_categoria_site($this->Categorias->id_categoria, 0, 999);

                    //CARREGA O TEMPLATE E A PÁGINA
                    $this->template->load('site/template', 'site/produtos', $data);
                }
            } else if ($subcategoria == NULL) {
                $data['categoria'] = $this->Categorias->categoria;
                $data['produtos'] = $this->Produtos->lista_produtos_categoria_site($this->Categorias->id_categoria, 0, 999);

                //CARREGA O TEMPLATE E A PÁGINA
                $this->template->load('site/template', 'site/produtos', $data);
            }
            //SE NÃO É UNICA VERIFICA AGORA A SUBCATEGORIA:
            else {
                $this->Subcategorias->carregar_subcategoria_link_site($subcategoria);

                //VERIFICA SE EXISTEM PRODUTOS NESTA SUBCATEGORIA:
                $query_produtos_subcategoria = $this->Produtos->contar_produtos_subcategoria_site($this->Subcategorias->id_subcategoria);
                $qtd_produtos_subcategoria = $query_produtos_subcategoria->num_rows();

                //SE FOR IGUAL A ZERO, PÁGINA DE ERRO:
                if ($qtd_produtos_subcategoria <= 0) {
                    redirect(base_url("site/erro_404"), 'refresh');
                } elseif ($qtd_produtos_subcategoria == 1) {//SE FOR SOMENTE UM PRODUTO:
                    $linha = $query_produtos_subcategoria->row(0);
                    $this->Produtos->carregar_produto_unico($linha->PK_PRODUTO, TRUE);

                    // 'JUNTA' O ARRAY $data COM O ARRAY DO PRODUTO
                    $data = array_merge($data, carregaProduto($this->Produtos));

                    //  ----- SETA O TITULO PARA A PÁGINA -----
                    $this->template->set('title', $data['produto']);

                    //CARREGA A GALERIA:
                    $this->load->model('Galerias');
                    $data['galeria'] = $this->Galerias->carregar_galeria_site($this->Produtos->id_produto);
                    $data['galeria2'] = $this->Galerias->carregar_galeria_site2($data['id_produto']);

                    //CARREGA O TEMPLATE E A PÁGINA
                    $this->template->load('site/template', 'site/produto', $data);
                }
                //MOSTRA TODOS DA SUBCATEGORIA
                else {

                    $data['categoria'] = $this->Categorias->categoria;
                    $data['subcategoria'] = $this->Subcategorias->subcategoria;
                    $data['meta_titulo'] = $this->Subcategorias->meta_titulo;
                    $data['meta_palavras'] = $this->Subcategorias->meta_palavras;
                    $data['meta_descricao'] = $this->Subcategorias->meta_descricao;
                    $data['produtos'] = $this->Produtos->lista_produtos_subcategoria_site($this->Subcategorias->id_subcategoria, 0, 999);

                    //CARREGA O TEMPLATE E A PÁGINA
                    $this->template->load('site/template', 'site/produtos', $data);
                }
            }
        }
    }

    /**
     * CARREGA A PÁGINA DO PRODUTOS
     * @param  [type] $produto Link do produto
     * @return view          A página esperada
     */
    public function produto($produto) {

        //RECUPERA AS INFORMAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Site)
        $data = $this->data;

        //CARREGA MENUS (CATEGORIA/SUBCATEGORIA):
        $data['categorias'] = $this->Categorias->listar_categorias(TRUE);


        //  ----- SETA VARIÁVEIS PARA VERIFICAÇÃO -----
        //SETA O NOME DA PÁGINA PARA DEIXAR O LINK DO MENU ATIVO
        $this->template->set('pagAtual', 'produtos');


        //  ----- SETA OS ARQUIVOS CSS E JS -----
        //  O CAMINHO BASE JÁ APONTA PARA A PASTA: "/assets/site/"
        $this->template->set('FilesCss', array("libs/ekko-lightbox/dist/ekko-lightbox.min", "css/produtos"));
        $this->template->set('FilesJs', array("libs/ekko-lightbox/dist/ekko-lightbox.min", "js/produtos"));


        // CASO O PRODUTO EXISTA, CARREGUE-O
        if ($this->Produtos->carregar_produto_site($produto) != FALSE) {

            // 'JUNTA' O ARRAY $data COM O ARRAY DO PRODUTO
            $data = array_merge($data, carregaProduto($this->Produtos));

            //  ----- SETA O TITULO PARA A PÁGINA -----
            $this->template->set('title', $data['produto']);

            //CARREGA A GALERIA:
            $this->load->model('Galerias');
            $data['galeria'] = $this->Galerias->carregar_galeria_site($data['id_produto']);
            $data['galeria2'] = $this->Galerias->carregar_galeria_site2($data['id_produto']);


            // CARREGA A BIBLIOTECA DE CARRINHO/ORÇAMENTO
            $this->load->library('cart');

            //CARREGA O TEMPLATE E A PÁGINA
            $this->template->load('site/template', 'site/produto', $data);
        } else {
            //CARREGA O TEMPLATE E A PÁGINA
            $this->template->load('site/template', 'site/erro_404', $data);
        }
    }

}
