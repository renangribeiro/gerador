<?php
include ('template.php');
$teste= new Template();
//echo $teste->templateParticipante('renan sds','Agradecemos pela sua participação no 17° Festival Latino-Americano
// de Instalação de Software Livre<br>seu <b>certificado</b> de participação está anexado a este email<br>Saudações Livres!');

$teste->templateInstrutor($participanteNome,'Agradecemos pela sua contribuição no 17° Festival Latino-Americano
 de Instalação de Software Livre<br>seu certificado de <b>INSTRUTOR</b> está anexado a este email.<br><br>Saudações Livres!');
//
$teste->templateMiniCurso($participanteNome,'Agradecemos pela sua participação no 17° Festival Latino-Americano
 de Instalação de Software Livre<br>seu <b>certificado</b> de participação está anexado a este email<br><br>Saudações Livres!');
//
 $teste->templatePalestrante($participanteNome,'Agradecemos pela sua contribuição no 17° Festival Latino-Americano
de Instalação de Software Livre<br>seu certificado de <b>PALESTRANTE</b> está anexado a este email.<br><br>Saudações Livres!');
//
 $teste->templateOrganizador($participanteNome,'Agradecemos pela sua contribuição no 17° Festival Latino-Americano
de Instalação de Software Livre<br>seu certificado de <b>ORGANIZADOR</b> está anexado a este email.<br><br>Saudações Livres!');
