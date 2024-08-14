$(document).ready(function() {
    $("#save-st").on('click', function(){
        var main = $('#block-admin-inputct').val();
        console.log("Index:" + $("#admin_input_select option:selected").index());
        //$.post('/php/create_stream.php',{name: main}, function(data)  {  //admin_input_select
            //alert("Text:"+data);
            //console.log(main);
            
        //});
        //window.location.href='/stream';//?block-admin-input='+id;
        //var month = label.val('month');
        //var year = label.val('year');
        //var text = label.text();
        //alert(text);
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();
        
    });
});