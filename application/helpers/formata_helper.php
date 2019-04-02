<?php


if(!function_exists('reticencias'))
{
	/**
	 * Formata a string passada, incluindo reticencias no final(...) caso a string seja maior que o valor informado
	 * @param  String $texto 	texto a se verificar
	 * @param  int $max   		tamanho máximo para a String
	 * @return String        	O texto com reticências se for maior que $max, caso contrário retorna o mesmo texto
	 */
	function reticencias($texto, $max){
		if (strlen($texto) >= $max) {
			$retorno = substr($texto, 0, $max) . '...';
			// print_r($retorno);
			return $retorno;
		} else { 
			return $texto;
		}
	    
  	}
}
