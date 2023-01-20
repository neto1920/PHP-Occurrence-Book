<?php
require_once('func/valida_access.php'); 
require_once('template/header.php');

if (empty($_GET['tipo'])) {
    header('Location: home.php');
}
$tipo = $_GET['tipo'];
?>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="card home-card border-success mb-3" style="max-width: 18rem;">
                    <div class="card-body text-success">
                        <h5 class="card-title">Criar ocorrência</h5>
                        <a class="card-img" href="criar.php?tipo=<?=$tipo;?>">
                        <img src="assets/img/noticia.png" class="criar"></a>
                    </div>
                </div>                  
            </div>
            <div class="col">                
                <div class="card home-card border-success mb-3" style="max-width: 18rem;">
                    <div class="card-body text-success">
                        <h5 class="card-title">Consulta ocorrência</h5>
                        <a class="card-img" href="exibir.php?tipo=<?=$tipo;?>">
                        <img src="assets/img/consulta.png" class="consulta"></a>
                    </div>
                </div>
            </div>                
        </div>
    </div>
<?php
require_once('template/footer.php');
?>