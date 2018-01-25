<?php
$myfile = fopen("arquivo.txt", "r") or die("Nao foi possivel abrir o arquivo");
echo fread($myfile,filesize("arquivo.txt"));
fclose($myfile);
?>