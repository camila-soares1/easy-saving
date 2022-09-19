<?php
define('HOST', 'estga-dev.clients.ua.pt');
define('UTILIZADOR', 'ptaw-2021-gr2');
define('SENHA', '8&9Ne?4zKF');
define('DB', 'ptaw-2021-gr2');

$conexao = mysqli_connect(HOST, UTILIZADOR, SENHA, DB) or die('Não foi possível conectar');