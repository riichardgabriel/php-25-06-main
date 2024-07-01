<?php

class Usuario{
    public function CadastroUsuario($user, $password, $confirma){
        try {
            
            if(empty($user) || $user == null){
                return "Usuário não informado !!!";
            }
            
            if(empty($password) || $password == null){
                return "Senha não informado !!!";
            }

            if($password != $confirma){
                return "Senha não são iguais";
            }

            $conn = new PDO("mysql:host=localhost;dbname=login","root","");
            $script = 'INSERT INTO tb_usuario (usuario, senha) VALUE (:usuario, :senha)';
            $pre = $conn->prepare($script);
            $var = [
                ':usuario' => $user,
                ':senha' => $password
            ];
            $pre->execute($var);

            return "Cadastrado com sucesso id:" .$conn->lastInsertId();
        
        } catch (PDOException $erro){
            echo "Seguinte deu pau no sistema" .$erro->getMessage();
        }
    }
}