$(document).ready(function() {
    //$("#view-video-btn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();
        var count_ch = 0;
        $.post('/php/kines.php', function(data)  {
            //$('#res-video-text').text(data);
            var output = $.parseJSON(data);
            var list = output.data;

            $.each(list,function(i,item){
                    //console.log(pars);
                    $(div_video).append(
                        '<div class="slide no-bay index-live-item" id="' + item.id + '">'+
                            '<div class="index-live-item-video">'+
                                '<a >'+ 
                                    '<div class="index-live-banner">' +
                                        '<span class="label-block"><img src="img/lock.png" alt="Просмотр заблокирован" title="Просмотр заблокирован. Купите билет."></span>' +
                                        '<img src="' + item.poster.original + '">' +
                                    '</div>' +
                                '</a>' +
                                
                            '</div>'+
                            '<div class="index-live-item-text">'+
                                '<a >' + item.name + '</a>'+
                            '</div>'+
                        '</div>');

                //count_ch++;
            });
            
        });
    //});

    //$(document).on('dblclick', '.push_to_card', function() {
        //var id = this.id;
        //$("#admin_input_id").val(id);
        //console.log(id)
        //window.location.href='/video_card?admin_input_id='+id;
        //alert("Text: " + this.id);count_stream
    //});
});