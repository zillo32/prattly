function send(x)
{
FB.api(x.toString(), function(response) {
var male=response.username+'@facebook.com';
  // �������� �������
       $.ajax({
                type: "POST",
                url: "SendData.php",
                male: "male="+male,
                // ������� �� ��� ������ PHP
                success: function(html) {
 //�������������� ������� ������ ������� ��������
                        $("#result").empty();
//� ������� ����� php �������
                        $("#result").append(html);
                }
        });
});
/*
//�������� ���������
var data = $('#mydata').val()
  // �������� �������
       $.ajax({
                type: "POST",
                url: "SendData.php",
                data: "data="+data,
                // ������� �� ��� ������ PHP
                success: function(html) {
 //�������������� ������� ������ ������� ��������
                        $("#result").empty();
//� ������� ����� php �������
                        $("#result").append(html);
                }
        });
*/
}