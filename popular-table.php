<?php
include 'libs/banco_dados.class.php';
$banco= new banco_dados("localhost", "user", "pass", "banco");
$conexao = $banco->conecta();

header("Content-Type: text/html; charset=ISO-8859-1", true);


$participantes = Array();
$file = fopen('sfd.csv', 'r');
while (($line = fgetcsv($file)) !== false) {
    $participantes[] = $line;
}

//# ALTER TABLE attendee AUTO_INCREMENT = 1;


fclose($file);


foreach ($participantes as $linha => $paticipante) {

    //verificar posição do nome e email no arquivo CSV gerado

    $nome = $paticipante[2] . " " . $paticipante[3];//nome
    $email = $paticipante[4];//email

    echo $sql = "INSERT INTO participantes(nome,email)VALUES ('$nome','$email') ";

    $conexao->query($sql);

}



