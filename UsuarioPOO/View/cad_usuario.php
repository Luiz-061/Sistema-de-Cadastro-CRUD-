
<!-- A acao na url é a Execução de como o sera tratado os dados inseridos como: 'cadastrar', 'atualizar' e 'excluir' -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" href="caixa.css">
<div class="caixa">
    <form id="form" action="./Controler/ControleUsuario.php?ACAO=cadastrar" method="post">
    
    <label for="nome">
        <p class="text-danger" id="erro"></p>  
        Nome:  <input type="text" id="nome" class="form-group" name="nome" placeholder="Nome" maxlength="40" autocomplete="off" >
      
    </label>
    
    <label for="email">
                     <p class="text-danger" id="erro"></p>
        Email:  <input type="text" id="email" class="form-group"  name="email" placeholder="Email" maxlength="40" autocomplete="off" >
        
    </label>
    <input type="submit" value="Cadastrar" class="btn btn-primary"> <input class="btn btn-warning" type="reset" value="Limpar">
    <!-- não é a toa que o imput esteja com o value e nome da acao guardada na variavel no controler -->
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