<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Esta classe é a responsável pela galeria dos Produtos.
 * @author Paulo Sobral <paulo@plataformanet.com.br>
 * @version 0.1
 * @copyright Copyright © 2012, Lojas Kamikawa.
 * @access public
 * @package CI_Model
 * @subpackage Galerias
 */

class Pdf extends CI_Model {

	/**
	 * Variável recebe o id da galeria.
	 * @access public
	 * @name $id_galeria
	 */
	var $id_pdf;
	
              /**
	 * Variável recebe o id do produto.
	 * @access public
	 * @name $id_produto
	 */
              var $produto;
        
	/**
	 * Variável recebe a imagem da galeria.
	 * @access public
	 * @name $imagem
	 */
	var $pdf;
              
              /**
	 * Variável recebe o ativo.
	 * @access public
	 * @name $ativo
	 */
              var $ativo;
	
	
	function __construct()
                {
                    // Call the Model constructor
                    parent::__construct();

                }

            /**
            * Função que cadastra imagens da galeria no banco.
            * @access public
            * @param $array_produto: Array contendo as informações do produto.
            * @return TRUE: Caso cadastro OK
            * @return FALSE: Caso algum erro.
            */
            function cadastrar_pdf($array_pdf)
            {
                   $this->produto = $array_pdf['id_produto'];
                   $this->ativo = $array_pdf['ativo'];

                   ($this->ativo == 1)?($this->ativo = 1):($this->ativo = 0);

                   
                   $this->pdf = $array_pdf['arquivo'];
                        

                /*$query = $this->db->query("INSERT INTO tb_galeria_produto(FK_PRODUTO,NM_LEGENDA, NM_IMAGEM,NM_ATIVO) VALUES ('$this->produto','$this->legenda', '$this->imagem','$this->ativo')");*/


                        $sql = "INSERT INTO tb_pdf(FK_PRODUTO,PDF,NM_ATIVO) VALUES ('$this->produto', '$this->pdf','$this->ativo')";

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

                    function atualizar_pdf($array_pdf)
                        {
                            //RESGATA OS VALORES:
                            $this->id_pdf = $array_pdf['id_pdf'];
                            $this->produto = $array_pdf['id_produto'];
                            $this->ativo = $array_pdf['ativo'];


                            //TRATA O NOME DA subcategoria PARA SER URL:
                            /*$this->load->helper('tratar_url');
                            $this->link = tratar_url($this->subproduto);*/


                            $sql = "UPDATE tb_pdf SET ";

                          
                            //VERIFICA ID_PRODUTO:
                            if($array_pdf['id_produto'] != NULL)
                                {
                                    $this->produto = $array_pdf['id_pdf'];
                                    $sql .= "FK_PRODUTO = '$this->produto',";
                                }

                            //VERIFICA IMAGEM:
                            if($array_pdf['arquivo'] != NULL)
                            {
                                $this->pdf = $array_pdf['arquivo'];
                                $sql .= "PDF = '$this->pdf',";
                            }

                            $sql .="NM_ATIVO = '$this->ativo'
                            WHERE PK_PDF = '$this->id_pdf'";

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
            * Função que exclui uma imagem da galeria no banco.
            * @access public
            * @param $id_categoria: Id da categoria a excluir.
            * @return void
            */
            function excluir_pdf($id_pdf)
            {
                $this->id_pdf = $id_pdf;

                    $query = $this->db->query("DELETE FROM tb_pdf WHERE PK_PDF = '$this->id_pdf'");
            }

                /**
            * Função que carrega imagens da galeria do banco.
            * @access public
            * @param $id_produto: Id do produto a carregar.
            * @return $query: Retorna o recordset da consulta.
            * @return FALSE: Caso nenhuma linha encontrada.
            */
            function carregar_pdf($id_produto)
            {
                $sql = "SELECT * FROM tb_pdf WHERE FK_PRODUTO = '$id_produto'";

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

            function carregar_pdf_site($id_produto,$desativados = FALSE)
            {
                $sql = "SELECT * FROM tb_pdf "; 

                    if($desativados == TRUE)
                    {
                        $sql .= "WHERE NM_ATIVO = 1 AND "; 
                    }

                    $sql .="FK_PRODUTO = '$id_produto'";

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



            function carregar_pdf_adm($id_pdf)
            {
                $sql = "SELECT * FROM tb_pdf WHERE PK_PDF = '$id_pdf'";

                $query = $this->db->query($sql);

                if($query->num_rows() > 0)
                {
                            $linha = $query->row();
                            $this->id_pdf = $linha->PK_PDF;
                            $this->produto = $linha->FK_PRODUTO;
                            $this->ativo = $linha->NM_ATIVO;
                            $this->pdf = $linha->PDF;

                    }
                else
                {
                        return FALSE;
                }
            }
    
}