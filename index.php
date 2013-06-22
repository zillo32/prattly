<?php

$sApplicationId = '145935892226302';
$sApplicationSecret = '953143385191ccd9a35886a10d4edea5';
$iLimit = 99;

?>


<!DOCTYPE html>
<html lang="en" xmlns:fb="https://www.facebook.com/2008/fbml">
    <head>
        <meta charset="utf-8" />
        <title>Prattly.com</title>
        <link href="css/main.css" rel="stylesheet" type="text/css" />
    <script src="jquery-1.9.0.min.js"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.js"></script>
 <!--  <script type="text/javascript" src="ajax.js"></script> -->
    </head>
    <body>
        <center>
            <h1>Авторизация:</h1>
            <div id="user-info"></div>
            <button id="fb-auth">Используйте ваш логин facebook</button>
 <!-- <button id="fb-send" onclick="facebook_send_message();">Отправить сообщение</button>-->
  <?php  echo '<form action="" id="myform"><input type="button"  onclick="send(100001894793264);" value="Отправить"  /></form><div id="result"></div>' ?>
<img src="facebook.png" class="facebook" alt="facebook" />
        </center>

        <div id="result_friends"></div>
        <div id="fb-root"></div>

        <script>
//////////////////
function send(x)
{
FB.api(x.toString(), function(response) {
var data=response.username+'@facebook.com';

 // Отсылаем паметры
       $.ajax({
               type: "POST",
                url: "SendData.php",
                data: "data="+data,
                // Выводим то что вернул PHP
                success: function(html) {
 //предварительно очищаем нужный элемент страницы
                        $("#result").empty();
//и выводим ответ php скрипта
                        $("#result").append(html);
                }
        });
});

}

////////////////////////////
var x="ok";
/*
function facebook_send_message(x) {
    FB.ui(
{
        method: 'send',
        name: "Видеозвонок",
caption: 'Bringing Facebook to the desktop and mobile web',
        to: x,
        message: 'hi',
     link: 'http://fiphiker.16mb.com/#private-e67374348c6',
        description:'ответьте на звонок'

    }

);
}
*/


/*var male="test@facebook.com";*/
function facebook_send_message1(x) {

FB.api(x.toString(), function(response) {
//var male=response.username+'@gmail.com';
//alert(male);
var male="sergvild@mail.ru";
<?php /*echo 'alert(male);';*/ ?>
<?php

$to = "male";//"sergvild@mail.ru";
echo $to;
$subject = "videocall";
$text = "Hello";
$from = "videocall@prattly.besaba.com";

mail ($to, $subject, $text, "From: $from");
//echo "<script>facebook_send_message();</script>";

?>
});


/*FB.api('/me', function(response) {

alert('Your мыло ' + response.email);
});
*/
}


        function sortMethod(a, b) {
            var x = a.name.toLowerCase();
            var y = b.name.toLowerCase();
            return ((x < y) ? -1 : ((x > y) ? 1 : 0));
        }

        window.fbAsyncInit = function() {
            FB.init({ appId: '<?= $sApplicationId ?>', 
                status: true, 
                cookie: true,
                xfbml: true,
                oauth: true
            });

            function updateButton(response) {
                var button = document.getElementById('fb-auth');

                if (response.authResponse) { // in case if we are logged in
                    var userInfo = document.getElementById('user-info');
                    FB.api('/me', function(response) {
                        userInfo.innerHTML = '<img src="https://graph.facebook.com/' + response.id + '/picture">' + response.name;
                        button.innerHTML = 'Logout';
                    });

                    // get friends
                    FB.api('/me/friends?limit=<?= $iLimit ?>', function(response) {
                        var result_holder = document.getElementById('result_friends');
                       var friend_data = response.data.sort(sortMethod);
                    //    var friend_data = response.sort(sortMethod);
                  // var friend_username = response.data.sort(sortMethod);
            $('#result_friends').draggable();
                  
                        var results = '';
                        for (var i = 0; i < friend_data.length; i++) {
                          /*  results += '<div><img src="https://graph.facebook.com/' + friend_data[i].id + '/picture">' + friend_data[i].name +'</br>'+ '<button id="fb-send" onclick="facebook_send_message1('+ friend_data[i].id+');" >Позвонить</button><form method="POST" action="" enctype=""><input type="submit" name="doSend" value="Отправить" /></form></div>';*/
results += '<div><img src="https://graph.facebook.com/' +friend_data[i].id + '/picture">' + friend_data[i].name +'</br>'+ '<button id="fb-send" onclick="facebook_send_message1('+friend_data[i].id+');" >jsПозвонить</button><?php  echo '<form action="" id="myform"><input type="button"  onclick="send(\'+friend_data[i].id+\');" value="Отправить"  /></form><div id="result"></div>' ?></div>';
/*results += '<div><img src="https://graph.facebook.com/' +friend_data[i].id + '/picture">' + friend_data[i].name +'</br>'+ '<button id="fb-send" onclick="facebook_send_message1('+friend_data[i].id+');" >jsПозвонить</button><?php  echo '<form action="" id="myform"><input type="text" name="mydata" id="mydata" /><input type="button"  onclick="facebook_send_message1(\'+friend_data[i].id+\');" value="Отправить"  /></form>' ?></div>';*/
                        }

                        // and display them at our holder element
                        result_holder.innerHTML = '<h2>Result list of your friends:</h2>' + results;
                    });

                    button.onclick = function() {
                        FB.logout(function(response) {
                            window.location.reload();
                        });
                    };
                } else { // otherwise - dispay login button
                    button.onclick = function() {
                        FB.login(function(response) {
                            if (response.authResponse) {
                                window.location.reload();
                            }
                        }, {scope:'email'});
                    }
                }
            }

            // run once with current status and whenever the status changes
            FB.getLoginStatus(updateButton);
            FB.Event.subscribe('auth.statusChange', updateButton);    
        };
            
        (function() {
            var e = document.createElement('script'); e.async = true;
            e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
            document.getElementById('fb-root').appendChild(e);
        }());
        </script>

</body>
</html>




