<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset','UTF-8');
function acentuacao_assunto($string){ return '=?UTF-8?B?'.base64_encode($string).'?='; }

//https://vasconcellossolutions.com
//https://vasconcellos.site

$destinatario= "contact@corporation.com";

$remetente = $_POST['email'];
$sender = $destinatario;
$name = $_POST['name'];
$subject = $_POST['subject'];
$text = $_POST['texto'];
$telephone = $_POST['telephone'];
$subject = $subject." - ".date("d/m/Y H:i");

$textofinal = 
"E-mail: ".$remetente."
Nome: ".$name."\n
Assunto: ".$subject."
Telefone: ".$telephone."\n
Mensagem: \n".$text."\n\n
Enviado: ".date("d/m/Y H:i")."";

$headers = "From: $remetente\r\n";
$headers .= "Reply-To: $remetente\r\n";
$envio = mail($destinatario,acentuacao_assunto($subject), $textofinal, $headers);

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

