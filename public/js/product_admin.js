$(document).ready(function() {
    $("#delete_product").on('click', function() {
        var idarr = $("#main_parent_parents").find("li").map(function() { return this.id; }).get(); //ToArray
        for(var i = 0; i < idarr.length; i++){
            var idstr = "#"+idarr[i];
            var idparr = $(idstr).find("div").map(function() { return this.id; }).get(); //ToArray
            console.log(idparr);
        }
            
        
    });
});