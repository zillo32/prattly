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

echo "Сообщение отправлено пользователю  <br>".$to;

?>