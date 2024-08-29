$(document).ready(function() {
    $("#exel_users_load").on('click', function(){
        var xml = '<rss version="2.0"><channel><title>RSS Title</title></channel></rss>',
        xmlDoc = $.parseXML( xml ),
        $xml = $( xmlDoc ),
        $title = $xml.find( 'title' );  
        console.log($title);
    });
});