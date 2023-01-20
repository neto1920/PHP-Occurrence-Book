<?php 
require_once('func/valida_access.php');
require_once('template/header.php');
?>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="card home-card border-success mb-3" style="max-width: 18rem;">
                        <div class="card-body text-success">
                            <h5 class="card-title">Portaria</h5>
                            <a class="card-img" href="ocorrencia.php?tipo=lider">
                            <img src="assets/img/lider.png" class="lider"></a>
                        </div>
                    </div>                  
                </div>
                <div class="col">                
                <div class="card home-card border-success mb-3" style="max-width: 18rem;">
                    <div class="card-body text-success">
                        <h5 class="card-title">Monitoramento</h5>
                        <a class="card-img" href="ocorrencia.php?tipo=patrulha">
                        <img src="assets/img/patrulha.png"></a>
                    </div>
                </div>                
            </div>
        </div>
<?php
require_once('template/footer.php');
?>