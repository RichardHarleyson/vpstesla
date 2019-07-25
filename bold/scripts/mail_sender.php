<?php
$to      = 'bobenser@gmail.com';
$subject = 'Тест Драйв';
$message = 'Имя: '.$_POST['uname'].'. Телефон: '.$_POST['uphone'];
$headers = 'From: vpstesla.com';

try{
	mail($to, $subject, $message, $headers);
	echo '1';
}
catch (Exception $e){
	$info = $e->getMessage();
	echo '0';
}
?>
