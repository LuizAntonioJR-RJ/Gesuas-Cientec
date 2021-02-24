<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $this->titulo;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="@@title">
<meta name="author" content="Themesberg">
<meta name="description" content="<?php echo $this->descricao;?>">

 
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<link type="text/css" href="<?php echo $data['publico_url'];?>css/style.css" rel="stylesheet">

 
</head>

<body>
<header class="header-global" id="home">
    <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom @@classes">
        <div class="container position-relative">
            <a class="navbar-brand mr-lg-4" href="<?php echo $data['pastaSistema'];?>">
                <img class="navbar-brand-dark" src="<?php echo $data['publico_url'];?>/img/light.svg" alt="Logo light">
            </a>
            <div class="navbar-collapse collapse mr-auto" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="<?php echo $data['home_url'];?>">
                                <img src="<?php echo $data['publico_url'];?>/img/dark.svg" alt="Logo dark">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                </div>
                <?php include 'View/inc/menu.php';?>
            </div>
            <div class="d-flex align-items-center">
                <a href="<?php echo $data['pastaSistema'];?>?pagina=cadastrar"  class="btn btn-md btn-tertiary text-white d-none d-md-inline animate-up-2">Cadastrar Usuário<i class="fas fa-rocket ml-2"></i></a>
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>

    <main>
        <!-- Hero -->
        <section class="section section-header text-dark pb-md-8">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center mb-5 mb-md-7">
                        <h1 class="display-2 font-weight-bolder mb-4">
                            Resultado da busca <?php echo $this->emoji;?>
                        </h1>
                        <p class="lead mb-4 mb-lg-5"> <?php echo $this->resultado?></p>
                        <p class="text-center">
                        <?php
                            if ($this->sucesso==true){
                                echo  '<span style="width:200px;display:block;margin:0 auto">'.$this->svg ."</span>";
                                echo  '<h3>'. $dadosBD->nm_pessoa . '</h3>';
                                echo  '<h4>'. $dadosBD->cd_nis . '</h4>';
                                echo  '<h5>Cadastrado em: '. date("d/m/Y H:i:s", strtotime($dadosBD->dt_cadastro)) . '</h5>';
                                echo  '<h5>Status: '. $dadosBD->nm_status . '</h5>';
                            }
                        ?>
                        </p>
                         
						
						
						
                    </div>

                </div>
            </div>
        </section>
         
    </main>


<?php include 'View/inc/footer.php';?>
 


</body>

</html>