<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Trata a url para ser amigável.
 * @author Paulo Sobral. 
 * @copyright Paulo Sobral;
 * @param $url é a palavra a ser tratada;
 * @return é a palavra já tratada;
 */

if ( ! function_exists('tratar_url'))
{
    function tratar_url($url)
    {
        $array1 = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
                     , "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" );
        $array2 = array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c"
                     , "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" );
        $url =  str_replace( $array1, $array2, $url ); 
        
        //REMOVER ACENTOS E CONVERTER EM MINUSCULAS
        $url=trim(strtolower($url));
        
        //REMOVER ASPAS E APOSTROFO
        $url=str_replace("\'","",$url);
        
        //REMOVER PORCENTAGEM
        $url=str_replace("%","",$url);
        
        //REMOVER PONTO E VIRGULA
        $url=str_replace(";","",$url);
        
        //REMOVER VIRGULA
        $url=str_replace(",","",$url);
        
        //REMOVER DOIS PONTOS
        $url=str_replace(":","",$url);
        
        //REMOVER ECOMERCIAL
        $url=str_replace("&","",$url);
        
        //REMOVER ç
        $url=str_replace("ç","",$url);
        
        //REMOVER &
        $url=str_replace("&","",$url);
        
        //REMOVER $
        $url=str_replace("$","",$url);
        
        //REMOVER ?
        $url=str_replace("?","",$url);
        
        //REMOVER -
        $url=str_replace("-","",$url);
        
        //REMOVER .
        $url=str_replace(".","",$url);
        
        //TROCAR ESPAÇOS POR -
        $url=str_replace("  "," ",$url);
        
        $url=str_replace(" ","-",$url);
        
        //TROCAR BARRA POR -
        $url=str_replace("/","-",$url);
        return $url;

    }

}
?>
