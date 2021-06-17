<?php
    require __DIR__.'/../vendor/autoload.php';

    use dbContext\dbContext;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    $nome_arq = 'arquivo.xlsx';
    $retorno  = array();
   // var_dump($_FILES['arquivo']);
    
    if(isset($_FILES['arquivo']) && $_FILES['arquivo']['size'] > 0){
		$array_extensoes   = explode('.', $_FILES['arquivo']['name']);
	    $extensao = strtolower(end($array_extensoes));

	     // Verifica se arquivo enviado é do tipo XLSX
	    if ($extensao != 'xlsx'){
	   	   $retorno = array('status' => 0, 'mensagem' => 'Extensão Inválida!');
	       echo json_encode($retorno);
	       exit(); 
        }
        // Verifica se o upload foi enviado via POST   
	    if(is_uploaded_file($_FILES['arquivo']['tmp_name'])){
	             
            // Verifica se o diretório de destino existe, senão existir cria o diretório  
            if(!file_exists("./../assets/upload/")){
                 mkdir("./../assets/upload/");  
            } 
    
            // Monta o caminho de destino com o nome do arquivo  
            $nome_arq = date('dmY') . '_' . $_FILES['arquivo']['name'];  
              
            // Essa função copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
            if (!move_uploaded_file($_FILES['arquivo']['tmp_name'], './../assets/upload/'. $nome_arq)){ 
                 $retorno = array('status' => 0, 'mensagem' => 'Houve um erro ao gravar arquivo na pasta de destino!'); 
                 echo json_encode($retorno);
                 exit();  
            } 
        }

        //CARREGANDO, LENDO OS ARQUIVOS GRAVADOS E SALVANDO NO BANCO DE DADOS
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $carga = $reader->load('./../assets/upload/'.$nome_arq);
        $planilha = $carga->getActiveSheet();
       
        foreach ($planilha->getRowIterator(2) as $row) {
            $cellInterator = $row->getCellIterator();
            $cellInterator->setIterateOnlyExistingCells(false);
            $json = Array();
            $cont = 0;
            //Linha
            foreach ($cellInterator as $cell) {
                if(!is_null($cell)){
                    if($cont==4){
                        $value = $cell->getFormattedValue();
                    }else{
                        $value = $cell->getCalculatedValue();
                    }
                    if($value == NULL)
                        continue;
                    
                    $json[] = $value;
                } 
                $cont++;
            }
            //INSERE LINHA NO BANCO
            if(!empty($json))
                dbContext::CreateProduct($json);
        }

    }else{
        $retorno = array('status' => 0, 'mensagem' => 'Arquivo não compativel!'); 
        echo json_encode($retorno);
        exit();  
    }
    $retorno = array('status' => 1, 'mensagem' => 'Dados Salvos com sucesso!'); 
    echo json_encode($retorno);


?>