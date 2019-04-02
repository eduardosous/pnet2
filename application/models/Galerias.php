<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Esta classe é a responsável pela galeria dos Produtos.
 * @author Paulo Sobral <paulo@plataformanet.com.br>
 * @version 0.1
 * @copyright Copyright © 2012, Lojas Kamikawa.
 * @access public
 * @package CI_Model
 * @subpackage Galerias
 */
class Galerias extends CI_Model {

    /**
     * Função que carrega imagens da galeria do banco.
     * @access public
     * @param $id_produto: Id do produto a carregar.
     * @return $query: Retorna o recordset da consulta.
     * @return FALSE: Caso nenhuma linha encontrada.
     */
    function carregar_galeria($id_produto) {
        
        $this->db->select('*');
        $this->db->from('tb_galeria_produto');
        $this->db->where('FK_PRODUTO',$id_produto);
        
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    function carregar_galeria_site($id_produto) {
        

        /*$this->db->select('*');
        $this->db->from('tb_galeria_produto');
        $this->db->where('NM_ATIVO',1);
        $this->db->where('FK_PRODUTO',$id_produto);
        $this->db->limit(4);*/
        
        $sql = "SELECT * FROM tb_galeria_produto WHERE NM_ATIVO = 1 AND FK_PRODUTO = $id_produto LIMIT 3";
        
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    
    function carregar_galeria_site2($id_produto) {
        

        /*$this->db->select('*');
        $this->db->from('tb_galeria_produto');
        $this->db->where('NM_ATIVO',1);
        $this->db->where('FK_PRODUTO',$id_produto);
        $this->db->limit(4,99);*/
        
        $sql = "SELECT * FROM tb_galeria_produto WHERE NM_ATIVO = 1 AND FK_PRODUTO = '$id_produto' LIMIT 5,5";
        
        
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

}
