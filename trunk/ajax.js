function send(x)
{
FB.api(x.toString(), function(response) {
var male=response.username+'@facebook.com';
  // Отсылаем паметры
       $.ajax({
                type: "POST",
                url: "SendData.php",
                male: "male="+male,
                // Выводим то что вернул PHP
                success: function(html) {
 //предварительно очищаем нужный элемент страницы
                        $("#result").empty();
//и выводим ответ php скрипта
                        $("#result").append(html);
                }
        });
});
/*
//Получаем параметры
var data = $('#mydata').val()
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
*/
}