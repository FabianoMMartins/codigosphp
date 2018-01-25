<?php
// le arquivo ate o fim
$myfile = fopen("arquivo.txt", "r") or die("Arquivo nao encontrado!");
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>