<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Esta classe é a responsável pelos Produtos.
 * @author Eduardo Sousa <eduardo@plataformanet.com.br>
 * @version 3.0
 * @copyright Copyright © 2017
 * @access public
 * @package CI_Model
 * @subpackage Produtos
 */
class Produtos extends CI_Model {

    /**
     * Função consrutora que puxa construtor da classe CI_Model.
     * @access public
     * @return void
     */
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * Função que carrega o produto do banco para a adm.
     * @access public
     * @param $id_produto: Id do produto carregar.
     * @return void
     */
    function carregar_produto($produto) {

        $this->db->select('p.*,c.NM_CATEGORIA, c.NM_LINK AS LINK_CATEGORIA, s.NM_SUBCATEGORIA, s.NM_LINK as LINK_SUBCATEGORIA');
        $this->db->from('tb_produto p');
        $this->db->join('tb_categoria c', 'p.FK_CATEGORIA = c.PK_CATEGORIA', 'left');
        $this->db->join('tb_subcategoria s', 'p.FK_SUBCATEGORIA = s.PK_SUBCATEGORIA', 'left');
        $this->db->where('p.NM_LINK', $produto);
        $this->db->where('p.CD_STATUS', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $linha) {
                //RESGATA OS VALORES:
                $this->id_produto = $linha->PK_PRODUTO;
                $this->categoria = $linha->NM_CATEGORIA;
                $this->subcategoria = $linha->NM_SUBCATEGORIA;
                $this->produto = $linha->NM_PRODUTO;
                $this->link = $linha->NM_LINK;
                $this->modelo = $linha->NM_MODELO;
                $this->codigo = $linha->CD_REFERENCIA;
                $this->imagem = $linha->IMAGEM;
                $this->descricao = $linha->DESCRICAO;
                $this->ficha_tecnica = $linha->FICHA_TECNICA;
                $this->ativo = $linha->CD_STATUS;
                $this->destaque = $linha->DESTAQUE;
                $this->meta_titulo = $linha->META_TITULO;
                $this->meta_palavras = $linha->META_PALAVRAS;
                $this->meta_descricao = $linha->META_DESCRICAO;
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Função que carrega o produto do banco para a adm.
     * @access public
     * @param $id_produto: Id do produto carregar.
     * @return void
     */
    function carregar_produto_unico($produto) {

        $this->db->select('p.*,c.NM_CATEGORIA, c.NM_LINK AS LINK_CATEGORIA, s.NM_SUBCATEGORIA, s.NM_LINK as LINK_SUBCATEGORIA');
        $this->db->from('tb_produto p');
        $this->db->join('tb_categoria c', 'p.FK_CATEGORIA = c.PK_CATEGORIA', 'left');
        $this->db->join('tb_subcategoria s', 'p.FK_SUBCATEGORIA = s.PK_SUBCATEGORIA', 'left');
        $this->db->where('p.PK_PRODUTO', $produto);
        $this->db->where('p.CD_STATUS', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        

       
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $linha) {
                //RESGATA OS VALORES:
                $this->id_produto = $linha->PK_PRODUTO;
                $this->categoria = $linha->NM_CATEGORIA;
                $this->subcategoria = $linha->NM_SUBCATEGORIA;
                $this->produto = $linha->NM_PRODUTO;
                $this->link = $linha->NM_LINK;
                $this->modelo = $linha->NM_MODELO;
                $this->codigo = $linha->CD_REFERENCIA;
                $this->imagem = $linha->IMAGEM;
                $this->descricao = $linha->DESCRICAO;
                $this->ficha_tecnica = $linha->FICHA_TECNICA;
                $this->ativo = $linha->CD_STATUS;
                $this->destaque = $linha->DESTAQUE;
                $this->meta_titulo = $linha->META_TITULO;
                $this->meta_palavras = $linha->META_PALAVRAS;
                $this->meta_descricao = $linha->META_DESCRICAO;
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Função que carrega os destaques da home.
     * @access public
     * @return void
     */
    function lista_destaques() {

        $this->db->select('p.*,c.NM_CATEGORIA, c.NM_LINK AS LINK_CATEGORIA, s.NM_SUBCATEGORIA, s.NM_LINK as LINK_SUBCATEGORIA');
        $this->db->from('tb_produto p');
        $this->db->join('tb_subcategoria s', 'p.FK_SUBCATEGORIA = s.PK_SUBCATEGORIA', 'left');
        $this->db->join('tb_categoria c', 'p.FK_CATEGORIA = c.PK_CATEGORIA', 'left');
        $this->db->where('p.CD_STATUS', 1);
        $this->db->where('p.DESTAQUE', 1);
        $this->db->order_by('p.PK_PRODUTO', 'RANDOM');
        $this->db->limit(6);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
    
    function lista_destaques_home() {

        $this->db->select('p.*,c.NM_CATEGORIA, c.NM_LINK AS LINK_CATEGORIA, s.NM_SUBCATEGORIA, s.NM_LINK as LINK_SUBCATEGORIA');
        $this->db->from('tb_produto p');
        $this->db->join('tb_subcategoria s', 'p.FK_SUBCATEGORIA = s.PK_SUBCATEGORIA', 'left');
        $this->db->join('tb_categoria c', 'p.FK_CATEGORIA = c.PK_CATEGORIA', 'left');
        $this->db->where('p.CD_STATUS', 1);
        $this->db->where('p.DESTAQUE', 1);
        $this->db->order_by('p.PK_PRODUTO', 'RANDOM');
        $this->db->limit(5);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    function lista_produtos() {
        $this->db->select('*');
        $this->db->from('tb_produto');
        $this->db->where('CD_STATUS',1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }

    }
    
    /**
     * Função que carrega os produtos em promoção baseado em categorias.
     * @param $inicio: Inicio da Query.
     * @param $maximo: Fim da Query.
     * @access public
     * @return $query: Retorna o recordset da consulta.
     * @return FALSE: Caso nenhuma linha encontrada.
     */
    function lista_produtos_categoria_site($categoria, $inicio, $maximo) {
        $sql = "SELECT p.*, c.NM_CATEGORIA, c.NM_LINK AS LINK_CATEGORIA, s.NM_SUBCATEGORIA, s.NM_LINK as LINK_SUBCATEGORIA
        FROM tb_produto p LEFT JOIN tb_subcategoria s ON p.FK_SUBCATEGORIA = s.PK_SUBCATEGORIA LEFT JOIN tb_categoria c ON p.FK_CATEGORIA = c.PK_CATEGORIA WHERE p.CD_STATUS = 1 AND p.FK_CATEGORIA = '$categoria' LIMIT $inicio,$maximo";

        
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    /**
     * Função que carrega os produtos baseado em subcategorias.
     * @param $inicio: Inicio da Query.
     * @param $maximo: Fim da Query.
     * @access public
     * @return $query: Retorna o recordset da consulta.
     * @return FALSE: Caso nenhuma linha encontrada.
     */
    function lista_produtos_subcategoria_site($subcategoria, $inicio, $maximo) {
        $sql = "SELECT p.*, c.NM_CATEGORIA, c.NM_LINK AS LINK_CATEGORIA, s.NM_SUBCATEGORIA, s.NM_LINK as LINK_SUBCATEGORIA
        FROM tb_produto p LEFT JOIN tb_subcategoria s ON p.FK_SUBCATEGORIA = s.PK_SUBCATEGORIA LEFT JOIN tb_categoria c ON p.FK_CATEGORIA = c.PK_CATEGORIA WHERE p.CD_STATUS = 1 AND p.FK_SUBCATEGORIA = '$subcategoria' LIMIT $inicio,$maximo";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    function carregar_produto_site($produto) {
        $sql = "SELECT p.*, c.NM_CATEGORIA, c.NM_LINK AS LINK_CATEGORIA, s.NM_SUBCATEGORIA, s.NM_LINK as LINK_SUBCATEGORIA
        FROM tb_produto p
        LEFT JOIN tb_subcategoria s ON p.FK_SUBCATEGORIA = s.PK_SUBCATEGORIA
        LEFT JOIN tb_categoria c ON p.FK_CATEGORIA = c.PK_CATEGORIA
        WHERE p.NM_LINK = '$produto' AND p.CD_STATUS AND c.CD_STATUS = 1 LIMIT 1";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $linha) {
                //RESGATA OS VALORES:
                $this->id_produto = $linha->PK_PRODUTO;
                $this->categoria = $linha->NM_CATEGORIA;
                $this->subcategoria = $linha->NM_SUBCATEGORIA;
                $this->produto = $linha->NM_PRODUTO;
                $this->link = $linha->NM_LINK;
                $this->modelo = $linha->NM_MODELO;
                $this->codigo = $linha->CD_REFERENCIA;
                $this->imagem = $linha->IMAGEM;
                $this->descricao = $linha->DESCRICAO;
                $this->ficha_tecnica = $linha->FICHA_TECNICA;
                $this->ativo = $linha->CD_STATUS;
                $this->destaque = $linha->DESTAQUE;
                $this->meta_titulo = $linha->META_TITULO;
                $this->meta_palavras = $linha->META_PALAVRAS;
                $this->meta_descricao = $linha->META_DESCRICAO;
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Função que realiza uma busca nos produtos do banco para o site.
     * @access public
     * @param $busca: Termo pesquisado.
     * @param $desativados: Mostrar itens desativados.
     * @return $query: Retorna o recordset da consulta.
     * @return FALSE: Caso nenhuma linha encontrada.
     */
    function listar_resultado_busca_site($busca) {
        $sql = "SELECT p.*, c.NM_CATEGORIA, c.NM_LINK AS LINK_CATEGORIA, s.NM_SUBCATEGORIA, s.NM_LINK as LINK_SUBCATEGORIA
        FROM tb_produto p LEFT JOIN tb_subcategoria s ON p.FK_SUBCATEGORIA = s.PK_SUBCATEGORIA
        LEFT JOIN tb_categoria c ON p.FK_CATEGORIA = c.PK_CATEGORIA
        WHERE p.CD_STATUS = 1 AND c.CD_STATUS = 1 AND p.NM_PRODUTO LIKE '%$busca%' OR c.NM_CATEGORIA LIKE '%$busca%' OR s.NM_SUBCATEGORIA LIKE '%$busca%' GROUP BY p.PK_PRODUTO";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    
    /**
     * Função que conta os produtos no banco baseados pela categoria.
     * @access public
     * @return $query.
     */
    function contar_produtos_categoria_site($id_categoria) {
        $query = $this->db->query("SELECT PK_PRODUTO FROM tb_produto WHERE FK_CATEGORIA = '$id_categoria' AND CD_STATUS = 1");
        return $query;
    }
    
    /**
     * Função que conta os produtos no banco baseados pela subcategoria.
     * @access public
     * @return $query.
     */
    function contar_produtos_subcategoria_site($id_subcategoria) {
        $query = $this->db->query("SELECT PK_PRODUTO FROM tb_produto WHERE FK_SUBCATEGORIA = '$id_subcategoria' AND CD_STATUS = 1");
        return $query;
    }

}
