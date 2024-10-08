$(document).ready(function() {
    $("#delete_product").on('click', function() {
        var idarr = $("#main_parent_parents").find("li").map(function() { return this.id; }).get(); //ToArray
        for(var i = 0; i < idarr.length; i++){
            var idparr = $('#' + idarr[i]).find("div.admin-video-sort-wrap").map(function() { return this.id; }).get(); //ToArray
            var idsarr = $('#' + idparr).find("input").map(function() { return this.id; }).get();

            //console.log(idsarr);
            var ch = $("#" + idsarr).is(':checked');
            //console.log(ch);
            var pars = idsarr[0].split("vl");
            var id = pars[1];
            if(ch){
                $.post('/php/get_product_id.php',{ id:id }, function(data)  {
                    var output = $.parseJSON(data);
                    var parse_detail = output[2].split("+");
                    //console.log(parse_detail[0] + '_' + output[0]);
                    var name_drop = parse_detail[0] + '_' + output[0];
                    $.post('/php/drop_table_product.php', {name:name_drop}, function(data){
                        if(data == 'OK'){
                            alert("Table DROP");
                        }
                    });
                });
                $.post('/php/delete_product.php', {id:id}, function(data){
                    alert(data);
                });
                
            }
            //var pars = idsarr[0].split("vl");
            //console.log(pars[1]);
        }
            
        
    });

    $(document).on('dblclick', '.admin-video-item', function() {
        //alert("Button dblclick");
        //var id = this.id;
        ///$("#admin_input_id").val(id);
        //window.location.href='/card_broadcast?admin_input_id='+id;
        
        var idsarr = $('#' + this.id).find("div").map(function() { return this.id; }).get();
        var idparr = $('#' + idsarr[0]).find("input").map(function() { return this.id; }).get();

        //console.log(idsarr);
        //var ch = $("#" + idsarr).is(':checked');
        //console.log(ch);
        var pars = idparr[0].split("vl");
        var id = pars[1];
        window.location.href='/card_product?product_id='+id;
        //alert("Text: " + id);
        //if(ch){
           // $.post('/php/delete_product.php', {id:id}, function(data){
                //console.log(data);
            //});
            
        //}
    });

});