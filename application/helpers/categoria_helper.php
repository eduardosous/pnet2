<?php

if(!function_exists('separaArray'))
{
	function separaArray($categorias){
	    
	    $tamanhoArray = count($categorias);
	    $metadeArray = (int) (($tamanhoArray) / 2);
	    
	    /*print_r("tamanho array: ".$tamanhoArray);
	    print_r("metade array: ".$metadeArray);*/

	    $arraysCats[1] = array_slice($categorias, 0, $metadeArray);
	    $arraysCats[2] = array_slice($categorias, $metadeArray, $tamanhoArray );

	    /*print_r(" metade 1: ".count($arraysCats[1]));
	    print_r(" metade 2: ".count($arraysCats[2]));*/

	    return $arraysCats;
  	}
}

if(!function_exists('catCheckUnica'))
{	
	/**
	 * VERIFICA SE A CATEGORIA É ÚNICA OU NÃO
	 * @param  OBJECT $cat 		Objeto da categoria atual da iteração
	 * @param  int 	$i   		Índice da iteração
	 * @param  boolean 	$print  Informa se é para imprimir o item do menu, ou não
	 * @return  True se for única, false se não for única
	 */
	function catCheckUnica($cat, $i, $print){
	    
	    // CASO NÃO SEJA UNICA
	    if ($cat->UNICA == 0){
	    	// CASO A VARIÁVEL $print SEJA TRUE...
	    	if ($print) {
	      		print '<button class="btn btn-block btn-secondary" data-toggle="collapse" data-target="#collapse'.$i.'"><h3>'.$cat->NM_CATEGORIA.'</h3> </button>';
	    	}
	    } 

	    // CASO SEJA UNICA
	    else {
	    	// CASO A VARIÁVEL $print SEJA TRUE...
	    	if ($print) {
	    		print '<a href="'.base_url('produtos/').$cat->NM_LINK.'"><button class="btn btn-block btn-secondary"><h3>'.$cat->NM_CATEGORIA.'</h3></button></a>';
	    	}
	    }
	    
  	}
}