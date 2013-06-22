<?php
//Получаем данные
$to = $_POST[data];
//Так как все данные приходят в кодировке UTF при необходимости
//их можно/нужно конвертировать в нужную, но мы этого делать не будем
/*$to = "andy.larkin.96742@facebook.com";//"sergvild@mail.ru";*/
$subject = "videocall";
$text = "Hello";
$from = "videocall@prattly.besaba.com";

mail ($to, $subject, $text, "From: $from");
//echo "<script>facebook_send_message();</script>";

//$data = iconv("utf-8", "windows-1251", $data);

/*
тут можно делать все что угодно с полученными данными, а мы их просто выведем на печать.
*/

echo "Сообщение отправлено<br>".$to;

?>