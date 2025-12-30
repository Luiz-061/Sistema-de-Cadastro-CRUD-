
<h1 class="title text-center">Atualizar o cadastro</h1>
<?php
require '../Model/UsuarioDTO.php';
require '../Model/usuarioModel.php';

$id = $_GET['id'];
$newusuario = new Usuario();
$usuarioModel = new UsuarioModel();
$newusuario = $usuarioModel->buscarUsuario($id);
?>
<link rel="stylesheet" href="./csss/caixa.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container">
    <form action="../Controler/ControleUsuario.php?ACAO=atualizar" id="form" method="post">
<input type="hidden" name="id" value="<?php echo $newusuario->getId(); ?>">    
<label for="nome">
        Nome:  <input type="text" style="width: 200px;" id="nome" name="nome" placeholder="Nome" value="<?php echo $newusuario->getNome(); ?>" maxlength="40" required>
    </label>
     <label for="email">
        Email:  <input  type="text" style="width: 300px;" id="email" name="email" placeholder="Email" value="<?php echo $newusuario->getEmail(); ?>" maxlength="40" required>
    </label>
    <input type="submit" class="btn btn-success" value="Atualizar" > <input class="btn btn-warning" type="reset" value="Limpar">
  
</form>
</div>
<script>
    let nome = document.querySelector('#nome');

let email = document.querySelector('#email');
let campos = document.querySelectorAll('input');

 
let erro = document.querySelectorAll('#erro');
const form = document.getElementById('form');
form.addEventListener('submit',(e)=>{
    let valido=true;
    if(!nome.value){
        console.log('campo vazio!');
        erro[0].innerHTML='campo vazio!';
        setTimeout(()=>{erro[0].innerHTML='';},3000);
        campos[0].style.border='2px red solid';
        e.preventDefault();
     }else if(nome.value.length<3){
        console.log('campo com menos de 3 caracteres!');
         erro[0].innerHTML='campo com menos de 3 caracteres!';
         setTimeout(()=>{erro[0].innerHTML='';},3000);
         campos[0].style.border='2px red solid';
         e.preventDefault();
     }else{
        console.log('campo validado!');
       
     }
     if(!email.value){
        console.log('campo vazio!');
        erro[1].innerHTML='campo vazio!';
        setTimeout(()=>{erro[1].innerHTML='';},3000);
        campos[1].style.border='2px red solid';
        e.preventDefault();
     }else if(!email.value.includes('@')){
        console.log('campo com menos de 3 caracteres!');
         erro[1].innerHTML='O email precisa conter o @!';
         setTimeout(()=>{erro[1].innerHTML='';},3000);
         campos[1].style.border='2px red solid';
         e.preventDefault();
     }else{
        console.log('campo validado!');
      
     }
    
    
});
</script>