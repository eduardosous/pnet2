<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Esta classe é a responsável pelas ategorias.
* @author Paulo Sobral <paulo@plataformanet.com.br>
* @version 0.1
* @copyright Copyright © 2012, Penumake Compressores de AR Ltda.
* @access public
* @package CI_Model
* @subpackage subcategorias
*/

class Subcategorias extends CI_Model 
{
    /**
    * Variável recebe o objeto categoria.
    * @access public
    * @name $id_subcategoria
    */
    var $categoria;
    
    /**
    * Variável recebe o id da subcategoria.
    * @access public
    * @name $id_subcategoria
    */
    var $id_subcategoria;
    
    /**
    * Variável recebe o nome da subcategoria.
    * @access public
    * @name $subcategoria
    */
    var $subcategoria;
	
    /**
    * Variável recebe o link da subcategoria.
    * @access public
    * @name $link
    */
    var $link;
	
    /**
    * Variável recebe o ativo da subcategoria.
    * @access public
    * @name $ativo
    */
    var $ativo;

    /**
     * Variável recebe a quantidade de subcategorias
     * @access public
     * @name $qtd_subcategorias
     */
    var $qtd_subcategorias;

    /**
     * Variável recebe a $ordem da subcategoria.
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
    * Função que cadastra a subcategoria no banco.
    * @access public
    * @param $array_subcategoria: Array contendo as informações da subcategoria.
    * @return void
    */
    function cadastrar_subcategoria($array_subcategoria)
    {
        //RESGATA OS VALORES:
        $this->categoria = $array_subcategoria['categoria'];
        $this->subcategoria = $array_subcategoria['subcategoria'];
        $this->ativo = $array_subcategoria['ativo'];
        $this->ordem = $array_subcategoria['ordem'];
        $this->meta_titulo = $array_subcategoria['meta_titulo'];
        $this->meta_palavras = $array_subcategoria['meta_palavras'];
        $this->meta_descricao = $array_subcategoria['meta_descricao'];
        
        //TRATA O NOME DA subcategoria PARA SER URL:
        $this->load->helper('tratar_url');
        $this->link = tratar_url($this->subcategoria);
        
        if($this->verifica_subcategoria_repetido($this->categoria,$this->link) == FALSE)
        {
            //CADASTRA A subcategoria NO BANCO:
            $query = $this->db->query("INSERT INTO tb_subcategoria (FK_CATEGORIA, NM_SUBCATEGORIA, NM_LINK, CD_STATUS, META_TITULO, META_PALAVRAS, META_DESCRICAO) VALUES ('$this->categoria->id_categoria','$this->subcategoria', '$this->link', '$this->ativo', '$this->meta_titulo', '$this->meta_palavras', '$this->meta_descricao')");

            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
    /**
    * Função que verifique se já existe a subcategoria mencionado no banco.
    * @access public
    * @param $categoria: Categoria do produto.
    * @param $link: Link do Produto.
    * @return FALSE caso nehum item repetido
    * @return TRUE caso nehum item repetido
    */
    function verifica_subcategoria_repetido($categoria, $link)
    {
        $sql = "SELECT COUNT(PK_SUBCATEGORIA) AS QNTD FROM tb_subcategoria WHERE FK_CATEGORIA = '$categoria' AND NM_LINK = '$link'";

        $sql .= " LIMIT 1";

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
    * Função que atualiza a subcategoria no banco.
    * @access public
    * @param $array_subcategoria: Array contendo as informações da subcategoria.
    * @return void
    */
    function atualizar_subcategoria($array_subcategoria)
    {
        //RESGATA OS VALORES:
        $this->categoria = $array_subcategoria['categoria'];
        $this->id_subcategoria = $array_subcategoria['id_subcategoria'];
        $this->subcategoria = $array_subcategoria['subcategoria'];
        $this->ativo = $array_subcategoria['ativo'];
        $this->meta_titulo = $array_subcategoria['meta_titulo'];
        $this->meta_palavras = $array_subcategoria['meta_palavras'];
        $this->meta_descricao = $array_subcategoria['meta_descricao'];
        
        //TRATA O NOME DA subcategoria PARA SER URL:
        $this->load->helper('tratar_url');
        $this->link = tratar_url($this->subcategoria);
        
        //ATUALIZA A subcategoria NO BANCO:
        $query = $this->db->query("UPDATE tb_subcategoria SET FK_CATEGORIA = '$this->categoria->id_categoria', NM_SUBCATEGORIA = '$this->subcategoria', NM_LINK = '$this->link', CD_STATUS = '$this->ativo' WHERE PK_subcategoria = '$this->id_subcategoria'"); 
    }
    
    /**
    * Função que exclui a subcategoria no banco.
    * @access public
    * @param $id_subcategoria: Id da subcategoria a excluir.
    * @return TRUE: Caso query OK
    * @return FALSE: Caso algum erro.
    */
    function excluir_subcategoria($id_subcategoria)
    {
        $this->id_subcategoria = $id_subcategoria;
        
        //EXCLUI A subcategoria NO BANCO:
        $query = $this->db->simple_query("DELETE FROM tb_subcategoria WHERE PK_SUBCATEGORIA = '$this->id_subcategoria'");

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
    * Função que muda o status a subcategoria no banco.
    * @access public
    * @param $id_subcategoria: Id da subcategoria a excluir.
    * @return TRUE: Caso query OK
    * @return FALSE: Caso algum erro.
    */
    function mudar_status_subcategoria($id_subcategoria)
    {
        $this->id_subcategoria = $id_subcategoria;

        // QUERY QUE INVERTE O VALOR DO CAMPO STATUS
        $consulta = "UPDATE tb_subcategoria SET CD_STATUS = NOT CD_STATUS WHERE PK_SUBCATEGORIA = '$this->id_subcategoria'";
        
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
    * Função que carrega toda as subcategorias ativas do banco.
    * @access public
    * @param $desativados: Caso esteja FALSE (default) mostra apenas as subcategorias ativadas, se não mostra tudo.  
    * @return $query: Retorna o recordset da consulta.
    * @return FALSE: Caso nenhuma linha encontrada.
    */
    function listar_subcategorias($desativados = FALSE)
    {
        
        $sql = "SELECT s.*, s.CD_STATUS AS SUBCATEGORIA_ATIVA, s.VL_ORDEM AS ORDEM_SUBCATEGORIA, c.* FROM tb_subcategoria s LEFT JOIN tb_categoria c ON s.FK_CATEGORIA = c.PK_CATEGORIA ";
        
        //CASO A VAR DESATIVADOS FOR TRUE MOSTRA TODOS OS ITENS:
        if($desativados == TRUE)
        {
           $sql .= "WHERE CD_STATUS = 1 ";
        }
        
        $sql .="GROUP BY s.NM_LINK ORDER BY s.VL_ORDEM";
        
        //SELECIONA AS subcategoriaS ATIVAS DO BANCO:
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
    * Função que carrega toda as subcategorias ativas do banco.
    * @access public
    * @param $desativados: Caso esteja FALSE (default) mostra apenas as subcategorias ativadas, se não mostra tudo.  
    * @return $query: Retorna o recordset da consulta.
    * @return FALSE: Caso nenhuma linha encontrada.
    */
    function listar_subcategorias_categorias($categoria,$desativados = FALSE)
    {
        
        $sql = "SELECT PK_SUBCATEGORIA, NM_SUBCATEGORIA, NM_LINK FROM tb_subcategoria WHERE ";
        
        //CASO A VAR DESATIVADOS FOR TRUE MOSTRA TODOS OS ITENS:
        if($desativados == TRUE)
        {
           $sql .= "CD_STATUS = 1 AND ";
        }
        
        $sql .="FK_CATEGORIA = '$categoria' GROUP BY NM_LINK ORDER BY NM_SUBCATEGORIA";
        
        //SELECIONA AS subcategoriaS ATIVAS DO BANCO:
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
    * Função que carrega somente uma subcategoria do banco.
    * @access public
    * @param $id_subcategoria: Id da subcategoria a carregar.
    * @return $query: Retorna o recordset da consulta.
    * @return FALSE: Caso nenhuma linha encontrada.
    */
    function carregar_subcategoria($id_subcategoria)
    {
        //SELECIONA AS subcategoriaS ATIVAS DO BANCO:
        $query = $this->db->query("SELECT * FROM tb_subcategoria WHERE PK_SUBCATEGORIA = '$id_subcategoria' LIMIT 1");   
        
        if($query->num_rows() > 0)
        {
           foreach ($query->result() as $linha)
           {
                $this->id_subcategoria = $linha->PK_SUBCATEGORIA;
                $this->subcategoria = $linha->NM_SUBCATEGORIA;
                $this->categoria = $linha->FK_CATEGORIA;
                $this->link = $linha->NM_LINK;
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
    * Função que carrega somente uma subcategoria do banco pelo link.
    * @access public
    * @param $subcategoria: link da subcategoria a carregar.
    * @return $query: Retorna o recordset da consulta.
    * @return FALSE: Caso nenhuma linha encontrada.
    */
    function carregar_subcategoria_link_site($subcategoria)
    {
        //SELECIONA AS subcategoriaS ATIVAS DO BANCO:
        $query = $this->db->query("SELECT * FROM tb_subcategoria WHERE NM_LINK = '$subcategoria' AND CD_STATUS = 1 LIMIT 1");   
        
        if($query->num_rows() > 0)
        {
           foreach ($query->result() as $linha)
           {
                $this->id_subcategoria = $linha->PK_SUBCATEGORIA;
                $this->subcategoria = $linha->NM_SUBCATEGORIA;
                $this->categoria = $linha->FK_CATEGORIA;
                $this->link = $linha->NM_LINK;
                $this->ativo = $linha->CD_STATUS;
                $this->ordem = $linha->VL_ORDEM;
                $this->meta_titulo = $linha->META_TITULO;
                $this->meta_palavras = $linha->META_PALAVRAS;
                $this->meta_descricao = $linha->META_DESCRICAO;
           }
           
           return TRUE;
           
        }
        else
        {
           return FALSE; 
        }
    }
	
    /**
    * Função que lista todas as subcategorias com base nas categorias.
    * @access public
    * @param $id_categoria: Id da categoria a carregar.
	* @param $desativados: Caso queira mostrar todas as subcategorias deixe como TRUE.
    * @return $query: Retorna o recordset da consulta.
    * @return FALSE: Caso nenhuma linha encontrada.
    */
	function listar_subcategoria_por_categoria($id_categoria, $desativados = FALSE)
	{
		$this->categoria = $id_categoria;
		
		$sql = "SELECT * FROM tb_subcategoria WHERE FK_CATEGORIA = '$this->categoria'";
		if($desativados == TRUE)
		{
			$sql .= " AND CD_STATUS = 1";
		}
		
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
     * Função que conta as subcategorias no banco.
     * @access public
     */
    function contar_subcategorias()
    {
        $query = $this->db->query('SELECT COUNT(PK_SUBCATEGORIA) as QTD FROM tb_subcategoria LIMIT 1');
        $linha = $query->row(0);
        $this->qtd_subcategorias = $linha->QTD;
    }
	
}