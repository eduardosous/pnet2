<?php

if(!function_exists('recuperaPostContato'))
{
    function recuperaPostContato($post, $assunto){
        
        // CRIA O ARRAY DE CONTATO
        $array_contato['nome'] = trim($post->post('nome'));
        $array_contato['email'] = trim($post->post('email'));
        $array_contato['telefone'] = trim($post->post('telefone'));
        $array_contato['mensagem'] = trim($post->post('mensagem'));
        $array_contato['assunto'] = null != $post->post('assunto') ? ( trim($post->post('assunto')) ) : ( $assunto );
        
        return $array_contato;
    }
}

if(!function_exists('recuperaPostOrcamento'))
{
	function recuperaPostOrcamento($post){
	    
	    // CRIA O ARRAY DE CONTATO
	    $array_contato['nome'] = trim($post->post('nome'));
        $array_contato['email'] = trim($post->post('email'));
        $array_contato['telefone'] = trim($post->post('telefone'));
        $array_contato['mensagem'] = trim($post->post('mensagem'));
	    
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
                    "\n MENSAGEM: " . $array_contato['mensagem'];
        return $msg;
  	}
}

if(!function_exists('formataOrcamento'))
{
	function formataOrcamento($array_orcamento, $id_orcamento, $sistema, $carrinho){
	    
    	/* MONTA A MENSAGEM EM HTML */
        $msg_orcamento = '
            <!DOCTYPE HTML>
            	<html>
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        				<title>Informação de pedido nº ' . $id_orcamento . ' | '. $sistema["loja"] . '</title>
                    </head>
                    <body bgcolor="#EDFAFC" link="#333333" vlink="#333333" alink="#333333" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
                        <table width="800" border="0" align="center" cellpadding="5" cellspacing="0">
                        	<tr>
                            	<td width="152"><img src="' . base_url("assets/site/img") . '/logo-topo.png" width="152" height="69" alt="'. $sistema["loja"] .'"></td>
                            	<td>
                            		<p>
                            			<font size="1" face="Verdana, Geneva, sans-serif" color="#333333">
                                			<strong>' . $sistema["loja"] . '</strong><br/>
                                			<strong>Endereço:</strong> ' . $sistema["endereco"] . '<br/>
                                			<strong>Telefone:</strong> ' . $sistema["telefone"] . '<br/>
                                			<strong>E-mail:</strong> ' . $sistema["email"] . '
                            			</font>
                        			</p>
                        		</td>
                            </tr>
                            <tr>
                            <td colspan="2">
                                <div style="border-top:3px solid #015383">
                                	<h1><font size="3" face="Verdana, Geneva, sans-serif" color="#333333">Orçamento nº ' . $id_orcamento . ':</font></h1>
                                	<p><font size="1" face="Verdana, Geneva, sans-serif" color="#333333">Data: ' . date("d/m/Y") . ', Hora: ' . date("H:i:s") . '</font></p>
                                	<table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <th><font size="2" face="Verdana, Geneva, sans-serif" color="#000">Código</font></th>
                                                <th><font size="2" face="Verdana, Geneva, sans-serif" color="#000">Produto</font></th>
                                                <th><font size="2" face="Verdana, Geneva, sans-serif" color="#000">Quantidade</font></th>
                                            </tr>';

		            //CONTEÚDO DINÂMICO (ÍTENS CARRINHO):
		            foreach ($carrinho->contents() as $items) {
		                $msg_orcamento .= '	<tr>
		                                        <td align="center"><font size="1" face="Verdana, Geneva, sans-serif" color="#000">' . $items["options"]["modelo"] . '</font></td>
		                                        <td align="center"><font size="1" face="Verdana, Geneva, sans-serif" color="#000">' . $items["name"] . '</font></td>
		                                        <td align="center"><font size="1" face="Verdana, Geneva, sans-serif" color="#000">' . $items["qty"] . '</font></td>
		                                    </tr>';
        			}

        		$msg_orcamento .= '	</table>
		            			</div>
	                            <div style="border-top:3px solid #015383; margin-top:5px;">
	                                <h2><font size="3" face="Verdana, Geneva, sans-serif" color="#333333">Informações da Solicitação:</font></h2>
	                                <p>
	                                	<font size="1" face="Verdana, Geneva, sans-serif" color="#333333">
	                                    	<strong>Nome:</strong> ' . $array_orcamento["nome"] . '<br>';

			            if ($array_orcamento["telefone"] != NULL) {
			                $msg_orcamento .= '<strong>Telefone:</strong> ' . $array_orcamento["telefone"] . '<br>';
			            }

        				$msg_orcamento .= 	  '<strong>E-mail:</strong> ' . $array_orcamento["email"] . '<br>';

			            if ($array_orcamento["mensagem"] != NULL) {
			                $msg_orcamento .= '<strong>Mensagem:</strong> ' . $array_orcamento["mensagem"] . '<br>';
			            }

    			$msg_orcamento .='		</font>
	                            	</p>
	                            </div>
                            </td>
                        </tr>
                        <tr>
	                        <td colspan="2">
		                        <div style="border-top:3px solid #015383">
		                        	<p align="center">
                                        <a href="'. base_url() . '" title="' . $sistema["loja"] . '" target="_blank">' . base_url() . '</a>
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </body>
            </html>';
        /* FIM DA MENSAGEM EM HTML */

        return $msg_orcamento;

  	}
}
