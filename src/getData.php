<?php

use dbContext\dbContext;

require __DIR__.'/../vendor/autoload.php';

echo json_encode(dbContext::getProducts());

?>