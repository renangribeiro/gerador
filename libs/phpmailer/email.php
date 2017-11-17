<?php
require('PHPMailerAutoload.php');
require('class.phpmailer.php');
require('class.smtp.php');

class Email
{

    function geraLog($msg,$num)
    {

//pega o path completo de onde esta executanto
        $caminho_atual = getcwd();

//muda o contexto de execução para a pasta logs

        $data = date("d-m-y");
        $hora = date("H:i:s");
        $ip = $_SERVER['REMOTE_ADDR'];

//Nome do arquivo:
        $arquivo = "Logger_$data.txt";

//Texto a ser impresso no log:
        $texto = "[$num]-[$hora]> $msg \n";

        $manipular = fopen("$arquivo", "a+b");
        fwrite($manipular, $texto);
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


    function removeAcentos($string)
    {
        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ ,;:./';
        $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr______';
        $string = utf8_decode($string);
        $string = strtr($string, utf8_decode($a), $b); //substitui letras acentuadas por "normais"
        $string = strtoupper($string); // passa tudo para minusculo
        $string = utf8_decode($string);
        $string = str_replace("_", "", $string);
        return $string; //finaliza, gerando uma saída para a funcao
    }


    public function enviarEmail($titulo, $nome, $destinatario, $body,$anexo)
    {


// Inicia a classe PHPMailer
        $mail = new PHPMailer();
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsSMTP(true); // Define que a mensagem será SMTP
        $mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
        $mail->Port = 465;
        $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
        $mail->SMTPSecure = 'ssl';
        $mail->Username = 'email'; // Usuário do servidor SMTP
        $mail->Password = 'senha'; // Senha do servidor SMTP
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->From = "gesol.cg@gmail.com"; // Seu e-mail
        $mail->FromName = "Grupo de Entusiastas"; // Seu nom
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->AddAddress($destinatario, $nome);
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->Subject = "Software Freedom Day Campina Grande"; // Assunto da mensagem
        $mail->Body = $body;
        $mail->AltBody = "";


// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->AddAttachment('certificados/' . $anexo);  // Insere um anexo



// Envia o e-mail
        $enviado = $mail->Send();
// Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();
// Exibe uma mensagem de resultado
        if ($enviado) {
            echo "E-mail enviado!";
        } else {
            echo "Não foi possível enviar o e-mail.";
            echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;

            $this->geraLogErro($mail->ErrorInfo);
        }
    }


}