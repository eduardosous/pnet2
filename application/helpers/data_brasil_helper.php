<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Trata a data para o padrão d/m/y Brasil.
 * @author Paulo Sobral. 
 * @copyright Paulo Sobral;
 * @param $data é a data no padrão SQL a-m-d;
 * @return é a palavra já tratada;
 */

if ( ! function_exists('data_brasil'))
{
    function data_brasil($data)
    {
   	  $ano = substr("$data", -10, 4);
      $mes = substr("$data", -5, 2);
      $dia = substr("$data", -2, 2);
      $data_brasil = "$dia/$mes/$ano";
      return $data_brasil;
    }
}
?>
