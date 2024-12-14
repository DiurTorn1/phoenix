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
                            '<button class="del-button" id="' + item.id + '">Удалить</button>' +
                            '<button class="del-button" id="' + item.id + '">Подтвердить подписку</button>' +
                        '</td>' +
                    '</tr>'); 
            }
        });
    });
});