<?php
 //esta include implementa o código responsável por executar a consulta ao banco de dados que busca todos os dados dos alunos cadastrados
 $sql = "SELECT * FROM $nomeDaTabela";

 $resultado = $conexao->query($sql) OR die($conexao->error);

 //vamos pedir ao PHP para enviar ao navegador o cabeçalho da tabela html
 echo "<table>
        <caption> CTDS-PRW-Rendimento acadêmico dos alunos - semestre 2023/2 </caption>
        <tr>
         <th> Matrícula </th>
         <th> Aluno </th>
         <th> Média final de PRW </th>
        </tr>";

 //Para que o PHP mostre todos os dados dos alunos na tabela, na página web, devemos criar um laço de repetição que irá percorrer toda a estrutura da variável $resultado e mostrar os dados da consulta select dentro da tabela html
 while($registro = $resultado->fetch_array())
  {
  //observe, abaixo, a função do PHP especializada em evitar ataques do tipo XSS
  $matric = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
  $aluno  = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
  $media  = htmlentities($registro[2], ENT_QUOTES, "UTF-8");

  echo "<tr>
         <td> $matric </td>
         <td> $aluno </td>
         <td> $media </td>
        </tr>";    
  }
 echo "</table>";



