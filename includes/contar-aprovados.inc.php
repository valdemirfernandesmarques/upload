<?php
 //include que executa operação, no banco de dados, para a contagem do número de alunos aprovados em PRW
 $sql = "SELECT COUNT(*) FROM $nomeDaTabela WHERE media >= 6";

 $resultado = $conexao->query($sql) OR die($conexao->error);

 $registro = $resultado->fetch_array();

 $quantos = $registro[0];

 echo "<p> Número de alunos aprovados em PRW = <span> $quantos </span> alunos. </p>";

