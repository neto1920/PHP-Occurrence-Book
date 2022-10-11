<?php
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    
    $informacoes_posto = str_replace('#', "-", $_POST['informacoes_posto']);
    $patrulheiro = str_replace('#', "-", $_POST['patrulheiro']);
    $os_aberta = str_replace('#', "-", $_POST['os_aberta']);
    $preventiva_env = str_replace('#', "-", $_POST['preventiva_env']);
    $obs_plantao = str_replace('#', "-", $_POST['obs_plantao']);

   
    if(empty(($informacoes_posto) && ($patrulheiro) && ($os_aberta) && ($preventiva_env) && ($obs_plantao))) {
        echo '
            <div class="text-danger">
                Nescessário preencher os campos
            </div>
        ';
    };

    $texto = $informacoes_posto . "#" . $patrulheiro . "#" . $os_aberta . "#" . $preventiva_env . "#" . $obs_plantao . PHP_EOL;

    $patrulha = fopen("../screens/patrulha/arquivo.hd", "a");
    fwrite($patrulha, $texto);
    fclose($patrulha);

    header('Location: ../screens/patrulha/exibir_ocorrencias.php');
?>