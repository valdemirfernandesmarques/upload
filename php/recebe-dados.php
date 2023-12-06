<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Upload de arquivos com PHP </title> 
  <link rel="stylesheet" href="./../css/formata-arquivos.css">
</head> 

<body> 
 <h1> Modelo de código para upload de arquivos com PHP </h1>

 <?php
  require "./../includes/dados-conexao.inc.php";
  require "./../includes/conectar.inc.php";
  require "./../includes/criar-banco.inc.php";
  require "./../includes/abrir-banco.inc.php";
  require "./../includes/definir-charset.inc.php";
  require "./../includes/criar-tabela.inc.php";

  if(isset($_POST['enviar-arquivo']))
   {
   require "./../includes/subir-arquivo.inc.php";
   }
  
  require "./../includes/desconectar.inc.php";
 ?>
 <a href="./../html/index.html"> Voltar ao início </a>    
</body> 
</html> 