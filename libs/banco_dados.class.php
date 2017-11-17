<?php

class banco_dados
{

    public function __construct()
    {

    }

    /************** Funçao para conectar com o banco **************/
    public function conecta()
    {
        $conexao = mysqli_connect("localhost", "root", "renan");
        mysqli_select_db($conexao,"certificado");
        return $conexao;
    }















    /************** Funçao para desconectar com o banco **************/
    public function desconecta()
    {
        $desconexao = mysqli_close();

        return $desconexao;
    }



}


?>