<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="script-src 'self' https://http2.mlstatic.com https://sdk.mercadopago.com https://cdn.jsdelivr.net 'unsafe-inline';">
    <title>AONAY STORE</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="imagens/favicon.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <style>
        #btnComprar {
            background-color: orangered;
            border-color: orangered;
        }

        #btnComprar:hover {
            background-color: orange;
            border-color: orange;

        }

        .card {
            height: 450px !important;
        }
    </style>

    <header>
        <img src="uploads/logomenor.png" alt="logo" style="width: 100px; height:100px; object-fit:cover">
    </header>

    <nav id="menu" style="z-index: 5;" class="navbar" style="background-color: #e3f2fd;">
        <a href="#">Home</a>
        <a href="#">Departamentos</a>
        <a href="#">Novidades</a>
        <a href="#">Eletrônicos</a>

        <a href="#"> <img class="carrinho" src="imagens/carrinho.png" width="35px"> Meu Carrinho </a>
        <a href="cadastro.php"><img class="login" src="imagens/login.png" width="30px"> Login</a>
    </nav>

    <form style="z-index: 4;">
        <section id="banner">
            <img class="banner" src="imagens/banner3.png" width="82%">
        </section>

        <?php
        require 'vendor/autoload.php';
        require "conexao.php";

        $sql = $conexao->prepare("SELECT id, nome, preco, foto FROM produto");
        $sql->execute(); // Executa a query.

        // Transforma o resultado do select em um array associativo.
        $array_produtos = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo '<div class="container">';
        echo '<div class="row">';

        if ($array_produtos) {
            foreach ($array_produtos as $prod) {
                echo '<div class="pt-5 col-sm-3 ">';
                echo '<div class="card">';
                echo '<img class="card-img-top p-1" src="' . $prod['foto'] . '" alt="Imagem do produto" style="width: 100%; height: 100%; object-fit: cover;">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $prod['nome'] . '</h5>';
                echo '<p class="card-text">Valor: R$ ' . $prod['preco'] . '</p>';
                echo '<a class="btn btn-success" href="pagamento.php?id=' . $prod['id'] . '" id="btnComprar">Comprar</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        echo '</div>';
        echo '</div>';
        ?>

        <footer id="rodape">
            <br>
            <p id="rdp" style="font-size: 20px;">© Todos os direitos reservados - Alan, Rigoni, Vitor e Nunes - DSM 2 - Desenvolvimento Web 2 - 2024</p>
        </footer>
    </form>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>