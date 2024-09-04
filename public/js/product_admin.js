$(document).ready(function() {
    $("#delete_product").on('click', function() {
        var idarr = $("#main_parent_parents")
        .find("li") //Find the spans
        .map(function() { return this.id; }) //Project Ids
        .get(); //ToArray
        for(var i = 0; i < idarr.length; i++){
            console.log(idarr[i]);
        }
            
        
    });
});