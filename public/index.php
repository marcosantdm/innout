<?php

/* Na função dirname, o segundo parâmetro é a quantidade de diretórios que você quer voltar. 
No caso, voltamos 2 diretórios, o primeiro é o próprio diretorio raiz do arquivo (public), já o segundo é 
para acessar o diretorio innout, se fosse 3 voltaria 3 diretórios, e assim por diante. */
// O arquivo config.php está configurado para chamar o arquivo database.php, por isso não é 
// necessário chamar o arquivo database.php
require_once(dirname(__FILE__, 2) . '/src/config/config.php'); 
require_once(dirname(__FILE__, 2) . '/src/models/User.php'); 

$user = new User(['name' => 'João', 'email' => 'joaotonhao@teste.com']);

print_r(User::get(['id' => 1], 'id, name, email'));
echo '<br>';

foreach(User::get([], 'name') as $user) {
    echo $user->name;
    echo '<br>';
} 