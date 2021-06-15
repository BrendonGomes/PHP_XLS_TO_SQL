<?php

use dbContext\dbContext;

require __DIR__.'/../vendor/autoload.php';

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

$resposta = dbContext::doLogin($email,$senha);
echo json_encode($resposta);


?>