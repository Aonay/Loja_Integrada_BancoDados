
<?php

require "conexao.php";

$sql = $conexao->prepare("SELECT id, nome, preco, foto FROM produto");
$sql->execute(); //executa a query

//transforma o resultado do select em um array associativo
$array_produtos = $sql->fetchAll(PDO::FETCH_ASSOC);

if ($array_produtos){
    foreach ($array_produtos as $prod) {
        echo "<hr>";
        echo "ID Produto:      " . $prod['id'] . "<br>";
        echo "Nome:    " . $prod['nome'] . "<br>";
        echo "Valor:  R$ " . $prod['preco'] . "<br>";
        echo "Imagem: "  ?> <img src="<?php echo $prod['foto'];?>">   <br>
        
        

       <!-- <a style="color: green;" href="update.php?id=<?php echo $prod ['id']; ?>">Editar</a> -->
        |
        <a style="color: red;" href="delete.php?id=<?php echo $prod ['id']; ?>">Excluir</a>

        <?php
        echo "<br>";
    }
}

$conexao = null;

?>