<?php

Limite de Seleções dados de um banco de dados MySQL
MySQL fornece uma cláusula LIMIT que é usado para especificar o número de registros para retornar.

A cláusula LIMIT faz com que seja fácil de código página de resultados de múltiplos ou a paginação com SQL, e é muito útil em tabelas grandes. Voltando um grande número de registros podem ter impacto sobre o desempenho.

Suponha que queremos selecionar todos os registros 1-30 (inclusive) a partir de uma tabela chamada "Pedidos". A consulta SQL, então, parecido com este:

$sql = "SELECT * FROM Orders LIMIT 30";
Quando a consulta SQL acima é executado, ele retornará os primeiros 30 registros.

E se nós queremos selecionar registros 16-25 (inclusive)?

Mysql também fornece uma maneira de lidar com isso: usando offset.

A consulta SQL abaixo diz "retornar apenas 10 registros, começar no registro 16 (offset 15)":

$sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";
Você também pode usar uma sintaxe mais curto para alcançar o mesmo resultado:

$sql = "SELECT * FROM Orders LIMIT 15, 10";
Observe que os números estão invertidos quando você usa uma vírgula.

?>