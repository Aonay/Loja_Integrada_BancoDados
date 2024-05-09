<?php

$senha_original = "senha123";
$senha_rash = password_hash($senha_original, PASSWORD_DEFAULT);

if(password_verify($senha_original,$senha_rash)){
    echo "A senha digitada correspode à senha criptografada.";
}else {
    echo "A senha digitada NÃO corresponde à senha criptografada.";
}


?>