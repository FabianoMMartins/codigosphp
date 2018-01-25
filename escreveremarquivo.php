<?php
//O exemplo a seguir escreve um par de nomes em um novo arquivo chamado "arquivo.txt":
$myfile = fopen("arquivo.txt", "w") or die("Nao foi possivel escrever no arquivo!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
?>