<?php

 fread($myfile,filesize("arquivo.txt"));

?>


<?php
  $myfile = fopen("arquivo.txt", "r");
  fclose($myfile);
?>