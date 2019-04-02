<div class="banner">
<div id="carouselsite" class="carousel slide carousel-fade hidden-sm-down" data-ride="carousel">

    <ol class="carousel-indicators">
    
            <!--<li data-target="#carouselsite" data-slide-to="0" class="active"></li>
            <li data-target="#carouselsite" data-slide-to="1"></li>
            <li data-target="#carouselsite" data-slide-to="2"></li>
            <li data-target="#carouselsite" data-slide-to="3"></li>
            <li data-target="#carouselsite" data-slide-to="4"></li>-->
            
    </ol>

    <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid" src="<?php print base_url("assets/site/img/banner-site-1.jpg");?>" alt="" title="">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php print base_url("assets/site/img/banner-site-2.jpg");?>" alt="" title="">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php print base_url("assets/site/img/banner-site-3.jpg");?>" alt="" title="">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php print base_url("assets/site/img/banner-site-4.jpg");?>" alt="" title="">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php print base_url("assets/site/img/banner-site-5.jpg");?>" alt="" title="">
            </div>
    </div>
</div>
<!--<div id="carouselsite" class="carousel slide carousel-fade hidden-sm-down" data-ride="carousel">

    <ol class="carousel-indicators">
        <?php
        foreach ($banners->result() as $key => $lista_banner) {
            ?>
            <li data-target="#carouselsite" data-slide-to="<?php print $key; ?>" class="<?php ($key == 0) ? (print 'active') : (print ''); ?>"></li>
            <?php
        }
        ?>    
    </ol>

    <div class="carousel-inner" role="listbox">
        <?php
        foreach ($banners->result() as $key => $lista_banner) {
            ?>
            <div class="carousel-item <?php ($key == 0) ? (print 'active') : (print ''); ?>">
                <img class="d-block img-fluid" src="<?= $url_uploads.'assets/uploads/'.$pasta_uploads.'/banners/'.$lista_banner->ARQUIVO;?>" alt="<?php print $lista_banner->NM_LEGENDA; ?>" title="<?php print $lista_banner->NM_LEGENDA; ?>">


            </div>
            <?php
        }
        ?>
    </div>

</div>-->
</div>