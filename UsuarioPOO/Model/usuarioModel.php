<?php


require_once 'conexao.php';

class UsuarioModel{
    public function cadastrar(Usuario $usuario){
        try{
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO usuario (nome, email) VALUES (?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $usuario->getNome());
            $stmt->bindValue(2, $usuario->getEmail());
            $stmt->execute();
            return true;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public function listar(){
        try{
        $pdo = Conexao::getInstance();
        $sql = "SELECT * FROM usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $pessoa = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $pessoa;
     }catch(PDOException $exc){
        echo $exc->getMessage();
     }
    }
    public function buscarUsuario($id){
        try{
            $usuario = new Usuario();
            $pdo = Conexao::getInstance();
            $sql = "SELECT id, nome, email FROM usuario WHERE id= :id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
            $usuarioAssoc = $stmt->fetch(PDO::FETCH_ASSOC); 
            // executa a busca guardada na variavel

            $usuario->setId($usuarioAssoc['id']);
            $usuario->setNome($usuarioAssoc['nome']);
            $usuario->setEmail($usuarioAssoc['email']);
            return $usuario;
        } catch(PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public function atualizar(Usuario $altusuario){
       try{
         $pdo = Conexao::getInstance();
        $sql = "UPDATE usuario SET nome = ?, email = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $altusuario->getNome());
        $stmt->bindValue(2, $altusuario->getEmail());
        $stmt->bindValue(3,$altusuario->getId());
        $stmt->execute();
        return $stmt->rowCount();
       }catch (PDOException $exc){
        echo $exc->getMessage();
       }
    }

    public function Excluir($id) {
        try{
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM usuario WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return true;
        } catch(PDOException $exc){
        echo $exc->getMessage();
        }
        
    }
    
   

}

?>