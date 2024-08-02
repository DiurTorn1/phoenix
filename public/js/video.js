$(document).ready(function() {
    $("#view-video-btn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();

        $.post('/php/kines.php', function(data)  {
            console.log(data);
            $('#res-video-text').text(data);
            //var k = eval( data );
            //var result = [];k[0].details[0].v
            //$('#res-video-text').text(k[0].data[0].id);

            //$(data).each(function (i, element) {
                //result.push(element.attr.id);
                //$('#res-video-text').text(element.data.id);
        
                //if (element.children && element.children.length > 0) {
                    //var ids = get_all_ids(element.children);
        
                    //result = result.concat(ids); // or $.merge(result, ids);
               // }
            //});
        });
    });
});