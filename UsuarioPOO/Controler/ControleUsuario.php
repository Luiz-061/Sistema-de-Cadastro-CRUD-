<?php
require_once '../Model/UsuarioDTO.php';
require_once '../Model/UsuarioModel.php';
    
    $id = @$_POST['id'];
    $nome = @$_POST['nome'];
    $email = @$_POST['email'];
    $acao = @$_GET['ACAO'];

    $newusuario = new Usuario();
    $newusuario->setId($id);
    $newusuario->setNome($nome);
    $newusuario->setEmail($email);

    $usuarioModel = new UsuarioModel();

    switch($acao){
        case 'cadastrar':
            $nusuario = $usuarioModel->cadastrar($newusuario);
            if($nusuario >= 1){
                header('Location:../index.php?&MSG= Cadastro realizado com sucesso!');
            }else{
                 header('Location:../index.php?&MSG= Não foi possível cadastrar o usuario! tente novamente.');
            }
            break;
            case 'atualizar':
                $usuario = $usuarioModel->atualizar($newusuario);
                if($usuario == 1){
                    header('Location:../index.php?&MSG= Usuario Atualizado com sucesso!');
                }else{
                    header('Location:../index.php?&MSG= Erro ao atualizar o usuario!');
                }
                break;
        
        case 'excluir':
            if(isset($_GET['id'])){
               $id = $_GET['id'];
               $usuarioModel = new UsuarioModel();
                $us = $usuarioModel->Excluir($id); 
                if($us == true){
                    header('Location:../index.php?PAGINA=listarUsuario&MSG= Usuario excluido com sucesso!');
                }
                else{
                    header('Location:../index.php?PAGINA=listarUsuario&MSG= Erro ao excluir o usuario');
                }
                
            }
            break;
                
            
    }

?>