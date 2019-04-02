<?php

if(!function_exists('ativo'))
{
	function ativo($pagAtual,$nomeMenu){
	    
	    if($pagAtual == $nomeMenu){
	      print 'active';
	    }
  	}
}

if(!function_exists('srAtivo'))
{
	function srAtivo($pagAtual,$nomeMenu){
	    
	    if($pagAtual == $nomeMenu){
	      print '<span class="sr-only">(current - atual)</span>';    
	    }
  	}
}
