<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <script type="text/javascript">
         /*var ua = navigator.userAgent.toLowerCase();
            var uMobile = '';
            // === REDIRECIONAMENTO PARA iPhone, Windows Phone, Android, etc. ===
            // Lista de substrings a procurar para ser identificado como mobile WAP
            uMobile = '';
            uMobile += 'iphone;ipod;windows phone;android;iemobile 8';
            // Sapara os itens individualmente em um array
            v_uMobile = uMobile.split(';');
            // percorre todos os itens verificando se eh mobile
            var boolMovel = false;
            for (i=0;i<=v_uMobile.length;i++){
                if (ua.indexOf(v_uMobile[i]) != -1){
                    boolMovel = true;
                }
            }
            if (boolMovel == true){
                location.href='https://m.plataformanet.com.br/';
            } else {
                location.href='https://plataformanet.com.br/';
            }*/
        </script>

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

    <script>
       function goBack() {
       window.history.back();
     }
   </script>
    
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