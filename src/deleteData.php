<?php
require __DIR__.'/../vendor/autoload.php';

use dbContext\dbContext;
$id = $_POST["id"];
dbContext::deleteProduct($id);
$retorno = array('status' => 1, 'mensagem' => 'Delete Concluido!'); 
echo json_encode($retorno);
?>