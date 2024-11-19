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
                    $("#video_list_search").append(
                        '<div class="slide no-bay index-live-item" id="' + item.id + '">'+
                            '<div class="index-live-item-video">'+
                                '<a >'+ 
                                    '<div class="index-live-banner">' +
                                        '<img src="' + item.poster.original + '">' +
                                    '</div>' +
                                '</a>' +
                                
                            '</div>'+
                            '<div class="index-live-item-text">'+
                                '<a >' + item.title + '</a>'+
                            '</div>'+
                        '</div>');

                //count_ch++;
            });
            
        });
    //});
    /**
     * <div class="index-live-item">
					<div class="index-live-item-video">
						<a href="#">
							<span class="label">LIVE</span>
                             '<span class="label-block"><img src="img/lock.png" alt="Просмотр заблокирован" title="Просмотр заблокирован. Купите билет."></span>' +
						</a>
					</div>
					<div class="index-live-item-text">
						<a href="#">27.04.2024 Баскетбол ДБЛ "Аврора" Д 2012 Ф г. Окуловка</a>
					</div>
				</div>
				<div class="index-live-item"> <!-- С значком ЗАМКА в углу -->
					<div class="index-live-item-video">
						<a href="#">
							<span class="label-block"><img src="img/lock.png" alt="Просмотр заблокирован" title="Просмотр заблокирован. Купите билет."></span> <!-- Вот ТУТ -->
						</a>
					</div>
					<div class="index-live-item-text">
						<a href="#">27.04.2024 Баскетбол ДБЛ "Аврора" Д 2013 Ф г. Окуневка</a>
					</div>
				</div>
     */

    //$(document).on('dblclick', '.push_to_card', function() {
        //var id = this.id;
        //$("#admin_input_id").val(id);
        //console.log(id)
        //window.location.href='/video_card?admin_input_id='+id;
        //alert("Text: " + this.id);count_stream
    //});
});