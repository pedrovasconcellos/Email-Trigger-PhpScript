<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','UTF-8');
function acentuacao_assunto($string){ return '=?UTF-8?B?'.base64_encode($string).'?='; }

//https://vasconcellossolutions.com
//https://vasconcellos.site

$emailrecipient = "contact@corporation.com";

$senderemail = $_POST['email'];
$sender = $emailrecipient;
$name = $_POST['name'];
$subject = $_POST['subject'];
$text = $_POST['emailtext'];
$telephone = $_POST['telephone'];
$subject = $subject." - ".date("d/m/Y H:i");

$finaltext = 
"E-mail: ".$senderemail."
Nome: ".$name."\n
Assunto: ".$subject."
Telefone: ".$telephone."\n
Mensagem: \n".$text."\n\n
Enviado: ".date("d/m/Y H:i")."";

$headers = "From: $senderemail\r\n";
$headers .= "Reply-To: $senderemail\r\n";
$envio = mail($emailrecipient,acentuacao_assunto($subject), $finaltext, $headers);

if($envio) {
        echo '<script> alert("Formulário enviado com sucesso!");
        window.location.assign("index.html");
        </script>';
}
else {
        echo '<script> alert("Falha ao enviar o Formulário."); 
        window.location.assign("index.html");
        </script>';
}
?>

