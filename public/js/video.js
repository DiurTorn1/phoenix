$(document).ready(function() {
    $("#view-video-btn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();

        $.post('/php/kines.php', function(data)  {
            console.log(data);
            //$('#res-video-text').text(data);
            $.each(data, function(msg) {
                //var components = lic.component.length ? lic.component : [lic.component];
                //$.each(components, function(i, comp) {
                    //comp.name + comp.url + comp.url + lic.licensetext;
                //});
                $('#res-video-text').text(msg.data);
                //console.log(lic);
            });
        });
    });
});