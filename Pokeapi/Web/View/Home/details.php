<?php include_once '../View/inc/Layout/inicio.php'; ?>



<a name="lista"></a>
<section id="feature" >
    <div class="container">
        <div cass>
            <img src="Web/View/inc/Layout/images/poker_title.jpg" class="img-responsive">
            <br>
            <h2>Detalhes do Pokemon</h2>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6 col-md-offset-2">	
                <div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="media">
                        <div class="pull-left">
                            <a href="#"><img class="media-object" src="<?php echo $pokemon->getFoto(); ?>" alt=""></a>
                        </div>

                        <div class="media-body">
                            <h2>Nome: <?php echo $pokemon->getNome(); ?></h2>
                            <h4>Tipo: <?php echo $pokemon->getStructTipo(); ?></h4>

                        </div>
                    </div><!--/.media -->
                    <p><b>Habilidades:</b> <br><?php echo $pokemon->getStructHabilidade(); ?></p>
                    <p><b>Movimentos:</b> <br><?php echo $pokemon->getStructMovimento();?></p>
                    <br>
                     <a href="?pag=<?php echo $pag?>&back#lista" class="btn btn-danger" role="button">Voltar</a>
                </div>
            </div>
    </div><!--/.container-->
</section><!--/#feature-->


<?php include_once '../View/inc/Layout/fim.php' ?>;

