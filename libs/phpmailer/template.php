<?php

class Template
{

    function templateParticipante($participanteNome, $msg)
    {
        $participanteNome = strstr(ucfirst($participanteNome), ' ', true);

        return " 
     <!doctype html>
<html lang=\"pt-BR\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>SFD</title>
</head>
<body bgcolor=\"#6495ed\">

<h1>Software Freedom Day Campina Grande</h1>
<h2>Olá <b>$participanteNome</b></h2>
<p style=\"font-size: 16px\">
Agradecemos pela sua presença no Software Freedom Day Campina Grande,
seu certificado de participação está anexado a este email.
<br>
<h3>Saudações Livres!</h3>
<br>
    <b>Acesse a página do evento em: </b>http://sfd.gesolcg.com.br</p>
    <b>Curta a página do GESoL no Facebook: </b>fb.com/gesol.cg.pb</p>
</body>
</html>

        
        ";
    }

    function templatePalestrante($participanteNome, $msg)
    {
        $participanteNome = strstr(ucfirst($participanteNome), ' ', true);

        return "<img src=\"\" width=\"180\" class=\"flexibleImage\"
                style=\"max-width:100%;\" alt=\"Text\"
title=\"Text\"/> ";
    }


}

