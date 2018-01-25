O que é uma exceção
Com PHP 5 veio uma nova maneira orientada a objeto de lidar com erros.

A manipulação de exceção é usado para alterar o fluxo normal de execução de código se um erro especificado (excepcional) condição ocorre. Esta condição é chamada uma exceção. 

Isto é o que normalmente acontece quando uma exceção é disparada:

O atual estado de código é salvo
A execução de código irá mudar para um (personalizado) função de manipulador de exceção predefinida
Dependendo da situação, o condutor pode, em seguida, retomar a execução de código a partir do estado salvo, terminar a execução do script ou continuar o script a partir de um local diferente no código
Vamos mostrar diferentes métodos de tratamento de erros:

Uso básico de Exceções
Criando um manipulador de exceção personalizada
Várias exceções
Re-lançar uma exceção
Definir um manipulador de exceção de nível superior
Nota: As excepções só deve ser usado com condições de erro, e não deve ser usado para saltar para outro lugar no código em um ponto especificado.

Uso Básico de Exceções
Quando uma exceção é lançada, o código a seguir não será executada, eo PHP irá tentar encontrar a correspondência bloco "catch".

Se uma exceção não for pega, um erro fatal será emitido com uma mensagem de "Exceção Uncaught".

Vamos tentar lançar uma exceção sem captura-lo:

<?php
//create function with an exception
function checkNum($number) {
  if($number>1) {
    throw new Exception("Value must be 1 or below");
  }
  return true;
}

//trigger exception
checkNum(2);
?>
O código acima irá obter um erro como este:

Fatal error : Uncaught exception 'Exception'
with message 'Value must be 1 or below' in C:\webfolder\test.php:6
Stack trace: #0 C:\webfolder\test.php(12):
checkNum(28) #1 {main} thrown in C:\webfolder\test.php on line 6
Tente, jogar e pegar
Para evitar o erro a partir do exemplo acima, nós precisamos criar o código apropriado para lidar com uma exceção.

Código de exceção adequada deve incluir:

Tente - A função usando uma exceção deve estar em um bloco "try". Se a exceção não aciona, o código continuará como normal. No entanto, se a exceção dispara, uma exceção é "jogado"
Throw - Isto é como você acionar uma exceção. Cada "jogar" deve ter pelo menos um "catch"
Trave - Um bloco "catch" recupera uma exceção e cria um objeto que contém as informações de exceção
Vamos tentar acionar uma exceção com código válido:

<?php
//create function with an exception
function checkNum($number) {
  if($number>1) {
    throw new Exception("Value must be 1 or below");
  }
  return true;
}

//trigger exception in a "try" block
try {
  checkNum(2);
  //If the exception is thrown, this text will not be shown
  echo 'If you see this, the number is 1 or below';
}

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>
O código acima irá obter um erro como este:

Message: Value must be 1 or below
Exemplo explicou:
O código acima gera uma exceção e pega-lo:

A função checkNum () é criado. Ele verifica se um número é maior que 1. Se for, será apresentada uma exceção
A função checkNum () é chamado em um bloco "try"
A exceção dentro da função checkNum () é acionada
O bloco "catch" recupera a exceção e cria um objeto ($ e) contendo as informações de exceção
A mensagem de erro de exceção é ecoado chamando $ e-> getMessage () do objeto de exceção
No entanto, uma maneira de contornar o "cada lance deve ter um prendedor" regra é definir um manipulador de exceção de nível superior para manipular erros que passar.

Criando uma Exceção de Classe feita sob encomenda
Criando um manipulador de exceção personalizada é bastante simples. Nós simplesmente criamos uma classe especial com funções que podem ser chamados quando ocorre uma exceção em PHP. A classe deve ser uma extensão da classe de exceção.

A classe de exceção personalizada herda as propriedades da classe de exceção de PHP e você pode adicionar funções personalizadas para ele.

Vamos criar uma classe de exceção:

<?php
class customException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }
}

$email = "someone@example...com";

try {
  //check if
  if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
    //throw exception if email is not valid
    throw new customException($email);
  }
}

catch (customException $e) {
  //display custom message
  echo $e->errorMessage();
}
?>
A nova classe é uma cópia da classe de exceção de idade com uma adição da função errorMessage (). Uma vez que é uma cópia da antiga classe, e ele herda as propriedades e métodos da velha classe, podemos usar os métodos da classe de exceção como getLine () e getFile () e getMessage ().

Exemplo explicou:
O código acima gera uma exceção e pega-lo com uma classe de exceção personalizado:

