$(document).ready(function() {
    $("#admin-video-list-btn").on('click', function(){
        var main = $('#admin-input-main').val();
        $.post('/php/get_stream.php', function(data)  {
            //alert("Text:"+data);
            console.log(data);
            
        });
        //var month = label.val('month');
        //var year = label.val('year');
        //var text = label.text();
        //alert(text);
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();
        
    });
});