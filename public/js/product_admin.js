$(document).ready(function() {
    $("#delete_product").on('click', function() {
        var idarr = $("#main_parent_parents").find("li").map(function() { return this.id; }).get(); //ToArray
        for(var i = 0; i < idarr.length; i++){
            var idparr = $('#' + idarr[i]).find("div.admin-video-sort-wrap").map(function() { return this.id; }).get(); //ToArray
            var idsarr = $('#' + idparr).find("input").map(function() { return this.id; }).get();

            //var pars = idsarr.split("vl");
            var str = new RegExp("\\d+(?:\\.\\d+)");
            var num = str.exec(idsarr);
            console.log(num);
        }
            
        
    });
});