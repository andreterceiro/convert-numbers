<?php
require_once('config.php');
if ($_POST['cmdEnviar'] == 'Converter para romano') {
} elseif ($_POST['cmdEnviar'] == 'Converter para decimal') {
    try {
        require_once('libs/Roman.php');
        $romanConversor = new Roman($_POST['roman']);
        $viewManager->set(
            'result',
            $romanConversor->toDecimal()
        );
    } catch (Exception $e) {
        $viewManager->setError("O número romano para conversão é inválido");
    }
}
$viewManager->render("index");