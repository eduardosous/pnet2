<?php

if(!function_exists('carregaPdfProd'))
{     
    /**
     * FUNÇÃO QUE CARREGA A GALERIA
     * @param  OBJECT $produto  Objeto que contém o array ($this) do produto
     * @return array            Devolve um array SOMENTE com os dados do produto
     */
    function carregaPdfProd($pdf){

        $data['id_pdf'] = $pdf->id_pdf;
        $data['produto'] = $pdf->produto;
        $data['pdf'] = $pdf->pdf;
        $data['status'] = $pdf->ativo;

        return $data;
    }
    
}


if(!function_exists('carregaPdfProdPost'))
{	 
	/**
	 * FUNÇÃO QUE CARREGA A GALERIA ATRAVÉS DO POST
	 * @param  OBJECT $produto 	Objeto que contém o array ($this) do produto
	 * @return array          	Devolve um array SOMENTE com os dados do produto
	 */
	function carregaPdfProdPost($input){

        $data = array();
        $data['id_produto'] = trim($input->post('id_produto',TRUE));
        $data['id_pdf'] = trim($input->post('id_pdf',TRUE));
        $data['ativo'] = trim($input->post('ativo',TRUE));
        $data['arquivo'] = NULL;

        return $data;
	    
  	}

  	
}
