<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Esta classe é a responsável pelas ategorias.
* @author Paulo Sobral <paulo@plataformanet.com.br>
* @version 0.1
* @copyright Copyright © 2012, Penumake Compressores de AR Ltda.
* @access public
* @package CI_Model
* @subpackage Categorias
*/

class Categorias extends CI_Model 
{
    /**
    * Variável recebe o id da categoria.
    * @access public
    * @name $id_categoria
    */
    var $id_categoria;
    
    /**
    * Variável recebe o nome da categoria.
    * @access public
    * @name $categoria
    */
    var $categoria;
	
    /**
    * Variável recebe o link da categoria.
    * @access public
    * @name $link
    */
    var $link;
	
    /**
    * Variável recebe o ativo da categoria.
    * @access public
    * @name $ativo
    */
    var $ativo;

    /**
    * Variável recebe o valor da propriedade unica.
    * @access public
    * @name $unica
    */
    var $unica;
	
    /**
        * Variável recebe a quantidade de categorias
        * @access public
        * @name $qtd_categorias
        */
    var $qtd_categorias;
	
    /**
     * Variável recebe a $ordem da categoria.
     * @access public
     * @name $ordem
     */
    var $ordem;

    /**
     * Variável recebe o meta titulo
     * @access public
     * @name $meta_titulo
     */
    var $meta_titulo;

    /**
     * Variável recebe as meta palavras chaves
     * @access public
     * @name $meta_palavras
     */
    var $meta_palavras;

    /**
     * Variável recebe o meta titulo
     * @access public
     * @name $meta_descricao
     */
    var $meta_descricao;

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
    * Função que cadastra a categoria no banco.
    * @access public
    * @param $array_categoria: Array contendo as informações da categoria.
    * @return TRUE: Caso cadastro OK
    * @return FALSE: Caso algum erro.
    */
    function cadastrar_categoria($array_categoria)
    {
        //RESGATA OS VALORES:
        $this->categoria = $array_categoria['categoria'];
        $this->ativo = $array_categoria['ativo'];
        $this->unica = $array_categoria['unica'];
        $this->ordem = $array_categoria['ordem'];
        $this->meta_titulo = $array_categoria['meta_titulo'];
        $this->meta_palavras = $array_categoria['meta_palavras'];
        $this->meta_descricao = $array_categoria['meta_descricao'];
        
        //TRATA O NOME DA CATEGORIA PARA SER URL:
        $this->load->helper('tratar_url');
        $this->link = tratar_url($this->categoria);
        ($this->ativo == 1)?($this->ativo = 1):($this->ativo = 0);
        
        if($this->verifica_categoria_repetido($this->link) == FALSE)
        {
            //CADASTRA A CATEGORIA NO BANCO:
            if($this->db->simple_query("INSERT INTO tb_categoria (NM_CATEGORIA, NM_LINK, UNICA, CD_STATUS, VL_ORDEM, META_TITULO, META_PALAVRAS, META_DESCRICAO) VALUES ('$this->categoria', '$this->link', '$this->unica', '$this->ativo', '$this->ordem', '$this->meta_titulo', '$this->meta_palavras', '$this->meta_descricao')"))
            {
              return TRUE;  
            }
            else
            {
              return FALSE;  
            }
        }
        else
        {
             return FALSE;
        }
    }
	
