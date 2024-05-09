<?php

//recebe o id passado como parâmetro
$id = $_GET['id'];

try{
    require 'conexao.php';

    //Armazena a string SQL para excluir o usuário selecionado
    $sql = "DELETE FROM produto WHERE id='$id' ";

    $conexao->exec($sql);
    header ('location:cadastro.php');

    $conexao = null;

} catch (PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

?>