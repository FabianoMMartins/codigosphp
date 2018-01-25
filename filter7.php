<!-- O exemplo a seguir usa a função filter_var () para verificar se uma variável é tanto de tipo INT, e entre 1 e 200: -->

<?php
$int = 122;
$min = 1;
$max = 200;

if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min,"max_range"=>$max))) === false) {
    echo("Variable value is not within the legal range");
} else {
    echo("Variable value is within the legal range");
}
?>