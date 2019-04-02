<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Esta classe é a responsável pelo carregamento das principais informações do catalogo.
 * @author Paulo Sobral <paulo@plataformanet.com.br>
 * @version 0.1
 * @copyright Copyright © 2012, Lojas Kamikawa.
 * @access public
 * @package CI_Model
 * @subpackage Sistema
 */
class Sistema extends CI_Model {

    /**
     * Variável recebe o id da configuração do catalogo.
     * @access public
     * @name $id_sistema
     */
    var $id_sistema;

    /**
     * Variável recebe o id da configuração do catalogo.
     * @access public
     * @name $id_sistema
     */
    var $id_usuario;

    /**
     * Variável recebe o nome da loja
     * @access public
     * @name $loja
     */
    var $loja;

    /**
     * Variável recebe o telefone da loja.
     * @access public
     * @name $telefone
     */
    var $telefone;
    
    /**
     * Variável recebe o telefone da loja.
     * @access public
     * @name $telefone
     */
    var $telefone2;
    
    /**
     * Variável recebe o telefone da loja.
     * @access public
     * @name $telefone
     */
    var $fax;

    /**
     * Variável recebe o endereço da loja.
     * @access public
     * @name $endereco
     */
    var $endereco;

    /**
     * Variável recebe o e-mail principal da loja.
     * @access public
     * @name $email
     */
    var $email;

    /**
     * Variável recebe o status do catalogo (Ativo ou desativado).
     * @access public
     * @name $id_categoria
     */
    var $status;

    /**
     * Variável recebe o as informações da loja.
     * @access public
     * @name $endereco
     */
    var $nome;

    /**
     * Variável recebe o as informações da loja.
     * @access public
     * @name $endereco
     */
    var $login;

    /**
     * Variável recebe o as informações da loja.
     * @access public
     * @name $endereco
     */
    var $senha;

    /**
     * Variável recebe o as informações da loja.
     * @access public
     * @name $endereco
     */
    var $ip;

    /**
     * Variável recebe o as informações da loja.
     * @access public
     * @name $endereco
     */
    var $data;

    /**
     * Variável recebe o as informações da loja.
     * @access public
     * @name $endereco
     */
    var $hora;

    /**
     * Variável recebe as categorias da loja.
     * @access public
     * @name $categorias
     */
    var $categorias;

    function __construct() {
        // Call the Model constructor
        parent::__construct();

        //CARREGA AS INFORMAÇÕES BÁSICAS:
        $query = $this->db->query('SELECT * FROM tb_sistema');

        foreach ($query->result() as $linha) {
            $this->id_sistema = $linha->PK_SISTEMA;
            $this->loja = $linha->NM_LOJA;
            $this->telefone = $linha->TELEFONE;
            $this->telefone2 = $linha->TELEFONE_SECUNDARIO;
            $this->fax = $linha->FAX;
            $this->endereco = $linha->ENDERECO;
            $this->email = $linha->EMAIL;
            $this->status = $linha->CD_STATUS;
            $this->pasta_uploads = $linha->PASTA_UPLOADS;
            $this->url_uploads = $linha->URL_UPLOADS;
        }
    }

