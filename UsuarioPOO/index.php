<!DOCTYPE html>
<html lang="pt-br">
    <?php $msg = @$_GET['MSG'];
    if($msg != null or $msg = ''){
        echo "<script>alert('$msg')</script>";
    } echo "</div>";
    if(isset($msg)){
        unset($msg);
    }
    // Execução da variável criada naquele header
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="caixa">
            <h1 class="title" style="text-align: center;">Sistema de Cadastro</h1>
            <br>
            <?php include_once 'View/cad_usuario.php'; ?>
        </div>
        <div>
            <?php include_once 'View/lista_usuario.php'; ?>
        </div>
    </div>
     
</body>
</html>