<?php

session_start();



if(!isset($_SESSION['usuario']) || (time() - 1800 >$_SESSION['hora']) ){
  session_unset();
  session_destroy();
  ?>
  <script>
    alert('O tempo de sessão expirou faça login novamente para continuar!');
  </script>
  <?php
  header('refresh: 0; login.php');
}

require 'conexao.php';
$conexao = null;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <style>
    .parent {
      min-height: 75vh;

    }

    img{
      width: 300px;
      height: 300px;
      object-fit: cover;
    }
  </style>

  <div class="parent container d-flex justify-content-center align-items-center h-100">
    <div class=" child container w-50 p-3 text-primary-emphasis bg-dark-subtle border border-primary-subtle rounded-3">
      <div class="row">
        <div
          class="container w-75 p-3 text-primary-emphasis bg-light mb-4 border border-primary-subtle rounded-3 d-flex justify-content-center align-items-center h-100">
          <h2>Cadastrar novo produto:</h2>
        </div>
        <div class="row">

          <div class="col">
            <form method="POST" enctype="multipart/form-data" action="insert.php">

              <div class="form-floating mb-4">
                <input type="name" name="_nome" required autofocus class="form-control" id="floatingInput"
                  placeholder="" />
                <label for="floatingInput">Nome do produto</label>
              </div>
              <div class="form-floating mb-4">
                <input type="number" name="_preco" class="form-control" id="floatingInput" placeholder="" required />
                <label for="floatingInput">Valor R$</label>
              </div>
              <div class="form-floating mb-4">
                <input type="file" value="<?php $caminho; ?>" name="fl_upload" id="fileToUpload" class="form-control" id="floatingInput"
                  placeholder="" />
              </div>
          </div>
          <div class="d-grid gap-2 ">
            <button class="btn btn-primary" type="submit">Cadastrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <?php
  require 'select.php';


  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>






</body>

</html>