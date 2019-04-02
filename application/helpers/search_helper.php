<?php

if(!function_exists('verifica_dispositivo'))
{
	function verifica_dispositivo($userAgent){
		// print_r($userAgent);
		if ($userAgent->is_robot())
		{
		    // $agent = $userAgent->robot();
		    $dispUsuario = "robo";
		}
		else if (!$userAgent->is_mobile())
		{
	        // $agent = $userAgent->browser().' '.$userAgent->version();
	        $dispUsuario = "desktop";
		}
		else if ($userAgent->is_mobile())
		{
		    // $agent = $userAgent->mobile();
		    $dispUsuario = "mobile";
		}
		else
		{
		    // $agent = 'Unidentified User Agent';
		    $dispUsuario = "Dispositivo não identificado";
		}
		// print_r($dispUsuario);
		return $dispUsuario;
  	}
}


if(!function_exists('ajusta_busca_menu'))
{
	function ajusta_busca_menu($userAgent){
		
		$dispUsuario = verifica_dispositivo($userAgent);

		if ($dispUsuario == 'desktop') {
			return 'bottom';
		} elseif ($dispUsuario == 'mobile') {
			return 'right';
		}

		return $dispUsuario;
  	}
}
