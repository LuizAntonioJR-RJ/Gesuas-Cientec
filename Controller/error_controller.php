<?php

    /*
     Controller da Página Principal
    */
    class ErrorController
    {
        
		//instancio o controller da página
        public function principal($pagina,$data)
        {
			//echo 'A página '. $pagina .' não existe.';
            header('HTTP/1.1 404 Not Found');
            require_once  $data['home_url'] . 'View/error.php';
        }

    }