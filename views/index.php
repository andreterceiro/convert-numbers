<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" /></script>

    <title>Conversor</title>

    <style>
        input[type=text] {
            width: 110px;
        }
        #errors {
            padding: 10px;
            margin-top: 10px;
            border: 1px dotted #800;
            background-color: #FBB;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <span class="col-7" style="background-color: #DDF">
                <form method="post">
                    Número romano (I a MMMXMXCIX):
                    <input type="text" name="roman" value="<?php echo $viewManager->safeGetRequest('roman'); ?>" />
                    <input type="submit" name="cmdEnviar" value="Converter para decimal" />   
                </form>
            </span>
            <span class="col-5" style="background-color: #DDF">
                <form method="post">
                    Número decimal:
                    <input type="text" name="decimal" value="<?php echo $viewManager->safeGetRequest('decimal'); ?>" />
                    <input type="submit" name="cmdEnviar" value="Converter para romano" />
                </form>
            </span>
        </div>
        <hr />
        <?php 
            $result = $viewManager->get('result');

            if ($result) {
        ?>
                <div id="result">
                    <h2>Resultado</h2>
                    O número desejado é <?php echo $viewManager->get('result'); ?>
                </div>
        <?php
            }

            $erros = $viewManager->getErrors();

            if (!empty($erros)) {
        ?>
                <div id="errors">
                    <h2>Erro(s)</h2>
                    <?php
                        foreach ($erros as $erro) {
                            echo "<li>$erro</li>";
                        }
                    ?>
                </div>
        <?php
            }
        ?>
</body>
</html>