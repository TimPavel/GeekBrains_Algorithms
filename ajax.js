$('#my_form').submit(function(){
  $.post(
    'http://localhost:7071/test.php', // адрес обработчика
    $("#my_form").serialize(), // отправляемые данные

    function(msg) { // получен ответ сервера
      $('#my_message').append("<li>" + msg  + "</li>");
    }
  );
  return false;
});

$('#deleteBtn').click(function(){
  $.get(
    'http://localhost:7071/DZ-3.php?action=delMsg', // адрес обработчика

    function(msg, status) { // получен ответ сервера
      console.log(msg);
      console.log(status);
      // $('#my_message li:last-child').remove();
    }
  );
  return false;
});