<?php

if(!function_exists('carregaProduto'))
{
    // FUNÇÃO QUE CARREGA PRODUTO
     
    /**
     * FUNÇÃO QUE CARREGA PRODUTO
     * @param  OBJECT $produto  Objeto que contém o array ($this) do produto
     * @return array            Devolve um array SOMENTE com os dados do produto
     */
    function carregaProduto($produto){

        $data['id_produto'] = $produto->id_produto;
        $data['produto'] = $produto->produto;
        $data['categoria'] = $produto->categoria;
        $data['subcategoria'] = $produto->subcategoria;
        $data['modelo'] = $produto->modelo;
        $data['codigo'] = $produto->codigo;
        $data['destaque'] = $produto->destaque;
        $data['link'] = $produto->link;
        $data['imagem'] = $produto->imagem;
        $data['status'] = $produto->ativo;
        $data['descricao'] = $produto->descricao;
        $data['ficha_tecnica'] = $produto->ficha_tecnica;
        $data['meta_titulo'] = $produto->meta_titulo;
        $data['meta_palavras'] = $produto->meta_palavras;
        $data['meta_descricao'] = $produto->meta_descricao;

        return $data;
    }
    
}


if(!function_exists('carregaProdutoPost'))
{
	// FUNÇÃO QUE CARREGA PRODUTO
	 
	/**
	 * FUNÇÃO QUE CARREGA PRODUTO
	 * @param  OBJECT $produto 	Objeto que contém o array ($this) do produto
	 * @return array          	Devolve um array SOMENTE com os dados do produto
	 */
	function carregaProdutoPost($produto){

        $data = array();
        ($produto->post('id_produto',TRUE) != NULL)?($data['id_produto'] = trim($produto->post('id_produto',TRUE))):($data['id_produto'] = NULL); ;
        $data['categoria'] = trim($produto->post('categoria',TRUE));
        ($produto->post('subcategoria',TRUE) != NULL)?($data['subcategoria'] = trim($produto->post('subcategoria',TRUE))):($data['subcategoria'] = NULL); ;
        $data['fabricante'] = trim($produto->post('fabricante',TRUE));
        $data['produto'] = trim($produto->post('produto',TRUE));
        $data['modelo'] = trim($produto->post('modelo',TRUE));
        $data['codigo'] = trim($produto->post('codigo',TRUE));
        $data['destaque'] = trim($produto->post('destaque',TRUE));
        $data['ativo'] = trim($produto->post('ativo',TRUE));
        $data['chamada'] = trim($produto->post('chamada',TRUE));
        $data['descricao'] = trim($produto->post('descricao',TRUE));
        $data['ficha_tecnica'] = trim($produto->post('ficha_tecnica',FALSE));
        $data['meta_titulo'] = trim($produto->post('meta_titulo',FALSE));
        $data['meta_palavras'] = trim($produto->post('meta_palavras',FALSE));
        $data['meta_descricao'] = trim($produto->post('meta_descricao',FALSE));
        $data['imagem'] = NULL;
        $data['pdf'] = NULL;

        return $data;
  	}  	
}
