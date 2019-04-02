<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Esta classe é a responsável pelas ategorias.
* @author Paulo Sobral <paulo@plataformanet.com.br>
* @version 0.1
* @copyright Copyright © 2012, F3 Contruções.
* @access public
* @package CI_Model
* @subpackage subprodutos
*/

class Subprodutos extends CI_Model 
{
    /**
    * Variável recebe o id do produto.
    * @access public
    * @name $produtos
    */
    var $produtos;
    
    /**
    * Variável recebe o id do subproduto.
    * @access public
    * @name $id_subproduto
    */
    var $id_subproduto;
    
    /**
    * Variável recebe o nome do subproduto.
    * @access public
    * @name $subproduto
    */
    var $subproduto;
    
    /**
    * Variável recebe o link do subproduto.
    * @access public
    * @name $link
    */
    var $link;
    
    /**
    * Variável recebe a imagem.
    * @access public
    * @name $imagem
    */
    var $imagem;

    /**
    * Variável recebe o ativo do subproduto.
    * @access public
    * @name $ativo
    */
    var $ativo;
    
     /**
    * Variável recebe a promocao do subproduto.
    * @access public
    * @name $promocao
    */
    var $promocao;
    
     /**
    * Variável recebe a descricao do subproduto.
    * @access public
    * @name $descricao
    */
    var $descricao;
    

    /**
     * Variável recebe a quantidade de subprodutos
     * @access public
     * @name $qtd_subprodutos
     */
    var $qtd_subprodutos;

    /**
     * Variável recebe a $ordem da subcategoria.
     * @access public
     * @name $ordem
     */
    //var $ordem;
    
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
    * Função que cadastra o subproduto no banco.
    * @access public
    * @param $array_subproduto: Array contendo as informações do subproduto.
    * @return void
    */

