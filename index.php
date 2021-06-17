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
                                    
                    </center>
                </div>

            </form>
            <center>
            OU</br>
             <button data-bs-toggle="modal" data-bs-target="#cadModal" class="btn btn-primary btn-lg btn-block" name="btn-cadastro" id="btn-cadastro">Cadastre-se</button>
            </center>
        </div>
        <div class="modal fade mod" id="cadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="src/createUser.php" method="post" id="cad-form" name="cad-form" class="form-horizontal" role="form">

                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira seu Nome" required>
                    </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="Email" placeholder="Insira seu Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira uma senha!" required>
                </div>
            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btn-create-user" name="btn-create-user"class="btn btn-primary">Criar Conta</button>
                </div>
                </form>
                </div>
            </div>
        </div>
  
       
                </div>  
 
            </div>  
        </div>
    </div> 
    <script type='text/javascript' src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
    <script type='text/javascript' src="vendor/components/jquery/jquery.js" ></script>
    <script type='text/javascript' src="vendor/customjs/login.js" ></script>


</body>
</html>