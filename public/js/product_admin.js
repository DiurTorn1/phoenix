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
                $.post('/php/delete_product.php', {id:id}, function(data){
                    console.log(data);
                });
                
            }
            //var pars = idsarr[0].split("vl");
            //console.log(pars[1]);
        }
            
        
    });
});