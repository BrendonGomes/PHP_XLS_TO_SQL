<?
namespace manageXLSX;

require __DIR__.'/../vendor/autoload.php';

use dbContext\dbContext;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

readXLSX();

function readXLSX(){

  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
  $carga = $reader->load('./../assets/upload/exemplo_importacao.xlsx');
  $planilha = $carga->getActiveSheet();
    }

?>