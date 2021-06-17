<?php
require __DIR__.'/../vendor/autoload.php';

use dbContext\dbContext;

echo json_encode(dbContext::getProducts());

?>