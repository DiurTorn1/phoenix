$(document).ready(function() {
    $("#save-st").on('click', function(){
        var main = $('#block-admin-inputct').val();
        console.log("Select:" + $("#admin_region_selectct option:selected").text());
        console.log("Season:" + $("#admin_season_seasonct").val());
        console.log("Turnir:" + $("#admin_turnir_seasonct").val());
        console.log("Weigth:" + $("#admin_weigth_seasonct").val());
        console.log("Product:" + $("#admin_product_seasonct").val());
        console.log("Vid sporta:" + $("#admin_vidsporta_seasonct option:selected").text());
        console.log("Minframe:" + $("#admin_minframe_seasonct option:selected").index());
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