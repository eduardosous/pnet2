<?php

if(!function_exists('carregaProduto'))
{
	// FUNÇÃO QUE CARREGA PRODUTO
	 
	/**
	 * FUNÇÃO QUE CARREGA PRODUTO
	 * @param  OBJECT $servico 	Objeto que contém o array ($this) do servico
	 * @return array          	Devolve um array SOMENTE com os dados do servico
	 */
	function carregaServico($servico){

        $data['id_servico'] = $servico->id_servico;
        $data['servico'] = $servico->servico;
        $data['link'] = $servico->link;
        $data['imagem'] = $servico->imagem;
        $data['status'] = $servico->ativo;
        $data['descricao'] = $servico->descricao;
        $data['meta_titulo'] = $servico->meta_titulo;
        $data['meta_palavras'] = $servico->meta_palavras;
        $data['meta_descricao'] = $servico->meta_descricao;

        return $data;   
  	}
  	
}


if(!function_exists('carregaServicoPost'))

{
	// FUNÇÃO QUE CARREGA PRODUTO
	 
	/**
	 * FUNÇÃO QUE CARREGA PRODUTO
	 * @param  OBJECT $servico 	Objeto que contém o array ($this) do servico
	 * @return array          	Devolve um array SOMENTE com os dados do servico
	 */
	function carregaServicoPost($servico){

        $data = array();
        $data['id_servico'] = trim($servico->post('id_servico',TRUE));
        $data['servico'] = trim($servico->post('servico',TRUE));
        $data['descricao'] = trim(addslashes($servico->post('descricao',TRUE)));
        $data['meta_titulo'] = trim(addslashes($servico->post('meta_titulo',TRUE)));
        $data['meta_palavras'] = trim(addslashes($servico->post('meta_palavras',TRUE)));
        $data['meta_descricao'] = trim(addslashes($servico->post('meta_descricao',TRUE)));
        $data['ativo'] = trim($servico->post('ativo',TRUE));
        $data['imagem'] = NULL;

        return $data;
	    
  	}

  	
}
