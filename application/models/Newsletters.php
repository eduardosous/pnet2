<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Esta classe é a responsável pelas Newsletters.
* @author Paulo Sobral <paulo@plataformanet.com.br>
* @version 0.1
* @copyright Copyright © 2012, Penumake Compressores de AR Ltda.
* @access public
* @package CI_Model
* @subpackage Newsletters
*/

class Newsletters extends CI_Model 
{
    /**
    * Variável recebe o id da newsletter.
    * @access public
    * @name $id_newsletter
    */
    var $id_newsletter;
    
    /**
    * Variável recebe o nome da newslleter.
    * @access public
    * @name $nome
    */
    var $nome;
	
    /**
    * Variável recebe o email da newsletter.
    * @access public
    * @name $email
    */
    var $email;
    
    /**
     * Variável recebe a data da newsletter.
     * @access public
     * @name $data_newsletter
     */
    var $data_newsletter;
    
    /**
     * Variável recebe a hora da newsletter.
     * @access public
     * @name $hora_newsletter
     */
    var $hora_newsletter;
    
    /**
     * Variável recebe o layout de um arquivo CSV das newsletters.
     * @access public
     * @name $hora_newsletter
     */
    var $csv;
	
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
    * @param $nome: Nome do usuário.
    * @param $email: Email do usuário.
    * @return FALSE caso algum erro.
	* @return TRUE caso ok.
    */
    function cadastrar_newsletter($newsletter)
    {
    	$this->nome = $newsletter['nome'];
    	$this->email = $newsletter['email'];
    	
		if($this->verifica_newsletter_repetido($this->email) == TRUE)
		{
			$this->excluir_newsletter(NULL,$this->email);
			return FALSE;
		}
		else
		{
			//INSERE A NEWSLETTER NO BANCO:
    		$query = $this->db->simple_query("INSERT INTO tb_newsletter (NM_NOME, NM_EMAIL, DT_NEWSLETTER, HR_NEWSLETTER) VALUES ('$this->nome', '$this->email', CURDATE(), CURTIME())");
			return $query;
		}
	}
	
    /**
    * Função que exclui a newsletter no banco.
    * @access public
    * @param $id_newsletter: Id da newsletter a excluir.
    * @return void
    */
    function excluir_newsletter($id_newsletter = NULL,$email = NULL)
    {
    	$this->id_newsletter = $id_newsletter;
    	$this->email = $email;
		
		//SE NÃO EXISTIR INFORMAÇÃO DO ID, PASSA O E-MAIL: 
		if($id_newsletter != NULL)
		{
			$sql = "DELETE FROM tb_newsletter WHERE PK_NEWSLETTER = '$this->id_newsletter'";
		}
		else
		{
			$sql = "DELETE FROM tb_newsletter WHERE NM_EMAIL = '$this->email'";
		}
    	
		//EXCLUI A NEWSLETTER NO BANCO:
    	$query = $this->db->query($sql);
    }
	
    /**
    * Função que carrega todas as newsletters do banco.
    * @access public
    * @return void
    */
    function listar_newsletters()
    {
    	$sql = "SELECT * FROM tb_newsletter ORDER BY NM_NOME";
    	
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
     * Função que gera o layout de um arquivo csv com as newsletters cadastradas no banco.
     * @access public
     * @return $csv layout p/ arquivo CSV
     */
    function gera_csv_newsletters()
    {
    	$this->load->dbutil();
    	
    	$query = $this->db->query("SELECT PK_NEWSLETTER, NM_NOME, NM_EMAIL, DATE_FORMAT(DT_NEWSLETTER,'%d/%m/%Y'), HR_NEWSLETTER FROM tb_newsletter");
    	
    	$this->csv = $this->dbutil->csv_from_result($query, ';');
    	
    	//TRATA AS COLUNAS:
    	$this->csv = str_replace('PK_NEWSLETTER','ID',$this->csv);
    	$this->csv = str_replace('NM_NOME','NOME',$this->csv);
    	$this->csv = str_replace('NM_EMAIL','E-MAIL',$this->csv);
    	$this->csv = str_replace("DATE_FORMAT(DT_NEWSLETTER,'%d/%m/%Y')",'DATA',$this->csv);
    	$this->csv = str_replace('HR_NEWSLETTER','HORA',$this->csv);
    }
	
	/**
    * Função que verifique se já existe o newsletter mencionado no banco.
    * @access public
    * @param $email: Email da newsletters.
    * @return FALSE caso nenhum item repetido
    * @return TRUE caso algum item repetido
    */
    function verifica_newsletter_repetido($email)
    {
        $sql = "SELECT COUNT(PK_NEWSLETTER) AS QNTD FROM tb_newsletter WHERE NM_EMAIL = '$email' LIMIT 1";

        $query = $this->db->query($sql);
        $linha = $query->row_array(0);

        if($linha['QNTD'] <= 0)
        {
           return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}