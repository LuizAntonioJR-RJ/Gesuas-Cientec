<?php

    /*
     Controller da Página Principal
    */
    class IndexController
    {
        
		//instancio o controller da página
        public function carregaController($pagina,$data)
        {
			if ($pagina=='index'){
				$data['titulo'] = 'Sistema de Usuários Caixa para Pagamento de Benefícios'; //para SEO e para a home_url
				$data['descricao'] = 'Busca usuários caixa pelo número do NIS - Veja os status e os dados dos usuários caixa';
				$data['texto']	= 'Sistema de cadastro e gerenciamento de cidadãos para pagamento Caixa de benefícios sociais';
				require_once  $data['home_url'] . 'View/index.php';
				
			} else {
				$controllerName = ucfirst($pagina).'Controller';
				$controller		= new $controllerName($data);
				$controller->principal($data);
            }
        }

    }