    function cadastrar_subproduto($array_subproduto)
    {
        //RESGATA OS VALORES:
        $this->produto = $array_subproduto['produto'];
        $this->subproduto = $array_subproduto['subproduto'];
        $this->ativo = $array_subproduto['ativo'];
        $this->ordem = $array_subproduto['ordem'];
        
        //TRATA O NOME DA CATEGORIA PARA SER URL:
        $this->load->helper('tratar_url');
        $this->link = tratar_url($this->subproduto);
        ($this->ativo == 1)?($this->ativo = 1):($this->ativo = 0);

        //CASO A IMAGEM SEJA NULA, ENTRA IMAGEM PADRÃO:
        if($array_subproduto['arquivo'] == NULL)
        {
           $this->imagem  = "img-padrao.jpg";
        }
        else
        {
            $this->imagem = $array_subproduto['arquivo'];
        }


        //TRATA O NOME DO SUBPRODUTO PARA SER URL:
        $this->load->helper('tratar_url');
        $this->link = tratar_url($this->subproduto);
      
        
        if($this->verifica_subproduto_repetido($this->produto,$this->link) == FALSE)
        {
            //CADASTRA O SUBPRODUTO NO BANCO:
            $query = $this->db->query("INSERT INTO tb_subproduto (FK_PRODUTO,NM_SUBPRODUTO,NM_LINK,NM_ATIVO,NM_IMAGEM,VL_ORDEM) VALUES ('$this->produto','$this->subproduto', '$this->link', '$this->ativo','$this->imagem','$this->ordem')");

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
    function verifica_subproduto_repetido($subproduto, $link)
    {
        $sql = "SELECT COUNT(PK_CADASTRO_SUBPRODUTO) AS QNTD FROM tb_subproduto WHERE NM_LINK = '$link'";

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
    function atualizar_subproduto($array_subproduto)
    {
        //RESGATA OS VALORES:
        $this->produto = $array_subproduto['produto'];
        $this->id_subproduto = $array_subproduto['id_subproduto'];
        $this->subproduto = $array_subproduto['subproduto'];
        $this->ativo = $array_subproduto['ativo'];
        $this->ordem = $array_subproduto['ordem'];
         
        //TRATA O NOME DA subcategoria PARA SER URL:
        $this->load->helper('tratar_url');
        $this->link = tratar_url($this->subproduto);
     
        
       
        $sql = "UPDATE tb_subproduto 
        SET ";
        
        //VERIFICA CATEGORIA:
        if($array_subproduto['produto'] != NULL)
        {
            $this->produto = $array_subproduto['produto'];
            $sql .= "FK_PRODUTO = '$this->produto',";
        }
        
        //VERIFICA IMAGEM:
        if($array_subproduto['imagem'] != NULL)
        {
            $this->imagem = $array_subproduto['imagem'];
            $sql .= "NM_IMAGEM = '$this->imagem',";
        }
        
        $sql .="NM_SUBPRODUTO = '$this->subproduto', 
        NM_LINK = '$this->link',
        VL_ORDEM= '$this->ordem', 
        NM_ATIVO = '$this->ativo'      
        WHERE PK_CADASTRO_SUBPRODUTO = '$this->id_subproduto'";
        
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
    * Função que exclui a subcategoria no banco.
    * @access public
    * @param $id_subcategoria: Id da subcategoria a excluir.
    * @return TRUE: Caso query OK
    * @return FALSE: Caso algum erro.
    */
    function excluir_subproduto($id_subproduto)
    {
        $this->id_subproduto = $id_subproduto;
        
        //EXCLUI A subcategoria NO BANCO:
        $query = $this->db->simple_query("DELETE FROM tb_subproduto WHERE PK_CADASTRO_SUBPRODUTO = '$this->id_subproduto'");

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
    * Função que carrega toda as subcategorias ativas do banco.
    * @access public
    * @param $desativados: Caso esteja FALSE (default) mostra apenas as subcategorias ativadas, se não mostra tudo.  
    * @return $query: Retorna o recordset da consulta.
    * @return FALSE: Caso nenhuma linha encontrada.
    */
    function listar_subprodutos($desativados = FALSE)
    {
        
        $sql = "SELECT s.*, s.NM_ATIVO AS SUBPRODUTO_ATIVA, s.VL_ORDEM AS ORDEM_SUBPRODUTO, c.* FROM tb_subproduto s LEFT JOIN tb_produto c ON s.FK_PRODUTO = c.PK_PRODUTO ";
        
        //CASO A VAR DESATIVADOS FOR TRUE MOSTRA TODOS OS ITENS:
        if($desativados == TRUE)
        {
           $sql .= "WHERE CD_STATUS = 1 ";
        }
        
        $sql .="GROUP BY s.NM_LINK ORDER BY s.NM_SUBPRODUTO";
        
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
    function listar_promocoes()
    {
        
        $sql = "SELECT * FROM tb_subproduto WHERE NM_ATIVO = 1 AND PROMOCAO = 1 ORDER BY RAND() LIMIT 6";
        
      
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
    function listar_subprodutos_produtos($produto,$desativados = FALSE)
    {
        
        $sql = "SELECT PK_CADASTRO_SUBPRODUTO, NM_SUBPRODUTO, NM_LINK, NM_IMAGEM FROM tb_subproduto WHERE ";
        
        //CASO A VAR DESATIVADOS FOR TRUE MOSTRA TODOS OS ITENS:
        if($desativados == TRUE)
        {
           $sql .= "NM_ATIVO = 1 AND ";
        }
        
        $sql .="FK_PRODUTO = '$produto' GROUP BY NM_LINK ORDER BY VL_ORDEM";
        
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
    function carregar_subproduto($id_subproduto)
    {
        //SELECIONA AS subcategoriaS ATIVAS DO BANCO:
        $query = $this->db->query("SELECT * FROM tb_subproduto WHERE PK_CADASTRO_SUBPRODUTO = '$id_subproduto' LIMIT 1");   
        
        if($query->num_rows() > 0)
        {
           foreach ($query->result() as $linha)
           {
               $this->id_subproduto = $linha->PK_CADASTRO_SUBPRODUTO;
               $this->subproduto = $linha->NM_SUBPRODUTO;
               $this->produto = $linha->FK_PRODUTO;
               $this->link = $linha->NM_LINK;
               $this->imagem = $linha->NM_IMAGEM;
               $this->ativo = $linha->NM_ATIVO;
               $this->ordem = $linha->VL_ORDEM;
           }
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
    function carregar_subproduto_site($subproduto)
    {
        //SELECIONA AS subcategoriaS ATIVAS DO BANCO:
        $query = $this->db->query("SELECT * FROM tb_subproduto WHERE NM_LINK = '$subproduto' LIMIT 1");   
        
        if($query->num_rows() > 0)
        {
           foreach ($query->result() as $linha)
           {
               $this->id_subproduto = $linha->PK_CADASTRO_SUBPRODUTO;
               $this->subproduto = $linha->NM_SUBPRODUTO;
               $this->produto = $linha->FK_PRODUTO;
               $this->link = $linha->NM_LINK;
               $this->imagem = $linha->NM_IMAGEM;
               $this->ativo = $linha->NM_ATIVO;
               $this->ordem = $linha->VL_ORDEM;
           }
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
    function contar_subprodutos()
    {
        $query = $this->db->query('SELECT COUNT(PK_CADASTRO_SUBPRODUTO) as QTD FROM tb_subproduto LIMIT 1');
        $linha = $query->row(0);
        $this->qtd_subprodutos = $linha->QTD;
    }
    
}