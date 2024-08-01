$(document).ready(function() {
    $("#view-video-btn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();

        $.post('/php/kines.php', function(data)  {
            //console.log(data);
            $('#res-video-text').text(data);
            /*var jsondata = data;
            var output = "<ul>";
            $.each(jsondata.license, function(k, lic) {
                var components = lic.component.length ? lic.component : [lic.component];
                $.each(components, function(i, comp) {
                    output += "<li><b>Name: </b>" + comp.name + " <br /> <b>URL</b> : " + "<a href=' " + comp.url + " '>" + comp.url + "</a>" + " <br /> <b>License</b><br /><ul>" + "<div class='license'>" + lic.licensetext + "</div></ul><br />" + "</li>";
                });
            });
            output += "</ul>";
            document.getElementById("licenses").innerHTML = output;*/
        });
    });
});