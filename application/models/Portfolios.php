<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Esta classe é a responsável pelos Produtos.
 * @author Paulo Sobral <paulo@plataformanet.com.br>
 * @version 0.1
 * @copyright Copyright © 2012, Penumake Compressores de AR Ltda.
 * @access public
 * @package CI_Model
 * @subpackage Produtos
 */
class Portfolios extends CI_Model {

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
     * Função que carrega os destaques da home.
     * @access public
     * @return void
     */
    function listar_portfolios() {

        $this->db->select('*');
        $this->db->from('tb_portfolio');
        $this->db->where('CD_STATUS',1);
        $this->db->where('DESTAQUE',1);
        $this->db->limit(7);

        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

}
