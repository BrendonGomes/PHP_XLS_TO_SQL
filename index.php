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
<style type="text/css">
    #login-alert{
        display: none;
    }
 
    .margin-top-pq{
        margin-top: 10px;
    }
 
    .margin-top-md{
        margin-top: 25px;
    }
 
    .margin-bottom-md{
        margin-bottom: 25px;
    }
 
    .padding-top-md{
        padding-top: 30px;
    }
    </style>
</head>
<body>
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
 
                    </form>     
                </div>  
 
            </div>  
        </div>
    </div> 
    <script type='text/javascript' src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
    <script type='text/javascript' src="vendor/components/jquery/jquery.js" ></script>
    <script type='text/javascript' src="vendor/customjs/login.js" ></script>


</body>
</html>