<?
//CARREGA CLASSE PARA VERIFICAÇÃO DE DISPOSITIVOS IPAD E TABLETS
if($this->mobile->isMobile() && !$this->mobile->isTablet()){
?>
<div id="wrapper-home-mobile">     
<?
}else{
?>
<div id="wrapper-home">         
<?
}
?>    
    <div id="contents">
        <main>
            <?= $contents; ?>
        </main>
    </div>
    <?php $this->load->view('site/include/rodape.php'); ?>    
</div>

