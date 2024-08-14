$(document).ready(function() {
    $("#save-st").on('click', function(){
        var main = $('#block-admin-inputct').val();
        console.log("Select:" + $("#admin_input_selectct option:selected").text());
        console.log("Season:" + $("#admin_input_seasonct").val());
        //$.post('/php/create_stream.php',{name: main}, function(data)  {  //admin_input_select
            //alert("Text:"+data);admin_input_seasonct
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