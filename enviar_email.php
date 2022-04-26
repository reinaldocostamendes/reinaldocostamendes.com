<?php
	$name=addslashes($_GET['name']);
	$email=addslashes($_GET['email']);
	$phone=addslashes($_GET['phone']);
	$message=addslashes($_GET['message']);
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "<div class='alert alert-danger'>Email invalido</div>";	
}else{
enviarEmail($name,$email,$phone,$message);
echo "<div class='alert alert-success'>Mensagem enviada com sucesso, obrigado pelo seu contato!</div>";	
}
function enviarEmail($name,$email,$phone,$message){
	
	$to = $email; 
    $from = "info@reinaldocostamendes.com"; 
    $subject = "Contato atravez do formulario!"; 
		     $message = '
<html> 
<style>
body{
	text-align:center;
	padding:10px;
}
#conteudo_email{
	text-align:left;
	display:inline-table;
}
a{
	border-radius:10px;
	padding:5px;
	background:aqua;
	color:#fff;
	font-weight:bolder;
}
h1{
	border-bottom:4px solid #CCC;
		text-align:left;
}
</style>
  <body> 
  <h1 style="border-bottom:6px solid #CCC; padding:12px;
		text-align:left;">Contato atravez do formulario:</h1>
		<img style="width:100%;height:80px;float:left;margin-bottom:20px;" src="https://reinaldocostamendes.com/img/mail_banner.jpg"/>
  <div id="conteudo_email">
		<a style="	border-radius:10px;
	padding:12px;
	background:#fed136;
	font-weight:bolder;
	color:#fff;
	font-weight:bolder;" href="https://reinaldocostamendes.com/"> Ir para Página</a> 
		<p>Nome: '.$name.'</p>
		<p>Email: '.$email.'</p>
		<p>Telefone: '.$phone.'</p>
     <br><br>'.$message.'.<br><br> Com os melhores cumprimentos,<br>Reinaldo Mendes<br><br>
	 <a style="	border-radius:10px;
	padding:12px;
	background:#fed136;
	font-weight:bolder;
	color:#fff;
	font-weight:bolder;" href="https://reinaldocostamendes.com/">www.reinaldocostamendes.com</a><br><br>
	 info@reinaldocostamendes.com
	 </div>
  </body> 
</html>';
$cc ="reinaldocmen@gmail.com";
   $headers  = "From: $from\r\n"; 
    $headers .= "Content-type: text/html\r\n";
	$headers .= "Reply-To: $to";	
		@mail($to, $subject, $message, $headers); 
		@mail($cc, $subject, $message, $headers); 
	return true;
}
?>