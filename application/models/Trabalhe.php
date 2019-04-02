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

class Trabalhe extends CI_Model 
{
    /**
    * Variável recebe o id do contato.
    * @access public
    * @name $id_contato
    */
    var $id_trabalhe;
    
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
    * Variável recebe o arquivo.
    * @access public
    * @name $arquivo
    */
    var $arquivo;
	
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
    function cadastrar_trabalhe_conosco($array_trabalhe)
    {
              $this->nome = $array_trabalhe['nome'];
              $this->email = $array_trabalhe['email'];
              $this->telefone = $array_trabalhe['telefone'];
              $this->mensagem = $array_trabalhe['mensagem'];     
              $this->arquivo = $array_trabalhe['arquivo'];
              
    	//INSERE O CONTATO NO BANCO:    
              $sql = "INSERT INTO tb_trabalhe_conosco (NM_NOME, NM_EMAIL, NU_TELEFONE, NM_MENSAGEM, ARQUIVO, DT_CONTATO, HR_CONTATO) VALUES ('$this->nome', '$this->email', '$this->telefone', '$this->mensagem','$this->arquivo', CURDATE(), CURTIME())";
        
              //print $sql;
              
             if($this->db->simple_query($sql))
                            {
                                return TRUE;
                            }
                            else
                            {
                                return FALSE;
                            }
    }       
	
    /**
    * Função que exclui o contato no banco.
    * @access public
    * @param $id_contato: Id do contato a excluir.
    * @return void
    */
    function excluir_trabalhe($id_trabalhe)
    {
    	$this->id_trabalhe = $id_trabalhe;
    	
    	//EXCLUI O CONTATO NO BANCO:
    	$query = $this->db->simple_query("DELETE FROM tb_trabalhe_conosco WHERE PK_TRABALHE = '$this->id_trabalhe'");
               return $query;
    }
	
    /**
    * Função que carrega todas os contatos do banco.
    * @access public
    * @param $id_contato: Id do contato a carregar.
    * @return TRUE caso OK;
    * @return FALSE caso erro;
    */
    function carregar_trabalhe($id_trabalhe)
    {
              $this->id_trabalhe = $id_trabalhe;
              $sql = "SELECT * FROM tb_trabalhe_conosco WHERE PK_TRABALHE = '$this->id_trabalhe' LIMIT 1";
    	
    	//SELECIONA OS NEWSLETTERS:
    	$query = $this->db->query($sql);
    	
    	if($query->num_rows() > 0)
    	{
                    //ATUALIZA STATUS DO CONTATO:
                    $this->db->simple_query("UPDATE tb_trabalhe_conosco SET CD_STATUS = 1 WHERE PK_TRABALHE = '$this->id_trabalhe'");
                    $linha = $query->row();
                    
                    $this->id_trabalhe = $linha->PK_TRABALHE;
                    $this->nome = $linha->NM_NOME;
                    $this->email = $linha->NM_EMAIL;
                    $this->telefone = $linha->NU_TELEFONE;
                    $this->mensagem = $linha->NM_MENSAGEM;
                    $this->data_contato = $linha->DT_CONTATO;
                    $this->hora_contato = $linha->HR_CONTATO;
                    $this->arquivo = $linha->ARQUIVO;
                    
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
    function listar_trabalhe($novos = NULL)
    {
    	$sql = "SELECT * FROM tb_trabalhe_conosco";
    	
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
    * Função que busca e lista os contatos do banco.
    * @access public
    * @return void
    */
    function listar_resultado_busca($busca)
    {
    	$sql = "SELECT * FROM tb_trabalhe_conosco
                WHERE PK_TRABALHE LIKE '%$busca%'
                OR NM_NOME LIKE '%$busca%'
                OR NU_TELEFONE LIKE '%$busca%'
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
    
    function enviar_trabalhe($array_trabalhe,$arquivo)
    {
        //RESGATA OS VALORES:
        $this->nome = $array_trabalhe['nome'];
        $this->telefone = $array_trabalhe['telefone'];
        $this->email_from = $array_trabalhe['email'];
        $this->mensagem = $array_trabalhe['mensagem'];
        
        //print_r($arquivo);
    
        //Assunto
        $assunto = "Trabalhe Conosco";

        //Destino
        $email = "eduardo@plataformanet.com.br";

        //formato o campo da mensagem
        $mensagem = wordwrap( $this->mensagem, 50, "<br>", 1);

       
        $arquivo = isset($arquivo) ? $arquivo : FALSE;
        //print filesize($arquivo["tmp_name"]);

        if(file_exists($arquivo["tmp_name"]) and !empty($arquivo))
        {

        $fp = fopen($arquivo["tmp_name"],"rb");
        $anexo = fread($fp,filesize($arquivo["tmp_name"]));
        $anexo = base64_encode($anexo);

        fclose($fp);

        $anexo = chunk_split($anexo);

        $boundary = "XYZ-" . date("dmYis") . "-ZYX";

        $mens = "--$boundary\n";
        $mens .= "Content-Transfer-Encoding: 8bits\n";
        $mens .= "Content-Type: text/html; charset=\"utf-8\"\n\n"; //plain
        $mens .= "$this->nome \n";
        $mens .= "$this->telefone \n";
        $mens .= "$this->email_from \n";   
        $mens .= "$mensagem\n";
        $mens .= "--$boundary\n";
        $mens .= "Content-Type: ".$arquivo["type"]."\n";
        $mens .= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"\n";
        $mens .= "Content-Transfer-Encoding: base64\n\n";
        $mens .= "$anexo\n";
        $mens .= "--$boundary--\r\n";

        $headers = "MIME-Version: 1.0\n";
        $headers .= "From: \"$this->nome\" <$this->email_from>\r\n";
        $headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";
        $headers .= "$boundary\n";

        //envio o email com o anexo
        mail($email,$assunto,$mens,$headers);

        //header("location:contato2.php");

         //Após Enviar e-mail
        echo "<script type=\"text/javascript\">
                window.alert('Dados enviados com Sucesso!!');
                window.location.href=\"home\";
            </script>";

        }

        //se não tiver anexo
        else
        {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: \"$this->nome\" <$this->email_from>\r\n";

         mail ($email,"Trabalhe Conosco - ","Dados Cadastrados: \n".
         "\n NOME: ". $this->nome.
         "\n TELEFONE: ". $this->telefone.
         "\n E-MAIL: ". $this->email_from.
         "\n ------------------------------------------------------------------------------".
         "\n MENSAGEM: ". $mensagem,
      
     $headers ) ;   

             //Após Enviar e-mail
             echo "<script type=\"text/javascript\">
                            window.alert('Dados enviados com Sucesso!!');
                            window.location.href=\"home\";
                       </script>";
                
                
          }
     }
     
}