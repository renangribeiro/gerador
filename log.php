<?php

date_default_timezone_set('America/Sao_Paulo');

class Logger
{


    function geraLog($msg)
    {

//pega o path completo de onde esta executanto
        $caminho_atual = getcwd();

//muda o contexto de execução para a pasta logs

        $data = date("d-m-y");
        $hora = date("H:i:s");
        $ip = $_SERVER['REMOTE_ADDR'];

//Nome do arquivo:
        $arquivo = "log_$data.txt";

//Texto a ser impresso no log:
        $texto = "[$hora][$ip]> $msg \n";

        $manipular = fopen("$arquivo", "a+b");
        fwrite($manipular, $texto);
        chmod (getcwd().$arquivo, 0777);
        fclose($manipular);


    }




    function geraLogErro($msg)
    {

//pega o path completo de onde esta executanto
        $caminho_atual = getcwd();

//muda o contexto de execução para a pasta logs

        $data = date("d-m-y");
        $hora = date("H:i:s");
        $ip = $_SERVER['REMOTE_ADDR'];

//Nome do arquivo:
        $arquivo = "LoggerErro_$data.txt";

//Texto a ser impresso no log:
        $texto = "[$hora][$ip]> $msg \n";

        $manipular = fopen("$arquivo", "a+b");
        fwrite($manipular, $texto);
        fclose($manipular);


    }




}

?>















































