<?php

if(!function_exists('recuperaPostContato'))
{
    function recuperaPostContato($post, $assunto){
        
        // CRIA O ARRAY DE CONTATO
        $array_contato['nome'] = trim($post->post('nome'));
        $array_contato['email'] = trim($post->post('email'));
        $array_contato['telefone'] = trim($post->post('telefone'));
         $array_contato['celular'] = trim($post->post('celular'));
        $array_contato['mensagem'] = trim($post->post('mensagem'));
        $array_contato['assunto'] = null != $post->post('assunto') ? ( trim($post->post('assunto')) ) : ( $assunto );
        
        return $array_contato;
    }
}

if(!function_exists('formataContato'))
{
	function formataContato($array_contato){
	    
	    $msg = "\n Data: " . date(" Y-m-d H:i:s") .
                    "\n ------------------------------------------------------------------------------" .
                    "\n NOME: " . $array_contato['nome'] .
                    "\n E-MAIL: " . $array_contato['email'] .
                    "\n TELEFONE: " . $array_contato['telefone'] .
                    "\n CELULAR: " . $array_contato['celular'] .
                    "\n MENSAGEM: " . $array_contato['mensagem'];
        return $msg;
  	}
}

