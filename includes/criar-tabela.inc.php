<?php
 $sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela(
           id INT PRIMARY KEY AUTO_INCREMENT,
           url LONGBLOB) ENGINE=innoDB";
 
 $conexao->query($sql) OR die($conexao->error);