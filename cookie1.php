<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cookie</title>
</head>
<!-- O exemplo a seguir cria um cookie chamado "usuário" com o valor "John Doe". O cookie irá expirar após 30 dias (86.400 * 30). O "/" significa que o cookie está disponível no site inteiro (caso contrário, selecione o diretório que você preferir).

Em seguida, recuperar o valor do cookie "user" (usando a variável $ _COOKIE global). Nós também usamos a função isset () para descobrir se o cookie é definido:  -->
<body>
   <?php
   $cookie_name = "user";
   $cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
</body>
</html>