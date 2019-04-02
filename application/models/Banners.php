<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Esta classe é a responsável pelos Banners.
* @author Paulo Sobral <paulo@plataformanet.com.br>
* @version 0.1
* @copyright Copyright © 2012, Penumake Compressores de AR Ltda.
* @access public
* @package CI_Model
* @subpackage Banner
*/

class Banners extends CI_Model 
{
    /**
    * Variável recebe o id do banner.
    * @access public
    * @name $id_banner
    */
    var $id_banner;
    
    /**
    * Variável recebe o arquivo.
    * @access public
    * @name $arquivo
    */
    var $arquivo;
	
    /**
    * Variável recebe a legenda do banner.
    * @access public
    * @name $legenda
    */
    var $legenda;
	
    /**
    * Variável recebe o link do banner".
    * @access public
    * @name $link
    */
    var $link;

    /**
    * Variável recebe a quantidade de banners
    * @access public
    * @name $qtd_banners
    */
    var $qtd_banners;
  
    /**
     * Variável recebe a ordem do banner.
     * @access public
     * @name $ordem
     */
    var $ordem;
	
	/**
     * Variável recebe a extenção do arquivo.
     * @access public
     * @name $extencao
     */
    var $extencao;
	
    /**
    * Variável recebe o ativo do banner.
    * @access public
    * @name $ativo
    */
    var $ativo;
	
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
    * Função que cadastra o banner no banco.
    * @access public
    * @param $array_banner: Array contendo as informações do banner.
    * @return TRUE caso query OK
    * @return FALSE caso query com erro
    */
    function cadastrar_banner($array_banner)
    {
        //RESGATA OS VALORES:
        $this->arquivo = $array_banner['arquivo'];
        $this->legenda = $array_banner['legenda'];
        $this->titulo = $array_banner['titulo'];
        $this->link = $array_banner['link'];
        $this->ativo = $array_banner['ativo'];
        $this->ordem = $array_banner['ordem'];
        $this->extencao = $array_banner['extencao'];
		
        if($this->legenda == NULL)
        {
          $this->legenda = "";
        }
        
        if($this->link == NULL)
        {
          $this->link = "#";
        }
        
        //CADASTRA A CATEGORIA NO BANCO:
        if($this->db->query("INSERT INTO tb_banner (ARQUIVO, NM_LEGENDA, TITULO, NM_LINK, CD_STATUS, VL_ORDEM, TIPO_ARQUIVO) VALUES ('$this->arquivo', '$this->legenda', '$this->titulo', '$this->link', '$this->ativo', '$this->ordem', '$this->extencao')"))
        {
          return TRUE;  
        }
        else
        {
          return FALSE;  
        }
    }
	
    /**
    * Função que atualiza o banner no banco.
    * @access public
    * @param $array_banner: Array contendo as informações do banner.
    * @return TRUE caso query OK
    * @return FALSE caso query com erro
    */
    function atualizar_banner($array_banner)
    {
       //RECEBE OS PARAMETROS:
       $this->ativo =  $array_banner['ativo'];
       $this->link =  $array_banner['link'];
       $this->legenda =  $array_banner['legenda'];
       $this->titulo =  $array_banner['titulo'];
       $this->id_banner =  $array_banner['id_banner'];
       $this->ordem = $array_banner['ordem'];
	   
	   if(isset($array_banner['arquivo']))
	   {
		   $this->arquivo =  $array_banner['arquivo'];
	   }
	   
	   if(isset($array_banner['extencao']))
	   {
	   		$this->extencao = $array_banner['extencao'];
	   }
	   
       if($this->link == NULL)
       {
          $this->link = "#";
       }
       
       if($this->arquivo == NULL || $this->extencao == NULL)
	   {
		   $sql = "UPDATE tb_banner SET NM_LEGENDA = '$this->legenda', TITULO = '$this->titulo', NM_LINK = '$this->link', CD_STATUS = '$this->ativo', VL_ORDEM = '$this->ordem' WHERE PK_BANNER = '$this->id_banner'";
	   }
	   else
	   {
		   $sql = "UPDATE tb_banner SET ARQUIVO = '$this->arquivo', NM_LEGENDA = '$this->legenda', TITULO = '$this->titulo', NM_LINK = '$this->link', CD_STATUS = '$this->ativo', VL_ORDEM = '$this->ordem', TIPO_ARQUIVO = '$this->extencao' WHERE PK_BANNER = '$this->id_banner'";
	   }
	   
	   //ATUALIZA O BANNER NO BANCO:
           
       if($this->db->query($sql))
       {
          return TRUE;  
       }
       else
       {
          return FALSE;  
       }
    }
	
