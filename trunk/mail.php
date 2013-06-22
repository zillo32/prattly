<?php
session_start(); // Начинаем сессию

$to = "andy.larkin.96742@facebook.com";//"sergvild@mail.ru";
$subject = "videocall";
$text = "Hello";
$from = "videocall@prattly.besaba.com";
if($_POST)
{
mail ($to, $subject, $text, "From: $from");
//echo "<script>facebook_send_message();</script>";
} 
?>
<form method="post">
<button name="doSend">phpПозвонить</button>
</form> 