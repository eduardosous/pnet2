<?php

if(!function_exists('jsAlert'))
{
	function jsAlert($msg, $pagina, $back){
	    
	    print "<meta name=\"robots\" content=\"noindex,nofollow\">";
	    print "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	    print "<script type=\"text/javascript\">
                        alert(\"".$msg."\");";
	    // CASO A VARIÁVEL $back SEJA INFORMADA COMO TRUE, VOLTA UMA PÁGINA, E IGNORA A PÁGINA ENVIADA
	    if ($back) {
	    	print "window.history.go(-1);";
	    } 

	    // CASO CONTRÁRIO, REDIRECIONA PARA A PÁGINA INFORMADA
	    else { 
	    	print "window.location.href = \"" . base_url($pagina) . "\";";
            // redirect( base_url($pagina), 'refresh');
	    }

		print "</script>";
  	}
}


if(!function_exists('uploadImgAlert'))
{
	function uploadUpdateImgAlert($nomePagina, $imagem, $pagina){


		//MENSAGEM PARA O USÚARIO:
        if($imagem != FALSE)
        {
            $msg = $nomePagina.' atualizado com sucesso!';
        }
        else
        {
            if($imagem == FALSE && $_FILES['arquivo']['name'] != NULL)
            {
                $msg = $nomePagina.' atualizado com sucesso, porém não foi possível realizar o upload da imagem. Verifique os detalhes de upload no ícone de ajuda (?).';
            }
            else
            {
                $msg = $nomePagina.' atualizado com sucesso!';
            }
        }
        jsAlert($msg, $pagina, FALSE);
  	}
}
