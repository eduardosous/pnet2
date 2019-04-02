<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller_Site extends CI_Controller {

   public function __construct()
    {
        parent::__construct();

        $this->data = array();
        $this->data['loja'] = $this->Sistema->loja;
        $this->data['telefone'] = $this->Sistema->telefone;
        $this->data['telefone2'] = $this->Sistema->telefone2;
        $this->data['endereco'] = $this->Sistema->endereco;
        $this->data['email'] = $this->Sistema->email;
        $this->data['status'] = $this->Sistema->status;
        $this->data['dispositivo'] = $this->agent;
        $this->data['pasta_uploads'] = $this->Sistema->pasta_uploads;
        $this->data['url_uploads'] = $this->Sistema->url_uploads;

        //CASO A LOJA ESTEJA DESATIVADA:
        if ($this->data['status'] <= 0) {
            print 'manuntenção';
            
            //CARREGA O TEMPLATE E A PÁGINA
            header("Location: " . base_url('manutencao') . "");

            // MATA A EXECUÇÃO DOS PRÓXIMOS COMANDOS
            die();
        }
    }
}


class MY_Controller_Email extends MY_Controller_Site {

   public function __construct()
    {
        parent::__construct();

        // CONFIGURAÇÕES DO EMAIL
        
        /*$this->emaildestino = "carlos@plataformanet.com.br"; */
        $this->emaildestino = $this->data['email'];
        //$this->emaildestinocopia = "";
        // $this->emaildestino = $this->data['email'];

        $this->configuracao['charset'] = 'utf-8';
        $this->configuracao['wordwrap'] = TRUE;

        /*
        |---------------------------------------------------------------------------------------------------------------------------
        | Configuração de SMTP 
        | 
        | (Utilizado somente quando não for hospedado no Sandalo, ou for utilizar um servidor SMTP Remoto)
        | 
        |---------------------------------------------------------------------------------------------------------------------------
        |
        */
       
        /*$this->configuracao['protocol']='smtp';
        $this->configuracao['smtp_host']='smtp.dominio.com.br';
        $this->configuracao['smtp_port']='587';
        $this->configuracao['smtp_timeout']='60';
        $this->configuracao['smtp_user']='noreply@dominio.com.br';
        $this->configuracao['smtp_pass']='SENHAAQUI!';
        $this->configuracao['charset']='utf-8';
        $this->configuracao['newline']="\r\n";
        $this->configuracao['mailtype']="html";
        $this->configuracao['smtp_crypto'] = 'tls';*/
    }
}