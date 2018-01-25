<!-- O valor é enviado a partir do JavaScript, e acontece o seguinte:

Obter o conteúdo do arquivo "poll_result.txt"
Coloque o conteúdo do arquivo em variáveis ​​e adicionar um para a variável selecionada
Faça o resultado para o arquivo "poll_result.txt"
Mostra uma representação gráfica do resultado da pesquisa
O arquivo de texto
O arquivo de texto (poll_result.txt) é onde nós armazenamos os dados da enquete.

Ela é armazenada como este:

0||0
O primeiro número representa os votos "sim", o segundo número representa os votos "não".

Nota: Lembre-se de permitir que o seu servidor web para editar o arquivo de texto. Não dê acesso a todos, apenas o servidor web (PHP). -->

<?php
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];

if ($vote == 0) {
  $yes = $yes + 1;
}
if ($vote == 1) {
  $no = $no + 1;
}

//insert votes to txt file
$insertvote = $yes."||".$no;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<h2>Result:</h2>
<table>
<tr>
<td>Yes:</td>
<td>
<img src="poll.gif" width='<?php echo(100*round($yes/($no+$yes),2)); ?>'
height='20'>
<?php echo(100*round($yes/($no+$yes),2)); ?>%
</td>
</tr>
<tr>
<td>No:</td>
<td>
<img src="poll.gif" width='<?php echo(100*round($no/($no+$yes),2)); ?>' height='20'>
<?php echo(100*round($no/($no+$yes),2)); ?>%
</td>
</tr>
</table>