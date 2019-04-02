<?php

/**
 * PRINTA A VARIÁVEL, CASO ELA EXISTA
 */
if(!function_exists('notNullPrint'))
{
	function notNullPrint($var){
	    
	    if( $var != null && $var != ''){
	      	print $var;
	    }
  	}
}

/**
 * CASO A VARIÁVEL NÃO EXISTA, 
 */
if(!function_exists('nullHide'))
{
	function nullHide($var){
	    
	    if ($var == ''){
	      	print 'hidden-xs-up';
	    }
  	}
}