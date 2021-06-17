<?php
require __DIR__.'/../vendor/autoload.php';

use dbContext\dbContext;


$nome = (isset($_POST['nome'])) ? $_POST['nome'] : '' ;
$email = (isset($_POST['email'])) ? $_POST['email'] : '' ;
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '' ;

if(empty($email)){
    $retorno = array('codigo' => 0, 'msg' => 'Preencha seu e-mail!');
	echo json_encode($retorno);
	exit();
}

if (empty($senha)){
    $retorno = array('codigo' => 0, 'msg' => 'Preencha sua senha!');
	echo json_encode($retorno);
	exit();
}

if (empty($nome)){
    $retorno = array('codigo' => 0, 'msg' => 'Preencha seu nome!');
	echo json_encode($retorno);
	exit();
}

$resposta = dbContext::createUser($nome, $email,$senha);
$retorno = array('codigo' => 1, 'msg' => 'Sucess!');
echo json_encode($retorno);


?>