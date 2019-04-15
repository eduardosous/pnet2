<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Este é o Controller responsável pelos envios de E-mail no Site
* @author Carlos Silva <carlos@plataformanet.com.br>
* @version 3.0
* @copyright Copyright © 2017, Plataformanet Mídia Online
* @access public
* @package MY_Controller_Adm
* @subpackage EmailCtrl
*/

class EmailCtrl extends MY_Controller_Email {

    public function __construct(){
        
        // CHAMA O CONSTRUTOR DA CLASSE PAI(MY_Controller_Site)
        parent::__construct();

        //CARREGA O MODEL CATEGORIAS:
        // $this->load->model('Contato');
        // $this->load->model('Orcamento');
         
        // CARREGA OS HELPERS
        $this->load->helper('email');
        $this->load->helper('alert');
         
        //CARREGA AS LIBRARYS:
        $this->load->library('form_validation');
        $this->load->library('email');

        //REGRAS PARA A VALIDACAO DO E-MAIL:
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'required');

        //VALIDAÇÃO DE FORMULÁRIO:
        if ($this->form_validation->run() == FALSE  /*|| !$_POST['g-recaptcha-response']*/ ) {

            jsAlert("Por favor preencha todos os campos!", "", TRUE);
            die();
        }

    }

    public function enviaContato() {

        //RECUPERA AS INFORMAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Site)
        $data = $this->data;

        //RECUPERA AS CONFIGURAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Email)
        $config = $this->configuracao;
        $emaildestino = "contato@plataformanet.com.br";
        $emaildestinocopia = $this->emaildestinocopia;

        // CARREGA O MODEL
        $this->load->model('Contato');

        // RECUPERA AS INFORMAÇÕES ENVIADAS PELO FORMULÁRIO
        $array_contato = recuperaPostContato($this->input, 'Contato Pelo Site');

        // SALVA O CONTATO NO BANCO
        $this->Contato->cadastrar_contato($array_contato);

        // FORMATA A MENSAGEM
        $msg = formataContato($array_contato);

        $this->email->initialize($config);
        $this->email->from($emaildestino, "Plataformanet");
        $this->email->to($emaildestino);
        $this->email->cc($emaildestinocopia);
        $this->email->subject($array_contato['assunto']);
        $this->email->message($msg);
        $this->email->send();
        
        // print $msg;

        jsAlert("Mensagem enviada com sucesso! Obrigado.", "contato", FALSE);
    }

    public function enviaOrcamento() {


        //RECUPERA AS INFORMAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Site)
        $data = $this->data;

        //RECUPERA AS CONFIGURAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Email)
        $config = $this->configuracao;
        $emaildestino = $this->emaildestino;
        $emaildestinocopia = $this->emaildestinocopia;

        // CARREGA O MODEL
        $this->load->model('Orcamentos');

        // RECUPERA AS INFORMAÇÕES ENVIADAS PELO FORMULÁRIO
        $array_orcamento = recuperaPostOrcamento($this->input);

        // SALVA PEDIDO NO BANCO
        $this->Orcamentos->fechar_orcamento($array_orcamento);

        // SETA O NOME DO ASSUNTO, COM O ID DO ORÇAMENTO
        $array_orcamento['assunto'] = "Informação de pedido nº " . $this->Orcamentos->id_pedido . " | " .$data['loja'];

        /* MONTA A MENSAGEM EM HTML */
        $msg_orcamento = formataOrcamento($array_orcamento, $this->Orcamentos->id_pedido, $data, $this->cart);

        //ENVIA O E-MAIL:
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from($emaildestino, $data['loja']);
        $this->email->to($emaildestino);
        $this->email->cc($emaildestinocopia);
        $this->email->subject($array_orcamento['assunto']);
        $this->email->message($msg_orcamento);
        $this->email->send();

        // print $msg_orcamento;

        //MATA O CARRINHO:      
        $this->cart->destroy();

        jsAlert("Orçamento Enviado! Obrigado!", null, FALSE);
    }

    public function enviaServico() {

        //RECUPERA AS INFORMAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Site)
        $data = $this->data;

        //RECUPERA AS CONFIGURAÇÕES CARREGADAS PELO CONSTRUTOR PAI(MY_Controller_Email)
        $config = $this->configuracao;
        $emaildestino = $this->emaildestino;
        $emaildestinocopia = $this->emaildestinocopia;

        // CARREGA O MODEL
        $this->load->model('Contato');

        // RECUPERA AS INFORMAÇÕES ENVIADAS PELO FORMULÁRIO
        $array_contato = recuperaPostContato($this->input, 'Contato Pelo Site');

        // SALVA O CONTATO NO BANCO
        //$this->Contato->cadastrar_contato($array_contato);

        // FORMATA A MENSAGEM
        $msg = formataContato($array_contato);

        $this->email->initialize($config);
        $this->email->from($emaildestino, $data['loja']);
        $this->email->to($emaildestino);
        $this->email->cc($emaildestinocopia);
        $this->email->subject($array_contato['assunto']);
        $this->email->message($msg);
        $this->email->send();
        
        // print $msg;

        jsAlert("Mensagem enviada com sucesso! Obrigado.", "contato", FALSE);
    }

}