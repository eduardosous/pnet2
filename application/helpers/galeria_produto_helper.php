<?php

if(!function_exists('carregaGaleriaProd'))
{     
    /**
     * FUNÇÃO QUE CARREGA A GALERIA
     * @param  OBJECT $produto  Objeto que contém o array ($this) do produto
     * @return array            Devolve um array SOMENTE com os dados do produto
     */
    function carregaGaleriaProd($galeria){

        $data['id_galeria'] = $galeria->id_galeria;
        $data['produto'] = $galeria->produto;
        //$data['hexa_cor'] = $galeria->hexa_cor;
        $data['legenda'] = $galeria->legenda;
        $data['descricao'] = $galeria->descricao;
        $data['imagem'] = $galeria->imagem;
        $data['status'] = $galeria->ativo;

        return $data;
    }
    
}


if(!function_exists('carregaGaleriaProdPost'))
{	 
	/**
	 * FUNÇÃO QUE CARREGA A GALERIA ATRAVÉS DO POST
	 * @param  OBJECT $produto 	Objeto que contém o array ($this) do produto
	 * @return array          	Devolve um array SOMENTE com os dados do produto
	 */
	function carregaGaleriaProdPost($input){

        $data = array();
        $data['id_produto'] = trim($input->post('id_produto',TRUE));
        $data['id_galeria'] = trim($input->post('id_galeria',TRUE));
        $data['ativo'] = trim($input->post('ativo',TRUE));
        $data['legenda'] = trim($input->post('legenda',TRUE));
        //$data['hexa_cor'] = trim($input->post('hexa_cor',TRUE));
        $data['descricao'] = trim($input->post('descricao',TRUE));
        $data['arquivo'] = NULL;

        return $data;
	    
  	}

  	
}
