<?php

if(!function_exists('listaHomeCat'))
{
	function listaHomeCat($array){

		// IMPRIME A LISTA PASSADA
		foreach ($array as $key => $cat){
			print '<a class="remove-decoration" href="'. base_url('produtos').'/'.$cat->NM_LINK.'"><li><div><i class="fa fa-search-plus" aria-hidden="true"></i></div> '.$cat->NM_CATEGORIA.'</li></a>';
		}
	    
  	}
}

if(!function_exists('listaBuscaTopo'))
{
	function listaBuscaTopo($arrayCat, $arrayProd){

		// IMPRIME A LISTA PASSADA
		 
		// print '<li class="tit-busca"> Categorias </li>';
		
		foreach ($arrayCat as $key => $item){
			print '<li>'.$item->NM_CATEGORIA.'</li>';
		}

		/*foreach ($arrayProd as $key => $item){
			print '<li><div><i class="fa fa-search-plus" aria-hidden="true"></i></div> '.$item->NM_CATEGORIA.'</li>';
		}*/
	    
  	}
}
