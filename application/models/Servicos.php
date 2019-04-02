<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Esta classe é a responsável pelos servicos.
 * @author Paulo Sobral <paulo@plataformanet.com.br>
 * @version 0.1
 * @copyright Copyright © 2012, Penumake Compressores de AR Ltda.
 * @access public
 * @package CI_Model
 * @subpackage servicos
 */
class Servicos extends CI_Model {
    
    
    public function carrega_link_servico() {
    
     $this->db->select('NM_LINK');
     $this->db->from('tb_servicos');
     $this->db->order_by('PK_SERVICO');
     $this->db->limit(1);
        
     $query = $this->db->get();   
        
     if ($query->num_rows() > 0) {
            foreach ($query->result() as $linha) {
                $this->link_servico = $linha->NM_LINK;
                
            }

            return TRUE;
        } else {
            return FALSE;
        }    
        
    }

    /**
     * Função que carrega todas as newsletters do banco.
     * @access public
     * @param $id_servico: Id do servico a ser carregado.
     * @return void
     */
    function carregar_servico($id_servico = NULL) {

        $this->db->select('*');
        $this->db->from('tb_servicos');
        $this->db->where('PK_SERVICE', $id_servico);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $linha) {
                $this->id_servico = $linha->PK_SERVICO;
                $this->servico = $linha->NM_SERVICO;
                $this->descricao = $linha->NM_DESCRICAO;
                $this->imagem = $linha->ARQUIVO;
                $this->link = $linha->NM_LINK;
                $this->ativo = $linha->CD_STATUS;
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Função que carrega todas as newsletters do banco.
     * @access public
     * @param $id_servico: Id do servico a ser carregado.
     * @return void
     */
    function carregar_servico_site($link_servico = NULL) {

        $this->db->select('*');
        $this->db->from('tb_servicos');
        $this->db->where('NM_LINK', $link_servico);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $linha) {
                $this->id_servico = $linha->PK_SERVICO;
                $this->servico = $linha->NM_SERVICO;
                $this->descricao = $linha->NM_DESCRICAO;
                $this->imagem = $linha->ARQUIVO;
                $this->link = $linha->NM_LINK;
                $this->ativo = $linha->CD_STATUS;
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Função que lista os servicos do banco.
     * @access public
     * @return TRUE caso query OK
     * @return FALSE caso query com erro
     */
    function listar_servicos_menu_site() {
       
        $this->db->select('*');
        $this->db->from('tb_servicos');
        $this->db->where('CD_STATUS', 1);
        $this->db->order_by('PK_SERVICO');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

}
