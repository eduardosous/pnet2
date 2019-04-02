<?php

if(!function_exists('carregaGaleriaServ'))
{     
    /**
     * FUNÇÃO QUE CARREGA A GALERIA
     * @param  OBJECT $servico  Objeto que contém o array ($this) do servico
     * @return array            Devolve um array SOMENTE com os dados do servico
     */
    function carregaGaleriaServ($galeria){

        $data['id_galeria'] = $galeria->id_galeria;
        $data['servico'] = $galeria->servico;
        $data['legenda'] = $galeria->legenda;
        $data['descricao'] = $galeria->descricao;
        $data['imagem'] = $galeria->imagem;
        $data['status'] = $galeria->ativo;

        return $data;
    }
    
}


if(!function_exists('carregaGaleriaServPost'))
{	 
	/**
	 * FUNÇÃO QUE CARREGA A GALERIA ATRAVÉS DO POST
	 * @param  OBJECT $servico 	Objeto que contém o array ($this) do servico
	 * @return array          	Devolve um array SOMENTE com os dados do servico
	 */
	function carregaGaleriaServPost($input){

        $data['id_galeria'] = trim($input->post('id_galeria',TRUE));
        $data['id_servico'] = trim($input->post('id_servico',TRUE));
        $data['legenda'] = trim($input->post('legenda',TRUE));
        $data['descricao'] = trim($input->post('descricao',TRUE));
        $data['ativo'] = trim($input->post('ativo',TRUE));
        $data['imagem'] = NULL;

        return $data;
	    
  	}

  	
}
