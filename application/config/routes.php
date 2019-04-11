<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'site/HomeCtrl';
$route['empresa'] = 'site/EmpresaCtrl';
$route['blogs'] = 'site/BlogCtrl';
$route['blog/(:any)'] = 'site/BlogCtrl/blog/$1';
$route['servicos'] = 'site/ServicosCtrl';
$route['servico/(:any)'] = 'site/ServicosCtrl/servico/$1';
$route['portfolio'] = 'site/PortfolioCtrl';
$route['orcamento'] = 'site/OrcamentoCtrl';
$route['contato'] = 'site/ContatoCtrl';
$route['enviar_contato'] = 'site/EmailCtrl/enviaContato';
$route['enviar_servico'] = 'site/EmailCtrl/enviaServico';



// PRODUTOS
$route['produtos'] = 'site/ProdutosCtrl';
$route['produtos/(:any)'] = 'site/ProdutosCtrl/index/$1';
$route['produtos/(:any)/(:any)'] = 'site/ProdutosCtrl/index/$1/$2';
$route['produto/(:any)'] = 'site/ProdutosCtrl/produto/$1';

// ORÇAMENTO/CARRINHO
$route['orcamento'] = 'site/OrcamentoCtrl';
$route['add_carrinho/(:any)'] = 'site/OrcamentoCtrl/add_carrinho/$1';
$route['atualiza_carrinho/(:any)/(:any)'] = 'site/OrcamentoCtrl/atualiza_carrinho/$1/$2';
$route['remove_carrinho/(:any)'] = 'site/OrcamentoCtrl/remove_carrinho/$1';

// ENVIO DE E-MAILS
$route['enviar_contato'] = 'site/EmailCtrl/enviaContato';
$route['enviar_orcamento'] = 'site/EmailCtrl/enviaOrcamento';


$route['404_override'] = 'site/Erro404Ctrl/erro404';
$route['translate_uri_dashes'] = FALSE;