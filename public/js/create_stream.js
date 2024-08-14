$(document).ready(function() {
    $("#save-st").on('click', function(){
        var main = $('#block-admin-inputct').val();
        var region = $("#admin_region_selectct option:selected").text();
        var season = $("#admin_season_seasonct").val();
        var turnir = $("#admin_turnir_seasonct").val();
        var weigth = $("#admin_weigth_seasonct").val();
        var product = $("#admin_product_seasonct").val();
        var vid_sporta = $("#admin_vidsporta_seasonct option:selected").text();
        var minframe = $("#admin_minframe_seasonct option:selected").index();
        console.log("Start:" + $("#ditetime_start_at").val() + ", Public:" + $("#ditetime_public_at").val());
        $.post('/php/create_stream.php',{name: main, region: region, season: season, turnir: turnir, weigth: weigth, product: product, vid_sporta: vid_sporta, minframe: minframe}, function(data)  {  //admin_input_select
            //alert("Text:"+data);admin_input_seasonct   ditetime_start_at
            console.log(data);
            
        });
        //window.location.href='/stream';//?block-admin-input='+id;
        //var month = label.val('month');
        //var year = label.val('year');
        //var text = label.text();
        //alert(text);
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();
        
    });
});