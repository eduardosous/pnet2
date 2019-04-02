<?php

if(!function_exists('cartVerificaProdExiste'))
{
	/**
	 * VERIFICA SE O PRODUTO INFORMADO JÁ EXISTE NO CARRINHO
	 * @param  array $cart Todos os itens do carrinho
	 * @param  int $id   Id do produto a se verificar
	 * @return boolean       TRUE caso o produto 
	 */
	function cartVerificaProdExiste($cart, $id){
	    // ENQUANTO EXISTIR ITENS NO CARRINHO, VERIFIQUE SE O PRODUTO existe
	    foreach ($this->cart->contents() as $items) {
	    	// CASO O ITEM ATUAL SEJA O MESMO ID DO PRODUTO INFORMADO...
            if ($items['id'] == $id_produto) {
                $id_carrinho = $items['rowid'];
                $qntd = $items['qty'];
                return TRUE;
            }
        }
        return FALSE;
  	}
}
