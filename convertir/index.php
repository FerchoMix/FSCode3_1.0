<?php
// se llama desde una subcarpeta
require 'vendor/autoload.php';
// usando paquete 
use Luecano\NumeroALetras\NumeroALetras;

$formatter = new NumeroALetras();
echo $formatter->toMoney(10.10, 2, 'SOLES', 'CENTIMOS');
?>











