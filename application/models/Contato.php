<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Esta classe é a responsável pelo contato.
* @author Paulo Sobral <paulo@plataformanet.com.br>
* @version 0.1
* @copyright Copyright © 2012, Penumake Compressores de AR Ltda.
* @access public
* @package CI_Model
* @subpackage Contato
*/

class Contato extends CI_Model 
{
    /**
    * Variável recebe o id do contato.
    * @access public
    * @name $id_contato
    */
    var $id_contato;
    
    /**
    * Variável recebe o nome do contato.
    * @access public
    * @name $nome
    */
    var $nome;
	
    /**
    * Variável recebe o email do contato.
    * @access public
    * @name $email
    */
    var $email;
    
   
    /**
    * Variável recebe o telefone do contato.
    * @access public
    * @name $telefone
    */
    var $telefone;
    
    /**
    * Variável recebe a mensagem do contato.
    * @access public
    * @name $mensagem
    */
    var $mensagem;
    
    /**
     * Variável recebe a data do contato.
     * @access public
     * @name $data_contato
     */
    var $data_contato;
    
    /**
     * Variável recebe a hora do contato.
     * @access public
     * @name $hora_contato
     */
    var $hora_contato;
    
    /**
     * Variável recebe o status do contato (Se já foi visualizado).
     * @access public
     * @name $status
     */
    var $status;
	
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
    * Função que cadastra a newsletter no banco.
    * @access public
    * @param $array_contato: Array contendo informações do contato.
    * @return TRUE caso OK;
    * @return FALSE caso erro;
    */
    function cadastrar_contato($array_contato)
    {
              $this->nome = $array_contato['nome'];
              $this->email = $array_contato['email'];
              $this->telefone = $array_contato['telefone'];
              $this->mensagem = $array_contato['mensagem'];
    	
    	//INSERE O CONTATO NO BANCO:
    	$query = $this->db->simple_query("INSERT INTO tb_contato (NM_NOME, NM_EMAIL, NM_TELEFONE, NM_MENSAGEM, DT_CONTATO, HR_CONTATO) VALUES ('$this->nome', '$this->email', '$this->telefone', '$this->mensagem', CURDATE(), CURTIME())");
              return $query;
    }       
	
    /**
    * Função que exclui o contato no banco.
    * @access public
    * @param $id_contato: Id do contato a excluir.
    * @return void
    */
    function excluir_contato($id_contato)
    {
    	$this->id_contato = $id_contato;
    	
    	//EXCLUI O CONTATO NO BANCO:
    	$query = $this->db->simple_query("DELETE FROM tb_contato WHERE PK_CONTATO = '$this->id_contato'");
               return $query;
    }
	
    /**
    * Função que carrega todas os contatos do banco.
    * @access public
    * @param $id_contato: Id do contato a carregar.
    * @return TRUE caso OK;
    * @return FALSE caso erro;
    */
    function carregar_contato($id_contato)
    {
              $this->id_contato = $id_contato;
              $sql = "SELECT * FROM tb_contato WHERE PK_CONTATO = '$this->id_contato' LIMIT 1";
    	
    	//SELECIONA OS NEWSLETTERS:
    	$query = $this->db->query($sql);
    	
    	if($query->num_rows() > 0)
    	{
                    //ATUALIZA STATUS DO CONTATO:
                    $this->db->simple_query("UPDATE tb_contato SET CD_STATUS = 1 WHERE PK_CONTATO = '$this->id_contato'");
                    $linha = $query->row();
                    
                    $this->id_contato = $linha->PK_CONTATO;
                    $this->nome = $linha->NM_NOME;
                    $this->email = $linha->NM_EMAIL;
                    $this->telefone = $linha->NM_TELEFONE;
                    $this->mensagem = $linha->NM_MENSAGEM;
                    $this->data_contato = $linha->DT_CONTATO;
                    $this->hora_contato = $linha->HR_CONTATO;
                    
                    return TRUE;
    	}
    	else
    	{
                    return FALSE;
    	}
    }
    
    /**
    * Função que carrega todas os contatos do banco.
    * @access public
    * @return void
    */
    function listar_contatos($novos = NULL)
    {
        $sql = "SELECT * FROM tb_contato";
        
               if($novos == 1)
               {
                   $sql .= " WHERE CD_STATUS = 0";
               }
        
               $sql .= " ORDER BY DT_CONTATO DESC, HR_CONTATO DESC, CD_STATUS ASC";
        
               //SELECIONA OS NEWSLETTERS:
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return FALSE;
        }
    }

    /**
    * Função que carrega os ultimos contatos do banco.
    * @access public
    * @return void
    */
    function listar_ultimos_contatos($qtd = 10)
    {
    	$sql = "SELECT * FROM tb_contato ORDER BY DT_CONTATO DESC, HR_CONTATO DESC, CD_STATUS DESC LIMIT {$qtd}";

        //SELECIONA OS NEWSLETTERS:
    	$query = $this->db->query($sql);
    	
    	if($query->num_rows() > 0)
    	{
    		return $query;
    	}
    	else
    	{
    		return FALSE;
    	}
    }
    
    /**
    * Função que busca e lista os contatos do banco.
    * @access public
    * @return void
    */
    function listar_resultado_busca($busca)
    {
    	$sql = "SELECT * FROM tb_contato
                WHERE PK_CONTATO LIKE '%$busca%'
                OR NM_NOME LIKE '%$busca%'
                OR NM_TELEFONE LIKE '%$busca%'
                OR NM_MENSAGEM LIKE '%$busca%'
                OR DT_CONTATO LIKE '%$busca%'
                OR HR_CONTATO LIKE '%$busca%'
                ORDER BY DT_CONTATO DESC, HR_CONTATO DESC, CD_STATUS ASC";
    	
    	//SELECIONA OS NEWSLETTERS:
    	$query = $this->db->query($sql);
    	
    	if($query->num_rows() > 0)
    	{
    		return $query;
    	}
    	else
    	{
    		return FALSE;
    	}
    }


    
}