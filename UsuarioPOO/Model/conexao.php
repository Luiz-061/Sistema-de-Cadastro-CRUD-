<?php 
class Conexao{
   public static function getInstance(){
     $dns = "mysql:host=localhost;dbname=usuario_db";
     $user = 'root';
     $pass = '';
     try {
        $pdo = new PDO($dns,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
     } catch(PDOException $exc){
        echo $exc->getMessage();
     }
   }
}
