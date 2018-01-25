<?php
//A função fgetc () é usado para ler um único caractere de um arquivo.
$myfile = fopen("arquivo.txt", "r") or die("Arquivo nao encontrado!");
while(!feof($myfile)) {
  echo fgetc($myfile);
}
fclose($myfile);
?>