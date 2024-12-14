$(document).ready(function(){  
    $.post('/php/get_presells.php', function(data)  {
        var output = $.parseJSON(data);
        console.log(output);
    });
});