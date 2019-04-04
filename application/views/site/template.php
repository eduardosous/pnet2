<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <title>Plataformanet - <?= $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php
        //CARREGA OS CSS PADRÕES
        $this->load->view('site/include/css.php');

        //FAVICON
        //$this->load->view('site/include/favicon.php');
        ?>

        <?php
        //CARREGA OS CSS NESCESSARIOS PARA CADA PÁGINA
        if (isset($FilesCss)) {
            foreach ($FilesCss as $css) {
                ?>
                <link href="<? print base_url('assets/site/') . $css . '.css'; ?>" rel="stylesheet">
                <?php
            }
        }
        ?>
        <?php
        //CARREGA O HELPER COM A LÓGICA PARA DEIXAR O LINK ATIVO
        $this->load->helper('ativo');
        ?>   
    </head>
    
    <!--VERIFICA A PÁGINA PARA PODER TROCAR A IMAGEM DE FUNDO-->
    <body id="<? print (isset($bodyImg))?($bodyImg):("");?>">

        <?php
          //CARREGA O TOPO
           $this->load->view('site/include/topo.php'); 
        ?>    
          
       
        <?php //CONTEUDO OUTRAS PÁGINAS   
          $this->load->view('site/include/conteudo.php');    
        ?>        
        
    </body>
    <?php
    //CARREGA OS JS PADRÕES
    $this->load->view('site/include/scripts.php');
    ?>
    
    <?php
    //CARREGA OS JS NESCESSARIOS PARA CADA PÁGINA
    if (isset($FilesJs)) {
        foreach ($FilesJs as $js) {
            ?>
            <script type="text/javascript" src="<? print base_url('assets/site/') . $js . '.js'; ?>"></script>
            <?php
        }
    }
    ?>

    

            
</html>