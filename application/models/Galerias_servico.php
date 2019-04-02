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
class Galerias_servico extends CI_Model {

    function carregar_galeria_servico($link_servico) {

        $this->db->select('*');
        $this->db->from('tb_galeria_servico tgs');
        $this->db->join('tb_servicos ts','tgs.FK_SERVICO = ts.PK_SERVICO');
        $this->db->where('NM_ATIVO', 1);
        $this->db->where('ts.NM_LINK', $link_servico);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

}
