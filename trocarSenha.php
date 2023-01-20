<?php
require_once('func/valida_access.php'); 
require_once('template/header.php');

if (isset($_GET['erro'])) {
    switch ($_GET['erro']) {
        case 1: $msgErro = 'Senha atual invalida'; break;
        case 2: $msgErro = 'As senhas digitadas não conferem'; break; 
    }
}
?>
    <div class="container-fluid">  
        <div class="row">
            <div class="justify-content-center">
                <div class="card col-9  top-50 start-50 translate-middle mt-1 bi bi-caret-down-fill">
                    <div class="card-header">
                        Troque sua senha
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="func/troca_senha.php">        
                                    <br>
                                    <div class="form-group">
                                        <label>Senha atual:</label>
                                        <input name="senha_atual" type="password" class="form-control" required/>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label>Nova Senha</label>
                                        <input name="nova_senha" type="password" class="form-control" required/>
                                    </div>                    
                                    <br>
                                    <div class="form-group">
                                        <label>Repetir Nova Senha</label>
                                        <input name="repetir_senha" type="password" class="form-control" required/>
                                    </div>                    
                                    <br>
                                    <div class="col-6 d-grid justify-content-end">
                                        <?php 
                                        if (isset($msgErro)) { ?>
                                            <div class="text-danger"><?=$msgErro?></div>
                                        <?php } elseif (isset($_GET['success'])) { ?>
                                            <div class="text-success">Senha alterada com Sucesso</div>
                                        <?php }?>             
                                        <button class="btn btn-lg btn-info btn-block" type="submit">Confirmar</button>
                                    </div>
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once('template/footer.php');
?>