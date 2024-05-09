<?php

if ($_POST){

    $diretorio = "uploads/";
    $caminho = $diretorio . basename($_FILES["fl_upload"]["name"]);
    $nome=$_POST["_nome"];
    $preco=$_POST["_preco"];
    $foto=$_FILES["fl_upload"];

    if (move_uploaded_file($_FILES["fl_upload"]["tmp_name"], $caminho)) {

        echo "<br>O arquivo foi enviado com sucesso para " . $caminho;
        ?>
        <img src="<?php echo $caminho; ?>">
        <?php
      } else {
        echo "Desculpe, ocorreu um erro ao enviar o arquivo.";
      }
    

    if(!empty($nome) && !empty ($preco) && !empty($foto)){

        try{
            require "conexao.php";

            $sql = "INSERT INTO produto (nome, preco, foto) VALUES ('$nome', '$preco', '$caminho')";

            $conexao->exec($sql); //executa o insert
            $conexao = null; //fecha a conexão com o banco
            header('location:cadastro.php'); //redireciona para o index

        }catch (PDOException $e){
            //exibe o erro caso o bloco do try não funcione
            echo $sql . "<br>" . $e->getMessage();
        }
    }

}
