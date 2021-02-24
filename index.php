<?php
require_once __DIR__.'/Controller/index_controller.php';

//variaveis de configuracao
$env = parse_ini_file('.env');
$data['pastaSistema'] = $env['PASTA'];
$data['home_url'] = __DIR__.'/';
$data['publico_url'] = $data['pastaSistema'].'/publico/'; //arquivos públicos

//rotas iniciais para as páginas
if (isset($_GET)){
	if ( isset($_GET['pagina']) and ($_GET['pagina']<>'')){
		$pagina = $_GET['pagina'];
	} else if (!isset($_GET['pagina'])){
		$pagina = 'index';
	} else {
		$pagina = 'index';
	}
}

//vejo se o arquivo do controller que o usuário pediu existe.
// e ja carrego o controller da pagina
// se nao existir eu carrego o controller de erro
if (file_exists(__DIR__.'/Controller/'.ucfirst($pagina).'_controller.php')){
	require_once __DIR__.'/Controller/'.ucfirst($pagina).'_controller.php';
	$controller = new IndexController();
	$controller->carregaController($pagina,$data);
	
} else {
	require_once __DIR__.'/Controller/error_controller.php';
	$error = new ErrorController();
	$error->principal($pagina,$data);
}




?>