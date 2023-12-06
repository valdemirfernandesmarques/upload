<?php
 //definir o nome do diretório e subdiretório, aqui no servidor, onde os arquivos serão armazenados pelo PHP
 $diretorio = "arquivos-de-usuario/uploads/";

 //testando se o diretorio ainda não existe caso contrario será criado, e se existir não ira acontecer nada

 if(!file_exists($diretorio))
 {
  mkdir($diretorio, 0700, true);   //em linux, tente o código 0770ou 077
 }

 //toda vez que o php recebe um arquivo do usuário,ele armazena este arquivo em uma pagina temporaria no servidor
 ///o nosso código deve mover esse arquivo da pasta temporaria para pasta definitiva, criada a cima
 //antes disso vamos alertar o php para liberar apenas os arquivos permitidos(jpg, png, doc e pdf)

 $tiposArquivosPermitidos = ["image/jpeg", "image/png", "application/msword", "application/pdf"];

 //coletando as informações sobre  arquivo enviado ao php

 //echo "<pre>";
 //print_r($_FILES);
 //echo "</pre>";

 $tamanho = $_FILES["meu-arquivo"]["size"];            //aqui é guardado o indice i do arquivo(input name"name")
 $tipo = $_FILES["meu-arquivo"]["type"];      ///aqui ira subir (image/jpg, image/png)
 $nomeTemp = $_FILES["meu-arquivo"]["tmp_name"];
 $nomeReal = $_FILES["meu-arquivo"]["name"];     // aqui é o indice real do arquivo

 //validando o tamanho do arquivo. nesse exemplo o tamanho será de 10kb

 if($tamanho == 0 OR $tamanho > 100*1024)
 {
 exit("<p> ERROR não enviado ou o tamanho maximo exede o permitido,que é de 100kb</p>");

 }

 $tipo = mime_content_type($nomeTemp);
 if(!in_array($tipo, $tiposArquivosPermitidos))
 {
    exit("<p> ERROR tipo de arquivo não permitido </p>");
 }
 
// agora vamos pedir pro php transferiar a pasta temporaria para a pasta definitiva

$caminhoCompleto = $diretorio.$nomeReal;
move_uploaded_file($nomeTemp, $caminhoCompleto);   //comando renomeia o arquivo para o nome real

//inserindo a URL do arquivo na tabela do banco de dados

$sql = "INSERT $nomeDaTabela VALUES(
         null,
         '$caminhoCompleto')";
         $conexao->query($sql) or die($conexao->error);


