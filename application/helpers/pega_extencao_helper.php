<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Verifica a extenção de algum arquivo.
 * @author Paulo Sobral. 
 * @copyright Paulo Sobral;
 * @param $url é a palavra a ser tratada;
 * @return é a palavra já tratada;
 */

if ( ! function_exists('pega_extencao'))
{
    function pega_extencao($arquivo)
    {
        $ext = explode(".", $arquivo);
        $extencao = strtolower(end($ext));
        return $extencao;
    }

}
?>
