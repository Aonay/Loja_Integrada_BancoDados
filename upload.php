<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">
        <h1>Selecione uma imagem para enviar:</h1>
        <input type="file" name="fl_upload" id="fileToUpload"><br><br>
        <input type="submit" value="Enviar Imagem" name="submit">

    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $diretorio = "uploads/";

    $caminho = $diretorio . basename($_FILES['fl_upload']['name']);

    if (move_uploaded_file($_FILES['fl_upload']['tmp_name'], $caminho)) {
        echo "<br> O arquivo foi enviado com sucesso para " . $caminho;
?>
        <img style="border-radius: 50%; width: 300px; height: 300px; object-fit: cover; " src="<?php echo $caminho; ?>" >

<?php
    } else {
        echo "<br> Desculpe, ocorreu um erro ao enviar o arquivo.";
    }
}


?>