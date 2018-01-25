<?php
//O exemplo abaixo produz o número de dias até 04 de julho:
$d1=strtotime("July 04");
$d2=ceil(($d1-time())/60/60/24);
echo " Faltam apenas " . $d2 ." dias para 04 de julho.";
?>