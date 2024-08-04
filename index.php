<?php
namespace andreterceiro;
require_once('config.php');
use andreterceiro\libs\Decimal;
use andreterceiro\libs\Roman;

if ($_POST['cmdEnviar'] == 'Converter para romano') {
    try {
        require_once('libs/Decimal.php');
        $romanConversor = new Decimal($_POST['decimal']);
        $viewManager->set(
            'result',
            $romanConversor->toRoman()
        );
    } catch (\Exception $e) {
        // The exception message is in English. We wanna a portuguese message. Buecause of this we will not
        // use $e->getMessage()
        $viewManager->setError(
            'O número decimal passado deve ser maior que zero, menor que 4000 e um inteiro' .
            ' (não fracionário nem contendo letras)'
        );
    }
} elseif ($_POST['cmdEnviar'] == 'Converter para decimal') {
    try {
        require_once('libs/Roman.php');
        $romanConversor = new Roman($_POST['roman']);
        $viewManager->set(
            'result',
            $romanConversor->toDecimal()
        );
    } catch (\Exception $e) {
        // The exception message is in English. We wanna a portuguese message. Because of this we will not
        // use $e->getMessage()
        $viewManager->setError(
            'O número romano passado é inválido'
        );
    }
}
$viewManager->render("index");