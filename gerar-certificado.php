<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
ini_set('default_charset', 'UTF-8');
include('libs/phpmailer/email.php');
include('certificado.php');
include "log.php";
require('libs/phpmailer/template.php');
require_once('libs/fpdf/fpdf.php');

$email = new Email();
$log = new Logger();
$templateEmail = new Template();



$sql = "SELECT * FROM participantes";
$participantes = $conexao->query($sql);

function removeAcentos($string)
{
    $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ ,;:./';
    $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr______';
    $string = utf8_decode($string);
    $string = strtr($string, utf8_decode($a), $b); //substitui letras acentuadas por "normais"
    $string = strtoupper($string); // passa tudo para minusculo
    $string = utf8_decode($string);
    $string = str_replace("_", "", $string);
    return $string;
}

while ($row = mysqli_fetch_assoc($participantes)) {

    $participanteNome = $row['nome'];
    $participanteData = $row['email'];

//        participante
        $imagem = new Certificado($participanteNome, "certificado-participante.png");

        $participanteNome = $row['nome'];

        $template = $templateEmail->templateParticipante($participanteNome, 'É com orgulho que anunciamos a primeira edição do Open Hardware Day Campina Grande');
        $imagem->gerar(removeAcentos($participanteNome) . '-certificado-participante.png');
        $pdf = new FPDF('L','pt',array(500,670));
        $pdf->AddPage();
        $pdf->Image('certificados/'.removeAcentos($participanteNome) . '-certificado-participante.png', '0', '0');
        $pdf->Ln();
        $pdf->Output('F','certificados/'.$participanteNome.'.pdf');
          $email->enviarEmail('Software Freedom Day - Campina Grande', $participanteNome, $row['email'], $template,$participanteNome.'.pdf');
        $log->geraLog(removeAcentos($participanteNome) .'.pdf',$num);



}