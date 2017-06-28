<?php include_once '../View/inc/Layout/inicio.php'; ?>




<a name="lista"></a>
<section id="feature" >
    <div class="container">
        <div cass>
            <img src="Web/View/inc/Layout/images/poker_title.jpg" class="img-responsive">
            <p class="lead">Abaixo segue a lista de pokémons disponíves, você poderá ver detalhes do mesmo clicando em sua foto</p>
        </div>

        <div class="row">
            <?php 
            $i = 1;
            foreach ($listaPokemon as $pokemon) {
                if ($i == 1) {
                    ?>
                    <div class="col-sm-12 col-md-12">
                    <?php } ?>
                    <div class="col-sm-4 col-md-3">
                        <div class="thumbnail">
                            <img src="<?php echo $pokemon->getFoto(); ?>" alt="...">
                            <div class="caption">
                                <h3><?php echo $pokemon->getNome();?></h3>
                                <p>Tipo: <?php echo $pokemon->getStructTipo()?></p>
                                <p><a href="?action=details&id=<?php echo $pokemon->getId();?>&pag=<?php echo $pag;?>#lista" class="btn btn-primary" role="button">Detalhes</a></p>
                            </div>
                        </div>
                    </div>
                    <?php if ($i == 4) { ?>
                    </div>
                <?php }$i++; if($i == 5) $i=1;} ?>
        </div>
        <br>
        <div class="row" align="center">
            <a href="?pag=<?php if($pag>=2) echo $pag-1; ?>#lista" <?php if($pag == 1) echo "disabled"?> class="btn btn-danger" role="button">Anterior</a> <a href="?pag=<?php echo $pag+1?>#lista" class="btn btn-danger" role="button">Próximo</a>
        </div>


    </div><!--/.container-->
</section><!--/#feature-->


<?php include_once '../View/inc/Layout/fim.php' ?>;

