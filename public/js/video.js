$(document).ready(function() {
    $("#view-video-btn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();

        $.post('/php/kines.php', function(data)  {
            //console.log(data);
            var id = data.id;
            var dura = data.dura;
        
            $.each(id, function(k,v){
                $('#res-video-text').text(v.id+' '+dura[k].dura); // 1 2
            });
            //$('#res-video-text').text(data);
        });
    });
});