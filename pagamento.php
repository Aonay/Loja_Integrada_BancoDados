<?php
require 'vendor/autoload.php';
require "conexao.php";

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

MercadoPagoConfig::setAccessToken("TEST-7683793692889788-052122-94760fb6a77f5ead4cf5e4a6a7bfdf5f-37685029");//trocar token ao testar

$client = new PreferenceClient();

$product_id = $_GET['id'];

$sql = $conexao->prepare("SELECT * FROM produto WHERE id = $product_id");
$sql->execute();

$array_produtos = $sql->fetchAll(PDO::FETCH_ASSOC);

if ($array_produtos) {
    foreach ($array_produtos as $prod) {
        $nome = $prod['nome'];
        $preco = floatval($prod['preco']);
        $imagem = $prod['foto'];

        $preference = $client->create([
            "items" => [
                [
                    "title" => $nome,
                    "quantity" => 1,
                    "unit_price" => $preco
                ]
            ],
            "payment_methods" => [
                "excluded_payment_methods" => [
                    ["id" => 'amex'],
                    ["id" => 'elo'],
                    ["id" => 'hipercard'],
                    ["id" => 'pix'],
                    ["id" => 'bolbradesco'],
                    ["id" => 'pec'],
                ],
                "excluded_payment_types" => [
                    ["id" => 'debit_card'],
                ],
                "installments" => 12
            ]
        ]);
    }
}
?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container card">
        <div class="titulo">Você está comprando:</div>
        <div class="descricao">
            <div>
                <div><b>Produto:</b> <?php echo $nome; ?></div>
                <div><b>Quantidade:</b> 1</div>
                <div><b>Preço:</b> R$ <?php echo $preco; ?></div>
            </div>
            <img src="<?php echo $imagem ?>">
        </div>
        <div id="wallet_container"></div>
    </div>
    <script>
        const mp = new MercadoPago('TEST-3ae2bef9-9352-4b73-a185-e9fe91c2dc73', {
            locale: 'pt-BR'
        });

        mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                preferenceId: "<?php echo $preference->id; ?>",
            },
        });
    </script>
</body>

<style>
    body {
        display: flex;
        justify-content: center;
        margin-top: 64px;
    }

    .card {
        padding: 16px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: fit-content;
        width: 350px;
    }

    .descricao {
        display: flex;
        width: 100%;
        justify-content: space-between;
    }

    .titulo {
        text-align: center;
        font-weight: bold;
        margin-bottom: 16px;
    }

    img {
        width: 120px;
    }

    #wallet_container {
        width: 500px;
    }
</style>

</html>