<?php

if(!function_exists('carregaPortfolio'))
{
    // FUNÇÃO QUE CARREGA PORTFOLIO
     
    /**
     * FUNÇÃO QUE CARREGA PORTFOLIO
     * @param  OBJECT $portfolio  Objeto que contém o array ($this) do portfolio
     * @return array            Devolve um array SOMENTE com os dados do portfolio
     */
    function carregaPortfolio($portfolio){

        $data['id_portfolio'] = $portfolio->id_portfolio;
        $data['portfolio'] = $portfolio->portfolio;
        $data['imagem'] = $portfolio->imagem;
        $data['destaque'] = $portfolio->destaque;
        $data['status'] = $portfolio->ativo;
        
        return $data;
    }
    
}


if(!function_exists('carregaPortfolioPost'))
{
	// FUNÇÃO QUE CARREGA PORTFOLIO
     
        /**
         * FUNÇÃO QUE CARREGA PORTFOLIO
         * @param  OBJECT $portfolio  Objeto que contém o array ($this) do portfolio
         * @return array            Devolve um array SOMENTE com os dados do portfolio
         */
	function carregaPortfolioPost($portfolio){

        $data = array();
        ($portfolio->post('id_portfolio',TRUE) != NULL)?($data['id_portfolio'] = trim($portfolio->post('id_portfolio',TRUE))):($data['id_portfolio'] = NULL);
        $data['portfolio'] = trim($portfolio->post('portfolio',TRUE));
        $data['ativo'] = trim($portfolio->post('ativo',TRUE));
        $data['destaque'] = trim($portfolio->post('destaque',TRUE));
        $data['imagem'] = NULL;

        return $data;
  	}  	
}
