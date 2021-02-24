<?php

    /*
     Controller da Página Principal
    */
    class CadastrarController
    {
        public $titulo;
        public $descricao;
        public $texto;
        public $msg = '';
        
        function __construct()
        {
            require_once 'Model/UsuarioModel.php'; 
        }
        public function principal($data)
        {
            $this->titulo         = 'Cadastro de Usuário Caixa';
            $this->descricao      = 'Página de Cadastro de número NIS de Usuário Caixa';
            $this->texto          = 'Cadastro de Usuário/NIS.';

            //se o usuário enviou o formulário
            if ($_POST){
                $nm_usuario =   trim(addslashes($_POST['nome']));
                $this->geraNis();
                
                if ( (strlen($nm_usuario)<11) or (strlen($nm_usuario)>200) ){
                    $this->msg .= '<div class="alert alert-danger">Nome deve possuir entre 20 e 200 caracteres.</div>';
                }

                //se tiver erro eu ja carrego a view e mostro a mensagem de erro;
                if ($this->msg<>''){
                    require_once  $data['home_url'] . 'View/usuario_cadastrar.php';
                    exit;  
                } else {

                    $bd             = new usuarioModel();
                    $resultado      = $bd->cadastraUsuario($nm_usuario,$this->nis);
                    if ($resultado==1){
                        $this->msg .= '<div class="alert alert-success">Usuário cadastrado com sucesso!<br> Seu Nis: '.$this->nis.'</div>';
                    } else {
                        $this->msg .= '<div class="alert alert-danger">Ocorreu algum erro inesperado ao cadastrar usuário. Por favor tente novamente.</div>';
                    }
                }
            }


			require_once  $data['home_url'] . 'View/usuario_cadastrar.php';

            
        }

        private function geraNis(){
            
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i <= 11; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
                $this->nis = $randomString;
                
            

        }

    }