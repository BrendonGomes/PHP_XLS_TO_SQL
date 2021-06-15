<?php
require __DIR__.'/../src/verificaSessao.php';

?>
<html>
    <head>
        <title>Home Page</title>
        <link href="./../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Olá, <?php echo $_SESSION['nome']; ?></a>
                <form class="d-flex" id="logout" method="POST" action="./../src/logout.php">
                 <button class="btn btn-outline-danger" type="submit">SAIR</button>
                </form>
            </div>
        </nav>
        <div class="container-fluid" style="padding-top: 25px;padding-bottom: 25px;">
            <center>
                <form method="POST" action="./../src/uploadXLS.php">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Carregar</label>
                    </div>
                </form>
            </center>
        </div>
        <div class="container-fluid">
            <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">EAN</th>
                        <th scope="col">Nome Produto</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Data Fabricação</th>
                        <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <script type='text/javascript' src="./../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
        <script type='text/javascript' src="./../vendor/components/jquery/jquery.js" ></script>
        <script type='text/javascript' src="./../vendor/customjs/homePage.js" ></script>
    </body>
</html>
