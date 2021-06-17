<?php
require __DIR__ . '/vendor/autoload.php';

//verifica se a sessão está criada e se contem valor positivo, se sim direciona para HOME
if(isset($_SESSION['logado']) && ($_SESSION['logado']== 'sim' )){
    header("Location: home.php");
}
?>
<html>
<head>
<title>Login Page</title>
<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
<link href="vendor/customCss/login.css" rel="stylesheet"/>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
<div class="login-form">
<form action="src/login.php" method="post" id="login-form" class="form-horizontal" role="form">
		<div class="avatar">
			<img src="assets/images/avatar.png" alt="Avatar">
		</div>
        <h2 class="text-center">Login</h2>   
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="email" id="email" placeholder="example@example.com" required="required">
            </div>
        </div>
		<div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Insira sua Senha! " required="required">
            </div>
        </div>        
        <div class="form-group">
            <center>
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn-login" id="btn-login">Logar</button>
            OU
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn-cadastro" id="btn-cadastro">Cadastre-se</button>                
            </center>
        </div>

    </form>
</div><!-- 
<div class="container">    
        <div id="loginbox" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2 margin-top-md">                    
            <div class="panel panel-primary" >
                <div class="panel-heading">
                    <div class="panel-title">Login</div>
                </div>     
 
                <div class="panel-body padding-top-md" >
                    <div id="login-alert" class="alert alert-danger col-sm-12">
                        <span class="glyphicon glyphicon-exclamation-sign"></span>
                        <span id="mensagem"></span>
                    </div>      
                   <form id="login-form" class="form-horizontal" role="form" action="./src/login.php" method="post">             
                        <div class="input-group margin-bottom-md">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Informe seu E-mail">                                        
                        </div>
                            
                        <div class="input-group margin-bottom-md">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" id="senha" name="senha" required placeholder="Informe sua Senha">
                        </div>
                                
                        <div class="form-group margin-top-pq">
                            <div class="col-sm-12 controls">
                                <button type="submit" class="btn btn-primary" name="btn-login" id="btn-login">
                                  Entrar
                                </button>
                            </div>
                        </div> 
 
                    </form>   -->  
                </div>  
 
            </div>  
        </div>
    </div> 
    <script type='text/javascript' src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
    <script type='text/javascript' src="vendor/components/jquery/jquery.js" ></script>
    <script type='text/javascript' src="vendor/customjs/login.js" ></script>


</body>
</html>