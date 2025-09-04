<?php

$nome = $_GET["nome"];
$idade = $_GET["idade"];
$peso = $_GET["peso"];
$altura = $_GET["altura"];
$imc = $peso / ($altura * $altura);

echo round (num: $imc, precision: 2);

?>