    /**
     * Função que traz informações cadastradas para gerar o sitemap.
     * @access public
     * @return TRUE: Caso cadastro OK
     * @return FALSE: Caso algum erro.
     */
    function gera_sitemap() {

        //GERA AS CATEGORIAS E SUBCATEGORIAS:
        $query = $this->db->query("SELECT c.NM_LINK AS LINK_CATEGORIA, s.NM_LINK AS LINK_SUBCATEGORIA
		FROM tb_categoria c INNER JOIN tb_subcategoria s ON c.PK_CATEGORIA = s.FK_CATEGORIA
		WHERE c.CD_STATUS = 1 AND s.CD_STATUS = 1");

        //GERA AS CATEGORIAS E SUBCATEGORIAS E PRODUTOS:
        if ($query->num_rows() > 0) {
            $sitemap[0] = $query;

            $query = $this->db->query("SELECT p.NM_LINK AS LINK_PRODUTO, c.NM_LINK AS LINK_CATEGORIA, s.NM_LINK AS LINK_SUBCATEGORIA
			FROM tb_categoria c INNER JOIN tb_subcategoria s ON c.PK_CATEGORIA = s.FK_CATEGORIA
			INNER JOIN tb_produto p ON s.PK_SUBCATEGORIA = p.FK_SUBCATEGORIA
			WHERE c.CD_STATUS = 1 AND s.CD_STATUS = 1");

            if ($query->num_rows() > 0) {
                $sitemap[1] = $query;

                return $sitemap;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * Função que realiza o login.
     * @access public
     * @param $array_login: Array contendo as informações do login.
     * @return TRUE: Caso cadastro OK
     * @return FALSE: Caso algum erro.
     */
    function login($array_login) {
        $this->login = $array_login['login'];
        $this->senha = $array_login['senha'];

        $this->senha = base64_encode($this->senha);

        $query = $this->db->query("SELECT PK_ADMIN FROM tb_admin WHERE NM_LOGIN = '$this->login' AND NM_SENHA = '".$this->senha."' AND CD_STATUS = 1 LIMIT 1");
		//echo $this->db->last_query();
		//echo "<br />".$query->num_rows();
       if ($query->num_rows() > 0) {
            $id_usuario = $query->row_array(0);
            $this->id_usuario = $id_usuario['PK_ADMIN'];
            //$this->salva_login($this->id_usuario);
            return TRUE;
        } else {
            return FALSE;
        }
		return TRUE;
    }

    /**
     * Função que salva as informações do ultimo login no banco.
     * @access public
     * @param $id: Id do usuário logado.
     */
    function atualizar_sistema($array_sistema) {
        $this->loja = $array_sistema['loja'];
        $this->telefone = $array_sistema['telefone'];
        $this->telefone2 = $array_sistema['telefone2'];
        $this->fax = $array_sistema['fax'];
        $this->endereco = $array_sistema['endereco'];
        $this->email = $array_sistema['email'];
        $this->status = $array_sistema['online'];

        $query = $this->db->query("UPDATE tb_sistema SET NM_LOJA = '$this->loja', TELEFONE = '$this->telefone', ENDERECO = '$this->endereco', EMAIL = '$this->email', CD_STATUS = '$this->status', TELEFONE_SECUNDARIO = '$this->telefone2', FAX = '$this->fax' WHERE PK_SISTEMA = 1");
    }

    /**
     * Função que salva as informações do ultimo login no banco.
     * @access public
     * @param $id: Id do usuário logado.
     */
    function salva_login($id) {
        $this->id_usuario = $id;
        $this->ip = $this->input->ip_address();
        $query = $this->db->query("UPDATE tb_admin SET DT_ULTIMO_LOGIN = CURDATE(), HR_ULTIMO_LOGIN = CURTIME(), ULTIMO_IP = '$this->ip' WHERE PK_ADMIN = $this->id_usuario");
    }

    /**
     * Função que salva as informações do ultimo login no banco.
     * @access public
     * @param $id: Id do usuário logado.
     * @return TRUE: Caso logado OK
     * @return FALSE: Caso logado de erro.
     */
    function verifica_logado() {
        if ($this->session->userdata('USUARIO_LOGADO') == FALSE) {
            return FALSE;
        } else {
            $id_usuario = $this->session->userdata('USUARIO_LOGADO');
            $query = $this->db->query("SELECT PK_ADMIN FROM tb_admin WHERE PK_ADMIN = '$id_usuario' AND CD_STATUS = 1 LIMIT 1");
            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    /**
     * Função que verifica se o usuário logado é o admin.
     * @access public
     * @return TRUE: Caso logado OK
     * @return FALSE: Caso logado de erro.
     */
    function verifica_adm() {
        if ($this->session->userdata('USUARIO_LOGADO') == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Função que resgata todas as informações dos usuários no banco.
     * @access public
     * @param $id: Id do usuário logado.
     * @return FALSE: Caso logado de erro.
     */
    function informacao_usuario($id = NULL, $login = NULL) {
        if ($id == NULL && $login == NULL) {
            return FALSE;
        } else {
            if ($login == NULL) {
                $sql = "SELECT NM_USUARIO, NM_LOGIN, NM_SENHA, NM_EMAIL, ULTIMO_IP, DT_ULTIMO_LOGIN, HR_ULTIMO_LOGIN, CD_STATUS FROM tb_admin WHERE PK_ADMIN = '$id' LIMIT 1";
            } else {
                $sql = "SELECT NM_USUARIO, NM_LOGIN, NM_SENHA, NM_EMAIL, ULTIMO_IP, DT_ULTIMO_LOGIN, HR_ULTIMO_LOGIN, CD_STATUS FROM tb_admin WHERE PK_ADMIN = '$login' LIMIT 1";
            }

            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $linha = $query->row_array(0);
                $this->nome = $linha['NM_USUARIO'];
                $this->login = $linha['NM_LOGIN'];
                $this->senha = $linha['NM_SENHA'];
                $this->email = $linha['NM_EMAIL'];
                $this->status = $linha['CD_STATUS'];
                $this->ip = $linha['ULTIMO_IP'];
                $this->data = $linha['DT_ULTIMO_LOGIN'];
                $this->hora = $linha['HR_ULTIMO_LOGIN'];

                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    /**
     * Função que lista todos os usuários no banco.
     * @access public
     */
    function lista_usuarios() {
        $query = $this->db->query("SELECT * FROM tb_admin WHERE PK_ADMIN != 1");
        if ($query->num_rows() > 0) {
            return $query;
        }
    }

    /**
     * Cadastrar usuários no sistema.
     * @access public
     * @param $array_usuario: array contendo as informações para cadastro.
     */
    function cadastrar_usuario($array_usuario) {
        $this->nome = $array_usuario['nome'];
        $this->login = $array_usuario['login'];
        $this->senha = $array_usuario['senha'];
        $this->email = $array_usuario['email'];
        $this->status = $array_usuario['status'];

        //VERIFICA SE JÁ EXISTE O MESMO LOGIN:
        $query = $this->db->query("SELECT COUNT(PK_ADMIN) as qntd FROM tb_admin WHERE NM_LOGIN = '$this->login' LIMIT 1");
        $resultado = $query->row_array(0);

        if ($resultado['qntd'] <= 0) {

            //TRATA A SENHA:
            $this->senha = base64_encode($this->senha);

            $query = $this->db->query("INSERT INTO tb_admin(NM_USUARIO, NM_LOGIN, NM_SENHA, NM_EMAIL, CD_STATUS)
			VALUES ('$this->nome','$this->login','$this->senha','$this->email','$this->status')");

            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Função que exclui um usuário no banco.
     * @access public
     * @param $id_categoria: Id da categoria a excluir.
     * @return void
     */
    function excluir_usuario($id_usuario) {
        $query = $this->db->query("DELETE FROM tb_admin WHERE PK_ADMIN = '$id_usuario'");
    }

    /**
     * Função que atualiza um usuário no banco.
     * @access public
     * @param $array_usuario: array com as informações para atualizar.
     * @return void
     */
    function atualizar_usuario($array_usuario) {
        $this->id_usuario = $array_usuario['id_usuario'];
        $this->nome = $array_usuario['nome'];
        $this->login = $array_usuario['login'];
        $this->senha = $array_usuario['senha'];
        $this->email = $array_usuario['email'];
        $this->status = $array_usuario['status'];

        //CASO SENHA EM BRANCO NÃO ATUALIZA:
        if ($this->senha != NULL) {
            $this->senha = base64_encode($this->senha);
            $sql = "UPDATE tb_admin SET NM_USUARIO = '$this->nome', NM_LOGIN = '$this->login', NM_SENHA = '$this->senha', CD_STATUS = '$this->status', NM_EMAIL = '$this->email' WHERE PK_ADMIN = '$this->id_usuario'";
        } else {
            $sql = "UPDATE tb_admin SET NM_USUARIO = '$this->nome', NM_LOGIN = '$this->login', CD_STATUS = '$this->status', NM_EMAIL = '$this->email' WHERE PK_ADMIN = '$this->id_usuario'";
        }

        $query = $this->db->query($sql);

        print $sql;
    }

    /**
     * Função que verifica o código de segurança no banco.
     * @access public
     * @param $codigo: var com a senha digitada.
     * @return void
     */
    function verificar_codigo_seguranca($codigo) {
        $query = $this->db->query("SELECT count(PK_SISTEMA) as OK FROM tb_sistema WHERE CD_SEGURANCA = '$codigo' LIMIT 1");

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}