<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Prattly.com</title>
    </head>
    <body>
	   <div id="result_friends"></div>
 <!-- <button id="fb-send" onclick="facebook_send_message();">Отправить сообщение</button>-->

  <script>
   var results = '';
var result_holder = document.getElementById('result_friends');
var a="fdhgfgfhf";
results += '<div>' + '<button id="fb-send" onclick="facebook_send_message();" >Позвонить</button><?php echo '<button onclick="facebook_send_message("'+a+'");">клац</button>'?></div>';
     var x="ok";
result_holder.innerHTML =  results;
function facebook_send_message(x) {

alert(x);
}
        </script>

</body>
</html>