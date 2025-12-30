<script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Tem certeza que deseja excluir o usuário?')
    }
</script>
<?php

require './Model/UsuarioDTO.php';
require './Model/UsuarioModel.php';

$usuarioModel = new UsuarioModel();
$us = $usuarioModel->listar();

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 

<table class="table">
    <tr>
        <td>Nome</td>
        <td>Email</td>
        <td>Ação</td>
    </tr>
</table>
<table class="table" >
<?php foreach($us as $us){ ?>
   <tr>
    <td class="col"><?php echo $us['nome']; ?></td>
    <td class="col"><?php echo $us['email']; ?></td>
    <td class="col"><button class="btn btn-success" ><a style="text-decoration: none;color:white;" href="View/atualizar.php?id=<?= $us['id']?>" >Atualizar</a></button></td>
    <td class="col"><button class="btn btn-danger"><a style="text-decoration: none; color:white;" href="Controler/ControleUsuario.php?ACAO=excluir&id=<?=$us['id']?>" onclick="return checkDelete()">Apagar</a></button></td>
    </tr>
<?php } ?>
</table>

