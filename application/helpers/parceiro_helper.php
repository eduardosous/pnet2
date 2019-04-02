<?php

if(!function_exists('carregaParceiro'))
{
	// FUNÇÃO QUE CARREGA PRODUTO
	 
	/**
	 * FUNÇÃO QUE CARREGA PRODUTO
	 * @param  OBJECT $parceiro 	Objeto que contém o array ($this) do servico
	 * @return array          	Devolve um array SOMENTE com os dados do servico
	 */
	function carregaParceiro($parceiro){

        $data['id_parceiro'] = $parceiro->id_parceiro;
        $data['parceiro'] = $parceiro->parceiro;
        //$data['link'] = $parceiro->link;
        $data['imagem'] = $parceiro->imagem;
        $data['status'] = $parceiro->ativo;
        

        return $data;   
  	}
  	
}


if(!function_exists('carregaParceiroPost'))

{
	// FUNÇÃO QUE CARREGA PRODUTO
	 
	/**
	 * FUNÇÃO QUE CARREGA PRODUTO
	 * @param  OBJECT $parceiro 	Objeto que contém o array ($this) do servico
	 * @return array          	Devolve um array SOMENTE com os dados do servico
	 */
	function carregaParceiroPost($parceiro){

        $data = array();
        $data['id_parceiro'] = trim($parceiro->post('id_parceiro',TRUE));
        $data['parceiro'] = trim($parceiro->post('parceiro',TRUE));
        $data['ativo'] = trim($parceiro->post('ativo',TRUE));
        $data['imagem'] = NULL;

        return $data;
	    
  	}

  	
}
