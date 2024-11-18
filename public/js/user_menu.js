$(document).ready(function(){

    var params = new window.URLSearchParams(window.location.search);
    //console.log(params.get('user_email'));

    $.post('/php/users_get_reg.php', { email:params.get('user_email') }, function(data) {
        var output = $.parseJSON(data);
        var splin_name = output[1].split('&');
        $('#user_panel_name').val(splin_name[0]);
        $('#user_panel_family').val(splin_name[1]);
        $('#user_panel_email').val(output[2]);
        //console.log(output);
    });

    $(document).on('click', '.user-navigation-link', function(){ // Подсветка активного пункта меню админа
        $('.user-navigation-link').removeClass('active-navigation-link-user');
        $(this).addClass('active-navigation-link-user');//Потом добавляем его на текущую кликнутую.
    });

    $('[data-open-block]').on('click', function() {
		const activeCls = 'is-active';
  
		$('[data-content]').removeClass(activeCls);
  		$(`[data-content="${$(this).data('open-block')}"`).addClass(activeCls);
	});
    $('#password_div').toggle();
    $('#password_div_1').toggle();
    $('#password_div_2').toggle();
    $('#password_div_3').toggle();

    $('#save_data_user').on('click', function(){
        //alert('Save status');user_panel_bottom
        var name_user = $('#user_panel_name').val()+'&'+$('#user_panel_family').val();
        $.post('/php/users_upload_name.php', { email:params.get('user_email'), name:name_user }, function(data) {
            if(data=='OK'){
                window.location.href='/user_panel?user_email='+params.get('user_email');
            }
        });
    });
    $('#user_panel_bottom').on('click', function(){
        //alert('Save status');
        $('#user_panel_bottom').toggle();
        $('#password_div').toggle();
        $('#password_div_1').toggle();
        $('#password_div_2').toggle();
        $('#password_div_3').toggle();
    });
    $('#user_panel_bottom1').on('click', function(){
        //window.location.href='/user_panel?user_email='+params.get('user_email');
        var pass = $('#user_panel_password').val();
        var pass1 = $('#user_panel_password1').val();
        var pass2 = $('#user_panel_password2').val();
        var key_pass1=0,keypass2=0;
        if(!pass1){
            //alert("Графа с паролем не должно быть пустым");
            $('#user_panel_password1').addClass("user-input-err");
            key_pass1 = 0;
        } else {
            $('#user_panel_password1').removeClass("user-input-err");
            key_pass1 = 1;
        }
        if(!pass2){
            //alert("Графа с паролем не должно быть пустым");
            $('#user_panel_password2').addClass("user-input-err");
            key_pass2 = 0;
        } else {
            $('#user_panel_password2').removeClass("user-input-err");
            key_pass2 = 1;
        }
        if(!pass){
            //alert("Графа с паролем не должно быть пустым");
            $('#user_panel_password').addClass("user-input-err");
        } else {
            $('#user_panel_password').removeClass("user-input-err");
            $.post('/php/users_get_reg.php', { email:params.get('user_email') }, function(data) {
                var output = $.parseJSON(data);
                //console.log(output[4]);
                $.post('/php/hash_vert.php', { pass1:pass, pass2:output[4] }, function(data1) {
                    //console.log(data1);
                    var int_baa = parseInt(data1);
                    if(int_baa == 1){
                        $('#user_panel_password').removeClass("user-input-err");
                        if(pass1 === pass2 && key_pass1 == 1 && key_pass2 == 1){
                            $('#user_panel_password1').removeClass("user-input-err");
                            $('#user_panel_password2').removeClass("user-input-err");
                            $.post('/php/hash_pass.php', { pass:pass1 }, function(data) {
                                $.post('/php/users_upload_pass.php', { email:params.get('user_email'), pass:data }, function(data1) {
                                    if(data1=='OK'){
                                        window.location.href="{{ route('logout') }}";
                                    }
                                });
                            });
                            
                        } else {
                            $('#user_panel_password1').addClass("user-input-err");
                            $('#user_panel_password2').addClass("user-input-err");
                        }
                        //alert("Correct");
                    } else {
                        $('#user_panel_password').addClass("user-input-err"); 
                    }
                });
            });
        }


    });
});