    /**
    * Função que exclui o banner no banco.
    * @access public
    * @param $id_banner: Id do banner a excluir.
    * @return void
    */
    function excluir_banner($id_banner)
    {
       $this->id_banner = $id_banner;
       
       //EXCLUI A CATEGORIA NO BANCO:
       $query = $this->db->query("DELETE FROM tb_banner WHERE PK_BANNER = '$this->id_banner'");   
    }
	
    /**
    * Função que lista os banners do banco na adm.
    * @access public
    * @return $query caso query OK
    * @return FALSE caso query com erro
    */
    function listar_banners_adm($desativados = FALSE)
    {
       $sql = "SELECT * FROM tb_banner ";
        
        //CASO A VAR DESATIVADOS FOR TRUE MOSTRA TODOS OS ITENS:
        if($desativados == TRUE)
        {
           $sql .= "WHERE ATIVO = TRUE ";
        }
        
        $sql .="GROUP BY ARQUIVO ORDER BY PK_BANNER";
        
        //SELECIONA AS CATEGORIAS ATIVAS DO BANCO:
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
    * Função que lista os banners do banco na área pública.
    * @access public
    * @return $query
    * @return FALSE caso query com erro
    */
    function listar_banners_site()
    {
       $sql = "SELECT * FROM tb_banner WHERE CD_STATUS = 1 ORDER BY RAND() LIMIT 1";
       
	   //REALIZA UMA QUERY PARA SORTEAR O TIPO DE BANNER:
       $query = $this->db->query($sql);   
        
	   //CASO EXISTA PELO MENOS 1 BANNER:
	   if($query->num_rows() > 0)
	   {
		  $linha = $query->row();
		  
		  //SE O BANNER SORTEADA FOR UM FLASH, JÁ RETORNA A QUERY COM AS INFORMAÇÕES:
		  if($linha->TIPO_ARQUIVO == '.swf')
		  {
			  return $query;
		  }
		  else //SE O SORTEADO NÃO FOR FLASH, É UMA IMAGEM, ENTÃO PEGAMOS TODAS AS IMAGENS:
		  {
			  $sql2 = "SELECT * FROM tb_banner WHERE TIPO_ARQUIVO <> '.swf' AND CD_STATUS = 1 ORDER BY VL_ORDEM";
       		  $query2 = $this->db->query($sql2);
			  return $query2;
		  }
	   }
	   else //SE NÃO EXISTIR NENHU BANNER RETORNA FALSE:
	   {
		  return FALSE; 
	   } 
	}
    
    /**
    * Função que carrega somente um banner do banco.
    * @access public
    * @param $id_banner: Id do banner a carregar.
    * @return $query: Retorna o recordset da consulta.
    * @return FALSE: Caso nenhuma linha encontrada.
    */
    function carregar_banner($id_banner)
    {
        //SELECIONA A CATEGORIA ATIVA DO BANCO:
        $query = $this->db->query("SELECT * FROM tb_banner WHERE PK_BANNER = '$id_banner' LIMIT 1");   
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $linha)
            {
               $this->id_banner = $linha->PK_BANNER;
               $this->arquivo = $linha->ARQUIVO;
               $this->link = $linha->NM_LINK;
               $this->legenda = $linha->NM_LEGENDA;
               $this->titulo = $linha->TITULO;
               $this->ativo = $linha->CD_STATUS;
			         $this->ordem = $linha->VL_ORDEM;
            }
        }
        else
        {
           return FALSE; 
        }
    }

  /**
    * Função que muda o status do banner no banco.
    * @access public
    * @param $id_banner: Id da subcategoria a excluir.
    * @return TRUE: Caso query OK
    * @return FALSE: Caso algum erro.
    */
    function mudar_status_banner($id_banner)
    {
        $this->id_banner = $id_banner;

        // QUERY QUE INVERTE O VALOR DO CAMPO STATUS
        $consulta = "UPDATE tb_banner SET CD_STATUS = NOT CD_STATUS WHERE PK_BANNER = '$this->id_banner'";
        
        //EXCLUI A subcategoria NO BANCO:
        $query = $this->db->simple_query($consulta);


        if($query == TRUE)
        {
            return "TRUE";
        }
        else
        {
            return "FALSE";
        }
    }

  /**
   * Função que conta as categoria no banco.
   * @access public
   */
  function contar_banners()
  {
    $query = $this->db->query('SELECT COUNT(PK_BANNER) as QTD FROM tb_banner LIMIT 1');
    $linha = $query->row(0);
    $this->qtd_banners = $linha->QTD;
  }
	
}