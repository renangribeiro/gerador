<?php
include 'libs/banco_dados.class.php';
$banco= new banco_dados("localhost", "root", "renan", "certificado");
$conexao=$banco->conecta();


class Certificado
{
    public $nome_para_certificado = '';
    public $modelo_de_certificado = '';

    function __construct($nome, $modelo)
    {
        $this->nome_para_certificado = $nome;
        $this->modelo_de_certificado = $modelo;
    }

    function removeAcentos($string)
    {
        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ ,;:./';
        $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr______';
        $string = utf8_decode($string);
        $string = strtr($string, utf8_decode($a), $b); //substitui letras acentuadas por "normais"
        $string = strtoupper($string); // passa tudo para minusculo
        $string = utf8_decode($string);
        $string = str_replace("_", " ", $string);
        return $string; //finaliza, gerando uma saída para a funcao
    }


    public function gerar($nomeParticipante, $tipo, $palestra)
    {
        header('Content-Type: image/png');
        header("Content-Transfer-Encoding: binary");
        header('Content-Description: File Transfer');
//        header('Content-Disposition: attachment; filename=' . $this->nome_para_certificado . '.png');

        $texto = $this->removeAcentos($this->nome_para_certificado);
        $palestra = $this->removeAcentos($palestra);
        $img = imagecreatefrompng($this->modelo_de_certificado);
        $preto = imagecolorallocate($img, 0, 0, 0);
        $font_path = 'font/arialbd.ttf';


//        pales
        if ($tipo == '2') {

            imagettftext($img, 20, 0, 300, 365, $preto, $font_path, $texto);//nome
            imagettftext($img, 15, 0, 150, 470, $preto, $font_path, $palestra);//tema

//            auditório
        } else if ($tipo == '400') {


            imagettftext($img, 20, 0, 300, 365, $preto, $font_path, $texto);//auditório


//            instrutor
        } else if ($tipo == '7') {

            imagettftext($img, 20, 0, 300, 325, $preto, $font_path, $texto);//nome
            imagettftext($img, 15, 0, 160, 460, $preto, $font_path, $palestra);//tema


//            mc


        } else {


            if(strlen($texto)<40){

                imagettftext($img, 15, 0, 250, 305, $preto, $font_path, $texto);//mc

            }else{

                imagettftext($img, 15, 0, 80, 315, $preto, $font_path, $texto);//mc
            }



        }

        imagepng($img, 'certificados/' . $nomeParticipante);
        imagedestroy($img);


    }
}





