<?php

//Chaves do ReCaptcha
$siteKey = '6Le3ZQoUAAAAAIC9bJDT6kuPRiw55OCWpR3BuYHl';
$secret = '6Le3ZQoUAAAAAIhNiC3lIjoRx-VZLpu7ABji4WxF';

//Contruir novo Formulario
$form = new controller\addForms();

$form->setFreeHtml( '<div id="sections_w">' );
	$form->setFreeHtml( '<div id="section_1">' );
		$form->setNewField( array( "name" => "name", "required" => true, "class" => "txt-field", "legend" => "Nome<span>*</span>", "optimizeto" => "name" ) );
	$form->setFreeHtml( '</div>' );
	$form->setFreeHtml( '<div id="section_2">' );
		$form->setNewField( array( "name" => "lastname", "required" => true, "class" => "txt-field", "legend" => "Sobrenome<span>*</span>", "optimizeto" => "name" ) );
	$form->setFreeHtml( '</div>' );
$form->setFreeHtml( '<div id="clear"></div></div>' );
$form->setNewField( array( "name" => "subject", "class" => "txt-field", "legend" => "Assunto" ) );
$form->setNewField( array( "name" => "email", "required" => true, "class" => "txt-field", "legend" => "E-mail<span>*</span>", "optimizeto" => "email" ) );
$form->setNewField( array( "type" => "textarea", "name" => "message", "required" => true, "class" => "txt-field", "legend" => "Mensagem<span>*</span>" ) );

$form->setReCaptcha( array( "site_key" => $siteKey, "secret_key" => $secret ) );

$form->setNewField( array( "type" => "button", "submit" => true, "class" => "btn-field", "value" => "Enviar mensagem" ) );

//Mostrar Formulario
$form->afterValidation(function() {
	
	$name = $_POST[ "name" ] . " " . $_POST[ "lastname" ];
	$email = $_POST[ "email" ];
	$subject = ( !isset( $_POST[ "subject" ] ) || empty( $_POST[ "subject" ] ) ) ? "Contato AcademicDoc" : $_POST[ "subject" ];
	
	require_once 'PHPMailer/vendor/autoload.php';
	$mail = new PHPMailerOAuth;
	
	$mail->From = 'contato@academicdoc.tk';
	$mail->FromName = 'Suporte AcademicDoc';
	
	$mail->CharSet = "UTF-8";
	$mail->isHTML(true);
	$mail->addReplyTo( $email, $name );
	$mail->addAddress( 'felipemenezesdm@outlook.com', "Felipe Menezes" );
	$mail->addCC( 'wellsmonteiro@outlook.com' );
	$mail->addCC( 'netto.correa@hotmail.com' );
	$mail->addCC( 'loumarluis@yahoo.com.br' );
	$mail->addCC( 'yuriwwallace@gmail.com' );
	$mail->Subject = $subject;
	
	$mail->Body = '<div style="background:#EEEEEE;position:relative;padding:30px;min-width:300px;">'.
						'<div style="background:#FFFFFF;margin:0 auto;width:300px;padding:30px;">' .
							'<div><a href="http://www.devry.com.br/faci" style="width:134px;height:26px;margin:0 auto;display:block;" target="_blank"><img src="http://academicdoc.tk/images/devry-faci-logo.png" height="26" /></a></div>' .
							'<div style="text-align:center;color:#444444;border-top:1px solid #EEE;border-bottom:1px solid #EEE;padding:20px 0;margin:30px 0;"><h3 style="margin:0;font-weight:normal;">ACADEMICDOC</h3><h5 style="color:#999999;margin:0;font-weight:normal;">NOVA MENSAGEM</h5></div>' .
							'<p style="font-size:18px;color:#666666;">' . $name . ', diz:</p>' .
							'<p style="font-size:18px;color:#999999;text-align:center;">' . nl2br( htmlentities( $_POST[ "message" ] ) ) . '</p>' .
							'<div style="text-align:center;color:#999999;margin-top:40px;font-size:13px;">© 2016 AcademicDoc — Todos os direitos reservados.</div>' .
						'</div>' .
				'</div>';
	
	$mail->AltBody = 'De: ' . $name . '\nE-mail: ' . $email . '\nAssunto: ' . $subject . '\nMensagem: ' . nl2br( htmlentities( $_POST[ "message" ] ) );
	
	if( $mail->send() ) {
		return array( true, "Sua mensagem foi enviada. Agradecemos seu contato e responderemos o mais breve possível." );
	} else {
		return array( false, "Ocorreu um erro inesperado e não foi possível enviar sua mensagem. Por favor, tente novamente." );
	}
		
});
echo $form->getForm();