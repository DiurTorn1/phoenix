$(document).ready(function() {
    $("#exel_users_load").on('click', function(){
        Backbone.TemplateManager.baseUrl = 'templates/{name}';
        //var xml = '<rss version="2.0"><channel><title>RSS Title</title></channel></rss>',
        //xmlDoc = $.parseXML( xml ),
        //$xml = $( xmlDoc ),
       // $title = $xml.find( 'title' );  
        // вставим "RSS Title" в #someElement
        //console.log( $title.text() );    
 
        // поменяем его значение на "XML Title"
       // $title.text( 'XML Title' );
 
        // вставим "XML Title" уже в #anotherElement
       // console.log( $title.text() );
        
    });
});