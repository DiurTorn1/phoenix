var idch = 0;
var key_main_chack = 0;
var get_ch_list = 1;
var num_list = 0;
var num_list1 = 10;
var num_list2 = 0;
var count_stream = 0;
var key_paint = 0;
var array_stream = new Array();
var array_stream1 = new Array();
var array_name_stream = new Array();
var table_array_gl = new Array();
var public_stream_list = new Array();
var public_product_perm = new Array();
var public_product_perm2 = new Array();
var array_product = new Array();

function get_paint_element_video(){
    for(var i = 0; i < count_stream; i ++){
        $.post('/php/get_video_id.php',{ id:array_stream[i] }, function(data)  {
            var output = $.parseJSON(data);
            var list = output.data;
            //console.log(list);

            var key_pub = 0, active_class = '';
            for(var i = 0; i < public_stream_list.length; i++){
                if(public_stream_list[i] == list.title){ key_pub = 1;}
                //console.log(public_stream_list);
            }
            if(key_pub){
                
                $("#video_list_search").append(
                    '<div class="slide bay index-live-item" id="' + list.id + '">'+
                        '<div class="index-live-item-video">'+
                            '<a >'+ 
                                '<div class="index-live-banner">' +
                                    '<img src="' + list.poster.original + '">' +
                                '</div>' +
                            '</a>' +
                            
                        '</div>'+
                        '<div class="index-live-item-text">'+
                            '<a >' + list.title + '</a>'+
                        '</div>'+
                    '</div>');
            } else {
            }
        });
    }
}


function get_stream_array(){
    
    var count = 0;
    $.post('/php/kines.php', function(data)  {
        var output = $.parseJSON(data);
        var pre_arr = new Array();
        $.each(output.data,function(i,item){
            pre_arr.push(item.id);
            count++;
        });
        //pre_arr.push(output.data);
        array_stream.splice(0, array_stream.length);
        for(var i = 0; i < pre_arr.length; i++){
            array_stream.push(pre_arr[i]);
            
        }
        count_stream = count;
    });
    if(!key_paint){
        
        //console.log(count_stream);
        for(var i = 0; i < count_stream; i++){
            array_stream1.push(array_stream[i]);           
        }
        if(array_stream1[0]){
            get_paint_element_video();
            key_paint = 1;
        }

    }
    //for(var i = 0; i < count_stream; i++){
    if(array_stream[0]!=array_stream1[0]){
            //setInterval('paint_element_stream()',100);
        $("#video_list_search").empty();
        idch = 0;
        key_paint = 0;
    }
    //}
    //console.log(count_stream);
    //console.log(array_stream);
    //var list = json_product.data;
}

function get_product_public(){
    var count1 = 0;
    if(!public_product_perm[0]){
        $.post('/php/get_product.php', function(data)  {
            var output = $.parseJSON(data);
            //console.log(output);
            var pre_arr = new Array();
            $.each(output,function(i,item){
                pre_arr.push(item.id);
                count1++;
            });
            //pre_arr.push(output.data);
            //console.log(pre_arr);
            for(var i = 0; i < pre_arr.length; i++){
                array_product.push(pre_arr[i]);
                
            }
            //console.log(array_product);
            count_product = count1;
        });
    
    
        for(var i = 0; i < array_product.length; i ++){
            //if(array_product[i] == users_sells[i]){
                //console.log(array_product[i]);
                //console.log(users_sells[i]);
                $.post('/php/get_product_public.php',{ id:array_product[i] }, function(data)  {
                    var output = $.parseJSON(data);
                    //console.log(output);
                    var prm_prod = output ? output[4]:'';
                    //console.log(prm_prod);
                    table_array_gl.push(prm_prod);
                    $.post('/php/get_product_table.php',{ table:prm_prod }, function(data1)  {
                        var public_product_perm1 = new Array();
                        var key_product_perm = 0;
                        var output1 = $.parseJSON(data1);
                        $.each(output1,function(i,item1){
                            //if(item1.id_stream == id_stream_prod){
                                //console.log(item1.id_stream);
                                public_product_perm1.push(item1.id_stream);
                                key_product_perm++;
                                //key_prod_perm_stream1 = 1;
                            //}
                            //console.log(id_stream_prod);
                        });
                        //console.log(key_prod_perm_stream);
                        for(var i = 0; i < key_product_perm; i++){
                            //console.log(public_product_perm1[i]);
                            public_product_perm.push(public_product_perm1[i]);
                        }
                        
                    });
                    $.post('/php/get_product_table.php',{ table:prm_prod }, function(data2)  {
                        var public_product_perm3 = new Array();
                        var key_product_perm1 = 0;
                        var output2 = $.parseJSON(data2);
                        $.each(output2,function(i,item2){
                            //if(item1.id_stream == id_stream_prod){
                                //console.log(item1.id_stream);
                                public_product_perm3.push({table:prm_prod, id:item2.id_stream});
                                key_product_perm1++;
                                //key_prod_perm_stream1 = 1;
                            //}
                            //console.log(id_stream_prod);
                        });
                        //console.log(key_prod_perm_stream);
                        for(var i = 0; i < key_product_perm1; i++){
                            //console.log(public_product_perm1[i]);
                            public_product_perm2.push(public_product_perm3[i]);
                        }
                        
                    });
                });
            //}
           
    
        }
        var count2 = 0;
        $.post('/php/get_video_public_all.php', function(data){
            var output = $.parseJSON(data);
            //console.log(output);
            $.each(output,function(i,item){
                //console.log(item.name_stream);
                public_stream_list.push(item.name);
            });
        });
    }

}

$(document).ready(function() {
    var params = new window.URLSearchParams(window.location.search);
    //get_stream_array();
   // setInterval('get_stream_array()',500);
   // get_product_public();
    //setInterval('get_product_public()',500);

    $.post('/php/get_video_id.php',{ id:params.get('player_stream_id') }, function(data)  {
        var output = $.parseJSON(data);
        var list = output.data;
        //console.log(list);
                    //console.log(pars);
        $("#player_stream_get").append(
            '<div class="index-live-item-video-1">' +
                '<iframe src="' + list.play_link + '" width="1080" height="840" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; encrypted-media; gyroscope; accelerometer; clipboard-write;"></iframe>' +
            '</div>' +
            '<div class="index-live-item-text">' +
                '<a>' + list.title + '</a>' +
            '</div>' + 
            '<div class="index-live-item-text">' +
                '<div class="admin-input-box admin-input-wrap">' +
                    '<label>Описание</label>' +
                    '<textarea name="Описание" class="block-admin-input respons-input admin-input" disabled></textarea>' +
                '</div>' +
            '</div>'); 
    });

    
});