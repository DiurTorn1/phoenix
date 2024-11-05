$(document).ready(function() {

    $.post('/php/get_product_all.php', function(data)  {
        //for(var i=0; i<data.length;i++){
            var output = $.parseJSON(data);
            $.each(output,function(i,item){
                if(!item.initial){
                    $.post('/php/get_product_card.php', {id:item.id_product}, function(data)  {
                        var pars = data.split("&");
                        //console.log(pars[1]);
                        $('#product_promocode').append($('<option>', {
                            value: 1,
                            text: pars[1]
                        }));
                    });

                }

                //console.log(item.id_product);
            });
            
        //}
        
    });

    $.post('/php/get_ppromocode_all.php', function(data)  {
        var output = $.parseJSON(data);
        console.log(output);
    });
    /*<tr class="tr-wrapper admin-video-item admin-back">
				<td class="table-one-column-check">
		 			<div class="admin-video-sort-wrap">
						<input id="check-promo-1" class="admin-video-sort-check" type="checkbox">
						<label class="admin-video-check-label" for="check-promo-1"></label>
					</div>
				</td>
		    	<th class="table-one-column">Промокод Волей</th>
		    	<td><p class="promo-prew-admin">Wolley2024</p></td>
		    	<td>5</td>
		    	<td>0</td>
		    	<td>05 сентября 2024</td>
			</tr>*/ 
    
    $("#add-new-promocode").on('click', function(){
        $('#open-create-promocode').toggle();
    });

    $("#add-multi-promocode").on('click', function(){
        $('#open-create-multi-promocode').toggle();
    });
    
    $("#close-multi-promocode").on('click', function(){
        $('#open-create-multi-promocode').toggle();
    });

    $("#close-add-promocode").on('click', function(){
        $('#open-create-promocode').toggle();
    });

    $("#add_promocode").on('click', function(){
        //console.log("Start");
        $("#log_promocode_add").text("");
        var title = $("#title_promocode_top").val();
        console.log(title);
        if(!title){
            $("#log_promocode_add").text("Графа с заголовком не должна быть пустой.");
        }
        var promo_company = $("#promo_company").val();
        console.log(promo_company);
        var code_promocode = $("#code_promocode").val();
        console.log(code_promocode);
        var limit_promocode = $("#limit_promocode").val();
        var int_limit_promocode = parseInt(limit_promocode);
        if(!int_limit_promocode){
            $("#log_promocode_add").text("Графа с лимитом должна содержить цифру.");
        }
        console.log(int_limit_promocode);
        var sale_in_pers = $("#sale_in_pers").val();
        var int_sale_in_pers = parseInt(sale_in_pers);
        if(!int_sale_in_pers){
            $("#log_promocode_add").text("Графа со скидкой должна содержить цифру.");
        }
        console.log(int_sale_in_pers);
        var sum_sale = $("#sum_sale").val();
        var int_sum_sale = parseInt(sum_sale);
        if(!int_sum_sale){
            $("#log_promocode_add").text("Графа со скидкой должна содержить цифру.");
        }
        console.log(int_sum_sale);
        var product_promocode = $("#product_promocode option:selected").text();
        console.log(product_promocode);

        var datetime_start = $("#datetime_start").val();
        var res_datetime_start = "";
        var pars_datetime_start = datetime_start.split("T");
        res_datetime_start = pars_datetime_start[0] + " " + pars_datetime_start[1] + ":00";
        console.log(res_datetime_start);

        var datetime_stop = $("#datetime_stop").val();
        var res_datetime_stop = "";
        var pars_datetime_stop = datetime_stop.split("T");
        res_datetime_stop = pars_datetime_stop[0] + " " + pars_datetime_stop[1] + ":00";
        console.log(res_datetime_stop);

        var dNow = new Date();
        var localdate= dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':00';//2024-08-28 15:37:32
        console.log(localdate);

        $.post('/php/promocode_add.php', { title: title, promo_company:promo_company, code_promocode:code_promocode, limit_promocode:int_limit_promocode,
                                        sale_in_pers:int_sale_in_pers, sum_sale:int_sum_sale, product_promocode:product_promocode, res_datetime_start:res_datetime_start,
                                        res_datetime_stop:res_datetime_stop, create_at:localdate}, function(data){
            if(data == "OK"){
                alert("Промокод создан");
                $('#open-create-promocode').toggle();
                window.location.href='/promocode';
            }
            //console.log(data);
        });
    });
});