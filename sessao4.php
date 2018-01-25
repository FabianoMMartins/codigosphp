<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sessao4</title>
</head>

<body>
<!-- Modificar uma variável PHP Session
Para alterar uma variável de sessão, basta substituí-lo: -->
<?php
session_start();
?>

<?php
$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);
?>

</body>
</html>
</body>
</html>