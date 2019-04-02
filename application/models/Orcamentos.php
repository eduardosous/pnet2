<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Esta classe é a responsável pelo contato.
* @author Eduardo Sousa <eduardo@plataformanet.com.br>
* @version 3.0
* @copyright Copyright © 2017.
* @access public
* @package CI_Model
* @subpackage Orcamento
*/

class Orcamentos extends CI_Model 
{
   
	
    /**
    * Função consrutora que puxa construtor da classe CI_Model.
    * @access public
    * @return void
    */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
    /**
    * Função que cadastra o orcamento no banco.
    * @access public
    * @param $array_contato: Array contendo informações do contato.
    * @return TRUE caso OK;
    * @return FALSE caso erro;
    */
    function fechar_orcamento($array_orcamento)
    {
              $this->nome = $array_orcamento['nome'];
              $this->email = $array_orcamento['email'];
              $this->telefone = $array_orcamento['telefone'];
              $this->mensagem = $array_orcamento['mensagem'];
    	
    	//INSERE O ORCAMENTO NO BANCO:
    	$query = $this->db->query("INSERT INTO tb_orcamento (NM_NOME,NU_TELEFONE,NM_EMAIL,NM_MENSAGEM,CD_STATUS_ORCAMENTO,DT_ORCAMENTO,HR_ORCAMENTO) VALUES ('$this->nome','$this->telefone','$this->email','$this->mensagem','1',CURDATE(),NOW())");
              
              $this->id_orcamento = $this->db->insert_id();
            
            $this->fechar_detalhes_orcamento($this->id_orcamento);
             
    }
	
   /**
     * Função que cadastra os detalhes do orcamento com base no orcamento no banco. O carrinho do CI não pode estar vazio.
     * @access public
     * @param $id_orcamento: Id do orcamento.
     * @return TRUE: Caso cadastro OK
     * @return FALSE: Caso algum erro.
     */
    function fechar_detalhes_orcamento($id_orcamento)
    {
            
            //RECEBE O ID DO ORCAMENTO:
            $this->id_orcamento = $id_orcamento;
            
            //SALVA OS PRODUTOS:
            foreach ($this->cart->contents() as $items)
            {
                    $this->id_produto = $items['id'];
                    $this->qntd = $items['qty'];
                    
                    $sql = "INSERT INTO tb_detalhe_orcamento (FK_ORCAMENTO, FK_PRODUTO, QNTD_PRODUTO)
                    VALUES ('$this->id_orcamento','$this->id_produto', '$this->qntd')";
                    
                    $query = $this->db->simple_query($sql);
                    
                    //print $sql;
                    
            }
            
            return $query;
    }
    
}