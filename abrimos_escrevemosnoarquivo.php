<?php
  $myfile = fopen("arquivo.txt", "w") or die("Não foi possivel escrever no arquivo!");
  $txt = "Mickey Mouse\n";
  fwrite($myfile, $txt);
  $txt = "Minnie Mouse\n";
  fwrite($myfile, $txt);
  fclose($myfile);
?>