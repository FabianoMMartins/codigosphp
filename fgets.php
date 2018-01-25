<?php
//Le apenas a primeira linha de um arquivo fgets
$myfile = fopen("arquivo.txt", "r") or die("Não foi possivel abrir o arquivo!");
echo fgets($myfile);
fclose($myfile);
?>