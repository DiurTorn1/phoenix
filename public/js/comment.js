function get_commentator(){

    $("#coment_list").empty();
    $("#coment_list").append(
        "<tr class='tr-wrapper admin-video-item admin-back'>" +
             "<th>ID</th>" +
             "<th>Имя</th>" +
             "<th>Почта</th>" +
             "<th width='280px'>Action</th>" +
         "</tr>");
    $.post('/php/get_commentator_all.php', function(data)  {
        var output = $.parseJSON(data);
        //console.log(output);
        $.post('/php/get_commentator_rol.php', {role_id:output[0]}, function(data_rol)  {
            var output_rol = $.parseJSON(data_rol);
            //console.log(output_rol);
            $.each(output_rol,function(i,item){
                //console.log(item.model_id);
                $.post('/php/get_commentator_user.php', { model_id:item.model_id }, function(data_user)  {
                    //console.log(data_user);
                    var output_user = $.parseJSON(data_user);
                    //console.log(output_user);
                        $("#coment_list").append(
                               "<tr id='com_" + output_user[0] + "' class='tr-wrapper admin-video-item admin-back comment_get'>" +
                                    "<td>"+output_user[0]+"</td>" +
                                    "<td>"+output_user[1]+"</td>" +
                                    "<td>"+output_user[2]+"</td>" +
                                    "<td class='td-item-action'>" +
                                        "<a id='status_online'>offline</a>" +
                                        "<a >Редактировать</a>" +
                                    "</td>" +
                                "</tr>");

                });
            });
        });
    });
}

$(document).ready(function(){  

    get_commentator();
    setInterval('get_commentator()',5000);



    $(document).on('dblclick', '.comment_get', function() {
        //alert("Button dblclick");
        var id = this.id;
        //alert(id);
        ///$("#admin_input_id").val(id);
        window.location.href='/card_comment?com_input_id='+id;
        
        //var idsarr = $('#' + this.id).find("div").map(function() { return this.id; }).get();
        //var idparr = $('#' + idsarr[0]).find("input").map(function() { return this.id; }).get();

        //console.log(idsarr);
        //var ch = $("#" + idsarr).is(':checked');
        //console.log(ch);
        //var pars = idparr[0].split("vl");
        //var id = pars[1];
        //window.location.href='/card_product?product_id='+id;
        //alert("Text: " + id);
        //if(ch){
           // $.post('/php/delete_product.php', {id:id}, function(data){
                //console.log(data);
            //});
            
        //}
    });
});