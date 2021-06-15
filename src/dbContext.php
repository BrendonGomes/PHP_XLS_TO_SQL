<?php
  namespace dbContext;

  use PDO;
  use PDOException;

 define('HOST', 'localhost');  
 define('DBNAME', 'db_products');  
 define('CHARSET', 'utf8');  
 define('USER', 'root');  
 define('PASSWORD', '');  
 session_start();

class dbContext{  
 
   private static $pdo;

   function __autoload($class){
    require_once(dirname(__FILE__) . "/../class/{$class}.class.php");
   }

   private function __construct() {  
     //  
   } 
 
   public static function getInstance() {  
     if (!isset(self::$pdo)) {  
       try {  
         $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);  
         self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);  
       } catch (PDOException $e) {  
         print "Erro: " . $e->getMessage();  
       }  
     }  
     return self::$pdo;  
   }  

   public static function doLogin($email, $senha){
    //CRIA UMA INSTANCIA DE CONEXAO 
    $con = self::getInstance();

    //SQL para selecionar os dados do usuario dado email
    $sql = 'SELECT id_user, name_user, password_hash, email FROM users WHERE email = ? LIMIT 1';
    $stm = $con->prepare($sql);
    $stm->bindValue(1, $email);

    //EXECUTE A QUERY E COPIA OS DADOS PARA RETURN
    $stm->execute();
    $return = $stm->fetch(PDO::FETCH_OBJ);
    //VERIFICA OS DADOS E CRIA SESSÃO SE OK
    if(!empty($return) && password_verify($senha, $return->password_hash)){

      $_SESSION['id'] = $return->id_user;
	    $_SESSION['nome'] = $return->name_user;
	    $_SESSION['email'] = $return->email;
	    $_SESSION['logado'] = 'sim';
    }else{
        $_SESSION['logado'] = 'nao';
    }

    //SE SESSÃO ESTIVER STATUS COMO SIM, ENTAO RETORNAMOS CODIGO 1, SE NAO CODIGO 0
    //ESTE SERA CAPITURADO PELO AJAX NA CHAMADA
    if($_SESSION['logado'] == 'sim'){
        return array('codigo' => 1, 'msg' => 'Sucesso ao Logar!');
        //echo json_encode($retorno);
        exit();
    }else{
        return array('codigo' => 0, 'msg' => 'Erro ao autenticar!');
       // echo json_encode($retorno);
        exit();
    }
   }//FIM FUNÇÃO DOLOGIN

   public static function getProducts(){
     //CRIA UMA INSTANCIA DE CONEXAO 
    $con = self::getInstance();

    //SQL para selecionar os dados do usuario dado email
    $sql = 'SELECT * FROM products';
    $stm = $con->prepare($sql);
    //EXECUTE A QUERY
    $stm->execute();
    while($row = $stm->fetch(PDO::FETCH_ASSOC)){
      $json[] = $row;
    }
    $retorno['dados'] = $json;
    return $retorno;
   }
   public static function deleteProduct($id){}

   public static function createProduct(){}
 }
?>