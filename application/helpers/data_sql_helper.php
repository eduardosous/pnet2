<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Trata a data para o padrão y/m/d Sql.
 * @author Paulo Sobral. 
 * @copyright Paulo Sobral;
 * @param $data é a data no padrão Brasil d-m-y;
 * @return é a palavra já tratada;
 */


if(!function_exists('data_sql'))
{
function data_sql($z)
{
	$data1 = explode ("/","$z");
	$data2[0] = $data1[2];
	$data2[1] = $data1[1];
	$data2[2] = $data1[0];
	$data3 = implode ("-",$data2);
	return $data3;
  }
}

?>
