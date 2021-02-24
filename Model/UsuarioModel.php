<?php

    /*
     Model de usuários
    */
    class usuarioModel
    {
        private $conn;
        
        function __construct()
        {
			$env = parse_ini_file('.env');
            $this->conn = mysqli_connect($env['DB_HOST'], $env['DB_USERNAME'], $env['DB_PASSWORD'], $env['DB_DATABASE']);

            if (!$this->conn) {
                echo "Error:Não pode conectar ao banco de dados." . PHP_EOL;
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }
 
        }
		
		public function buscaUsuario($nis){
			//capturo o NIS e protejo mysqly Injection
			$nis 	= mysqli_escape_string($this->conn,$nis);
			$query	= mysqli_query ($this->conn,"	select	*
													from	tb_usuario		as u
															, tb_status		as s
													where	u.cd_nis = '".$nis."'
													  and	u.id_status = s.id_status
												");
			$linha	= mysqli_fetch_object($query);
			$this->fechaConexao();
			return $linha;
		}
		
		public function cadastraUsuario($nome,$nis){
			//capturo o NIS e protejo mysqly Injection
			$nis 	= mysqli_escape_string($this->conn,$nis);
			//verifico se este NIS já existe no sistema;
			$query	= mysqli_query ($this->conn,"	select	*
													from	tb_usuario		as u
															, tb_status		as s
													where	u.cd_nis = '".$nis."'
													  and	u.id_status = s.id_status
												");
			$nr_linha	= mysqli_num_rows($query);
			
			if ($nr_linha>0){
				
				return 0;
			
			} else {
			
				$query	= mysqli_query ($this->conn,"	insert into	tb_usuario (nm_pessoa, cd_nis)
														values ('".$nome."','".$nis."')
													") or die(mysqli_error($this->conn));
			}
			$this->fechaConexao();
			return $query;
		}
		
		
		private function fechaConexao(){

            mysqli_close($this->conn);
        }
		

    }