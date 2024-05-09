

<?php

//recebe o id passado como parâmetro
$id = $_GET['id'];

try{
    require 'conexao.php';


    $sql = $conexao->prepare("SELECT * FROM usuario WHERE id='$id' ");
    $sql->execute();

    if($sql->rowCount() == 1) {
        if($user = $sql->fetch()){
            ?>
  
            <fieldset style="width: 300px";>
            <h1>ATUALIZAR USUÁRIO</h1>
            <form action="#" method="post">
                <h3>Nome</h3> <input type="text" name="_nome" value="<?php echo  $user['nome']; ?>" style="border-radius: 15px; font-size:30px";>
                <br><br><br>
                <h3>Email</h3> <input type="email" name="_email" value="<?php echo  $user['email']; ?>" style="border-radius: 15px; font-size:25px";>
                <br><br>
                <input type="submit" value="Atualizar" style="border-radius: 20px";>
            </fieldset>
            </form>
            
            <?php
        }

        $conexao = null;
    }

} catch (PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

if($_POST){
    $nome=$_POST["_nome"];
    $email = $_POST["_email"];

    if(!empty($nome) && !empty($email)){
        try{
            require "conexao.php";

            $sql = "UPDATE usuario SET nome='$nome', email='$email' WHERE id='$id' ";
            $conexao->exec($sql);
            echo "<script> alert('Cadastrado Atualizado')</script>";
            
                $conexao = null;
                header('refresh: 0; cadastro.php');
                
        }catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}


?>