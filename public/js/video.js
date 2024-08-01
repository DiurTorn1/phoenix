$(document).ready(function() {
    $("#view-video-btn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();

        $.post('/php/kines.php', function(data)  {
            console.log(data);
            //$('#res-video-text').text(data);
            for (i=0;i<data.length;i++){
                $('#res-video-text').text(data.data);
                // prints
                // "Failure (error): Unsuccessful. Please try again"
                // "Information Message (info): A basic informational message - Please be aware"
            }
           // $.each(data.meta, function(k, lic) {
                //var components = lic.component.length ? lic.component : [lic.component];
                //$.each(components, function(i, comp) {
                    //comp.name + comp.url + comp.url + lic.licensetext;
                //});
                //$('#res-video-text').text(lic[k]);
                //console.log(lic);
            //});
        });
    });
});