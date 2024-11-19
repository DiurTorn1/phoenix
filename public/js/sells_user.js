$(document).ready(function() {
    var params = new window.URLSearchParams(window.location.search);
    var user_arr_sell = new Array();
    var user_arr_product = new Array();


    
    //console.log(params.get('user_email'));
    $.post('/php/get_product_all.php', function(data) {
        var output = $.parseJSON(data);
        //console.log(output);
        $.each(output,function(i,item){
            //console.log(item.id_product);
            user_arr_product.push(item.id_product)
            $.post('/php/get_sell_user_id.php',{product_id:item.id_product}, function(data1) {
                var output1 = $.parseJSON(data1);
                //console.log(output1);
                $.each(output,function(i,item1){
                    //console.log(item1.id_product);
                    user_arr_sell.push({email:params.get('user_email'), id_product:item1.id_product})
                });
            });
        });
    });

    $.post('/php/get_product.php', function(data) {
        var output = $.parseJSON(data);
        //console.log(output);
        //console.log(user_arr_product);
        //console.log(user_arr_sell);
        var count_sub = 0, count_tick = 0;
        $.each(output,function(i,item){
            var key_sell = 0;
            console.log(item.id);
            for(var k=0;k<user_arr_sell.length;k++){
                var sell_user = user_arr_sell[i];
                console.log(sell_user.id_product);
                if(item.id == sell_user.id_product){
                    //console.log(sell_user.id_product);
                    key_sell = 1;
                }
                
            }
            for(var i=0; i<user_arr_product.length;i++){
                console.log(user_arr_product[i]);
                if(item.id == user_arr_product[i]){
                    var pars_detail = item.detail.split("+");
                    if(pars_detail[0] == 'ticket'){
                        count_sub++;
                        //console.log(item.name + '   ^   '+ key_sell);
                        $("#sell_ticket_user").append(
                            '<div class="admin-video-prev">' +
                                '<img id="sell_src_img" src="' + item.img_main + '">' +
                            '</div>' +
                            '<div class="admin-video-item-header">' +
                                '<div class="admin-video-item-h-list">' +
                                    '<span class="admin-video-item-h-date">' + item.name + '</span>'+
                                '</div>' +
                            '</div>'
                        );

                    }else if(pars_detail[0] == 'subscript'){
                        count_tick
                        //console.log(item.name + '   ^   '+ key_sell);
                        $("#sell_subs_user").append(
                            '<div class="admin-video-prev">' +
                                '<img id="sell_src_img" src="' + item.img_main + '">' +
                            '</div>' +
                            '<div class="admin-video-item-header">' +
                                '<div class="admin-video-item-h-list">' +
                                    '<span class="admin-video-item-h-date">' + item.name + '</span>'+
                                '</div>' +
                            '</div>'
                        );
                    }

                }
            }
            console.log(count_sub + "  ^  " + count_tick);
            //var int_id = parseInt(item.id_product);
            //user_arr_sell.push({email:params.get('user_email'), id_product:int_id})
            /**
             *                         $("#product_list_add").append(
                            '<li class="admin-video-item admin-back" id="' + output[0] + '">' +
                            '<div class="admin-video-prev">' +
                                '<img src="' + output[17] + '" alt="" class="" style="heigth: 100%; width: 100%">' +
                            '</div>' +
                            '<div class="admin-video-item-header">' +
                                '<div class="admin-video-item-h-list">' +
                                    '<span class="admin-video-item-h-date">' + output[1] + '</span>' +
                                '</div>' +
                                '<div class="admin-video-item-h-hashtag">' +
                                    '<span class="admin-prod-hashtag">' + output[2] + '</span>' +
                                '</div>' +
                                '<div class="admin-video-item-info admin-video-item-view">' +
                                    '<button class="button_prod_dyn" id="' + output[0] + '">Добавить</button>' +
                                '</div>' +
                            '</div>' +
                        '</li>');

							
             */
        });
    });
});