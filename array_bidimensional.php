<?php

   $carros = array(
       array("Volvo",22,18),//Na lina 0 Coluna 0 tenho Volvo, Na lina 0 Coluna 1 tenho 22 Na lina 0 Coluna 3 tenho 18
	   array("BMW",15,13),
	   array("Saab",5,2),
	   array("Land Rover",17,15)
   )
 
?>

<?php
   // Imprimi conteudo da linha e coluna de cada indice 
   echo $carros[0][0]."&nbsp;".$carros[0][1]."&nbsp;".$carros[0][2]."<br/>";
   echo $carros[1][0]."&nbsp;".$carros[1][1]."&nbsp;".$carros[1][2]."<br/>";
   echo $carros[2][0]."&nbsp;".$carros[2][1]."&nbsp;".$carros[2][2]."<br/>";
   echo $carros[3][0]."&nbsp;".$carros[3][1]."&nbsp;".$carros[3][2]."<br/>";

?>

<?php
for ($row=0;$row<4;$row++) { 
echo "<p> <b> Número Linha: $row </b> </p>"; 
echo "<ul>"; 
for ($col=0;$col<3;$col++) { 
echo "<li>".$carros[$row][$col]. "</li>"; 
} 
echo "</ ul>"; 
} 
?> 