    /**
    * Função que verifique se já existe a categoria mencionado no banco.
    * @access public
    * @param $link: Link da subcategoria.
    * @return FALSE caso nehum item repetido
    * @return TRUE caso algum item repetido
    */
    function verifica_categoria_repetido($link)
    {
        $sql = "SELECT COUNT(PK_CATEGORIA) AS QNTD FROM tb_categoria WHERE NM_LINK = '$link' LIMIT 1";

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

    /**
    * Função que atualiza a categoria no banco.
    * @access public
    * @param $array_categoria: Array contendo as informações da categoria.
    * @return void
    */
    function atualizar_categoria($array_categoria)
    {
        //RESGATA OS VALORES:
        $this->id_categoria = $array_categoria['id_categoria'];
        $this->categoria = $array_categoria['categoria'];
        $this->unica = $array_categoria['unica'];
        $this->ativo = $array_categoria['ativo'];
        $this->ordem = $array_categoria['ordem'];
        $this->meta_titulo = $array_categoria['meta_titulo'];
        $this->meta_palavras = $array_categoria['meta_palavras'];
        $this->meta_descricao = $array_categoria['meta_descricao'];
        
        //TRATA O NOME DA CATEGORIA PARA SER URL:
        $this->load->helper('tratar_url');
        $this->link = tratar_url($this->categoria);
        
        //ATUALIZA A CATEGORIA NO BANCO:
        $query = $this->db->query("UPDATE tb_categoria SET 
            NM_CATEGORIA = '$this->categoria', 
            NM_LINK = '$this->link', 
            UNICA = '$this->unica', 
            CD_STATUS = '$this->ativo', 
            VL_ORDEM = '$this->ordem', 
            META_TITULO = '$this->meta_titulo',
            META_PALAVRAS = '$this->meta_palavras',
            META_DESCRICAO = '$this->meta_descricao'
            WHERE PK_CATEGORIA = '$this->id_categoria'"); 
    }
	
    /**
    * Função que exclui a categoria no banco.
    * @access public
    * @param $id_categoria: Id da categoria a excluir.
    * @return TRUE: Caso query OK
    * @return FALSE: Caso algum erro.
    */
    function excluir_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
        
        //EXCLUI A CATEGORIA NO BANCO:
        $query = $this->db->simple_query("DELETE FROM tb_categoria WHERE PK_CATEGORIA = '$this->id_categoria'");
        
        if($query == TRUE)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }

    /**
    * Função que muda o status a categoria no banco.
    * @access public
    * @param $id_categoria: Id da subcategoria a excluir.
    * @return TRUE: Caso query OK
    * @return FALSE: Caso algum erro.
    */
    function mudar_status_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

        // QUERY QUE INVERTE O VALOR DO CAMPO STATUS
        $consulta = "UPDATE tb_categoria SET CD_STATUS = NOT CD_STATUS WHERE PK_CATEGORIA = '$this->id_categoria'";
        
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
    * Função que carrega toda as categorias ativas do banco.
    * @access public
    * @param $desativados: Caso esteja FALSE (default) mostra apenas as categorias ativadas, se não mostra tudo.  
    * @return $query: Retorna o recordset da consulta.
    * @return FALSE: Caso nenhuma linha encontrada.
    */
    function listar_categorias($desativados = FALSE)
    {
        
        $sql = "SELECT * FROM tb_categoria ";
        
        //CASO A VAR DESATIVADOS FOR TRUE MOSTRA TODOS OS ITENS:
        if($desativados == TRUE)
        {
           $sql .= "WHERE CD_STATUS = 1 ";
        }
        
        $sql .="GROUP BY NM_LINK ORDER BY NM_CATEGORIA ASC";
        
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
    * Função que carrega somente uma categoria do banco.
    * @access public
    * @param $id_categoria: Id da categoria a carregar.
    * @return $query: Retorna o recordset da consulta.
    * @return FALSE: Caso nenhuma linha encontrada.
    */
    function carregar_categoria($id_categoria)
    {
        //SELECIONA AS CATEGORIAS ATIVAS DO BANCO:
        $query = $this->db->query("SELECT * FROM tb_categoria WHERE PK_CATEGORIA = '$id_categoria' LIMIT 1");   
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $linha)
            {
                $this->id_categoria = $linha->PK_CATEGORIA;
                $this->categoria = $linha->NM_CATEGORIA;
                $this->link = $linha->NM_LINK;
                $this->unica = $linha->UNICA;
                $this->ativo = $linha->CD_STATUS;
                $this->ordem = $linha->VL_ORDEM;
                $this->meta_titulo = $linha->META_TITULO;
                $this->meta_palavras = $linha->META_PALAVRAS;
                $this->meta_descricao = $linha->META_DESCRICAO;
            }
        }
        else
        {
           return FALSE; 
        }
    }
    
    /**
    * Função que carrega somente uma categoria do banco pelo link.
    * @access public
    * @param $categoria: link da categoria a carregar.
    * @return $query: Retorna o recordset da consulta.
    * @return FALSE: Caso nenhuma linha encontrada.
    */
    function carregar_categoria_link($categoria)
    {
        //SELECIONA AS CATEGORIAS ATIVAS DO BANCO:
        $query = $this->db->query("SELECT * FROM tb_categoria WHERE NM_LINK = '$categoria' LIMIT 1");   
        
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $linha)
            {
                $this->id_categoria = $linha->PK_CATEGORIA;
                $this->categoria = $linha->NM_CATEGORIA;
                $this->link = $linha->NM_LINK;
                $this->unica = $linha->UNICA;
                $this->ativo = $linha->CD_STATUS;
                $this->ordem = $linha->VL_ORDEM;
                $this->meta_titulo = $linha->META_TITULO;
                $this->meta_palavras = $linha->META_PALAVRAS;
                $this->meta_descricao = $linha->META_DESCRICAO;
            }
        }
        else
        {
           return FALSE; 
        }
    }
	
    /**
     * Função que conta as categoria no banco.
     * @access public
    */
    function contar_categorias()
    {
            $query = $this->db->query('SELECT COUNT(PK_CATEGORIA) as QTD FROM tb_categoria LIMIT 1');
            $linha = $query->row(0);
            $this->qtd_categorias = $linha->QTD;
    }
}