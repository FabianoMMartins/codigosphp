<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cookie</title>
</head>

<body>
<!-- O exemplo a seguir cria um pequeno script que verifica se os cookies estão ativados. Em primeiro lugar, tentar criar um cookie de teste com a função setcookie (), em seguida, contar a variável array $ _COOKIE:-->

<?php
setcookie("test_cookie", "test", time() + 3600, '/');
?>
<html>
<body>

<?php
if(count($_COOKIE) > 0) {
    echo "Cookies are enabled.";
} else {
    echo "Cookies are disabled.";
}
?>


</body>
</html>