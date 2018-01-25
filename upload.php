<?php
/*
Script PHP explicou:
$ Target_dir = "uploads /" - especifica o diretório onde o arquivo vai ser colocado
$ Arquivo_de_destino especifica o caminho do arquivo a ser carregado
UploadOk $ = 1 ainda não é usado (vai ser usado mais tarde)
$ ImageFileType detém a extensão de arquivo do arquivo
Em seguida, verifique se o arquivo de imagem é uma imagem real ou uma imagem falsa
O campo entrada do arquivo no formulário HTML acima é chamado de "fileToUpload».
Agora, queremos verificar o tamanho do arquivo. Se o arquivo for maior do que 500 kb, uma mensagem de erro é exibida, e US $ uploadOk está definido para 0:
O código abaixo só permite aos usuários fazer upload de JPG, JPEG, png, e os arquivos GIF. Todos os outros tipos de arquivos dá uma mensagem de erro antes de definir $ uploadOk a 0:
*/

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>