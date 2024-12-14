$(document).ready(function(){  
    $.post('/php/get_presells.php', function(data)  {
        var output = $.parseJSON(data);
        //console.log(output);
        $.each(output,function(i,item){
            if(item.status == 'load'){
                //console.log(item.id + ' : ' + item.id_product + ' : ' + item.ip_port + ' : ' + item.mail + ' : ' + item.name_product + ' : ' + item.price + ' : ' + item.status + ' : ' + item.created_at);
                $("#presell_list").append(
                    '<tr class="tr-wrapper admin-video-item admin-back">' +
                        '<td class="paid-amount">' + item.price + ' &#8381;</td>' +
                        '<td class="">' + item.name_product + '</td>' +
                        '<td class="table-one-column">' +
                            '<a href="#" class="paid-users">' + item.mail + '</a>' +
                        '</td>' +
                        '<td class="table-one-column disp-fl-sb fl-dir-col">' + item.created_at + '</td>' +
                        '<td class="td-item-action">' +
                            '<button class="del-button del_sell" id="' + item.id + '">Удалить</button>' +
                            '<button class="del-button ver_sell" id="' + item.id + '">Подтвердить подписку</button>' +
                        '</td>' +
                    '</tr>'); 
            }
        });
    });

    $(document).on('click', '.del_sell', function() {
        var id = this.id;
        //console.log(id);
        $.post('/php/dell_presell.php', { id:id }, function(data)  {
            console.log(data);
            window.location.href='/presell';
        });
        //$("#admin_input_id").val(id);
        //window.location.href='/player_stream?player_stream_id='+id;
        //alert("Text: " + this.id);
    });
    $(document).on('click', '.ver_sell', function() {
        var id = this.id;
        $.post('/php/get_presell_id.php', { id:id }, function(data)  {
            var output = $.parseJSON(data);
            console.log(output);
        });
        //console.log(id);
        //$("#admin_input_id").val(id);
        //window.location.href='/player_stream?player_stream_id='+id;
        //alert("Text: " + this.id);
    });
});