A classe customException () é criado como uma extensão da classe de exceção de idade. Desta forma, ele herda todos os métodos e propriedades da classe de exceção de idade
A função errorMessage () é criado. Esta função retorna uma mensagem de erro se um endereço de e-mail é inválido
A variável $ email é definida como uma seqüência que não é um endereço de e-mail válido
O bloco "try" é executada e uma exceção é acionada uma vez que o endereço de e-mail é inválido
O bloco "catch" captura a exceção e exibe a mensagem de erro
Várias Exceções
É possível que um script para usar várias exceções para verificar se há várias condições.

É possível usar vários blocos if..else, um interruptor, ou aninhar várias exceções. Essas exceções podem usar diferentes classes de exceção e retornar diferentes mensagens de erro:

<?php
class customException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }
}

$email = "someone@example.com";

try {
  //check if
  if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
    //throw exception if email is not valid
    throw new customException($email);
  }
  //check for "example" in mail address
  if(strpos($email, "example") !== FALSE) {
    throw new Exception("$email is an example e-mail");
  }
}

catch (customException $e) {
  echo $e->errorMessage();
}

catch(Exception $e) {
  echo $e->getMessage();
}
?>
Exemplo explicou:
O código acima testa duas condições e lança uma exceção se qualquer uma das condições não forem cumpridas:

A classe customException () é criado como uma extensão da classe de exceção de idade. Desta forma, ele herda todos os métodos e propriedades da classe de exceção de idade
A função errorMessage () é criado. Esta função retorna uma mensagem de erro se um endereço de e-mail é inválido
A variável $ email é definida como uma seqüência que é um endereço de e-mail válido, mas contém a cadeia "exemplo"
O bloco "try" é executada e uma exceção não é lançada sobre a primeira condição
A segunda condição desencadeia uma excepção uma vez que o e-mail contém o "exemplo" cadeia
O bloco "catch" captura a exceção e exibe a mensagem de erro correto
Se a exceção lançada eram da classe customException e não houve captura customException, somente a captura de exceção base, a exceção seria tratado lá.

Re-lançamento de exceções
Às vezes, quando uma exceção é lançada, você pode querer lidar com isso de forma diferente do que a maneira padrão. É possível lançar uma exceção uma segunda vez dentro de um bloco "catch".

Um script deve esconder erros do sistema dos usuários. Erros de sistema pode ser importante para o codificador, mas não são de interesse para o utilizador. Para tornar as coisas mais fáceis para o usuário que você pode re-lançar a exceção com uma mensagem amigável:

<?php
class customException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = $this->getMessage().' is not a valid E-Mail address.';
    return $errorMsg;
  }
}

$email = "someone@example.com";

try {
  try {
    //check for "example" in mail address
    if(strpos($email, "example") !== FALSE) {
      //throw exception if email is not valid
      throw new Exception($email);
    }
  }
  catch(Exception $e) {
    //re-throw exception
    throw new customException($email);
  }
}

catch (customException $e) {
  //display custom message
  echo $e->errorMessage();
}
?>
Exemplo explicou:
O código acima testa se o e-mail contém a cadeia "exemplo" em que, se isso acontecer, a exceção é relançada:

A classe customException () é criado como uma extensão da classe de exceção de idade. Desta forma, ele herda todos os métodos e propriedades da classe de exceção de idade
A função errorMessage () é criado. Esta função retorna uma mensagem de erro se um endereço de e-mail é inválido
A variável $ email é definida como uma seqüência que é um endereço de e-mail válido, mas contém a cadeia "exemplo"
O bloco "try" contém um outro bloco "try" para torná-lo possível para re-lançar a exceção
A exceção é acionada uma vez que o e-mail contém o "exemplo" cadeia
O bloco "catch" captura a exceção e re-lança uma "customException"
O "customException" é capturado e exibe uma mensagem de erro
Se a exceção não for pega em sua atual bloco "try", ele irá procurar um bloco catch em "níveis superiores".

Definir um manipulador de exceção de nível superior
A função set_exception_handler () define uma função definida pelo usuário para lidar com todas as exceções não capturadas.

<?php
function myException($exception) {
  echo "<b>Exception:</b> " . $exception->getMessage();
}

set_exception_handler('myException');

throw new Exception('Uncaught Exception occurred');
?>
A saída do código acima deve ser algo como isto:

Exception: Uncaught Exception occurred
No código acima não havia bloco "catch". Em vez disso, o manipulador de exceção de nível superior acionado. Esta função deve ser utilizada para a captura exceções.Ele. 

Regras para excepções
Código pode ser rodeado em um bloco try, para ajudar a apanhar potenciais excepções
Cada bloco try ou "jogar" deve ter pelo menos um correspondente bloco catch
Vários blocos catch pode ser usado para pegar diferentes classes de exceções
Exceções podem ser disparadas (ou re-disparadas) em um catch bloco dentro de um bloco try
Uma regra simples: Se você jogar alguma coisa, você tem que pegá-lo.