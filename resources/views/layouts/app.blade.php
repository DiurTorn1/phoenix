<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">
	    <meta name="mobile-web-app-capable" content="yes">
	    <meta name="apple-mobile-web-app-capable" content="yes">
	    <meta name="apple-mobile-web-app-status-bar-style" content="black">
	    <meta name="format-detection" content="telephone=no">
	    <meta data-rh="true" name="application-name" content="Феникс ТВ"><meta data-rh="true" name="apple-mobile-web-app-title" content="Феникс ТВ"><meta data-rh="true" name="msapplication-starturl" content="/?utm_source=pwa">
	    <meta data-rh="true" name="msapplication-TileColor" content="#ffffff">
	    <meta data-rh="true" name="apple-mobile-web-app-title" content="Феникс ТВ">
	    <meta data-rh="true" name="theme-color" content="#000">
		<meta data-rh="true" name="google-site-verification" content="C00ZRcEMZ1jif_fMVKn3rqKQG_goodvfWejXtr49vA0">
		<meta data-rh="true" name="twitter:title" content="ГЛАВНАЯ">
		<meta data-rh="true" property="og:title" content="ГЛАВНАЯ">
		<meta data-rh="true" name="description" content="Официальный видеосервис Центра развития спортивных проектов &quot;ФЕНИКС">
		<meta data-rh="true" property="og:description" content="Официальный видеосервис Центра развития спортивных проектов &quot;ФЕНИКС">
		<meta data-rh="true" name="twitter:description" content="Официальный видеосервис Центра развития спортивных проектов &quot;ФЕНИКС">
		
        <title>@yield('title-block')</title>
        <link rel="icon" href="{{ asset('img/logo_main.png') }}" class="top_img">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/player.css') }}" rel="stylesheet">
        <!--<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>  <link rel="stylesheet" href="{{ asset('css.css') }}">-->
        <script type="text/javascript" src = "https://code.jquery.com/jquery-3.7.1.js"></script>
        <script >$(document).ready(function() {
    //$("#publishBtn").click(function(){
    //});

    $("#publishBtn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        $.post('/php/verif.php', function(data) {
                
            $('#res_reg').text(data);
        });
    });

    $("#enterranse").on('click', function(){
        alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        
    });
    
});</script> 
</head>
<body>

    <main class="index-main">
	    <!-- Главный баннер -->
	    <div class="banner">
		    <picture class="banner-img">
			    <img src="{{ asset('img/banner.png') }}" alt="Феникс ТВ">
		    </picture>
		    <div class="banner-text">
			    <span>Феникс ТВ</span>
			    <h1>Пространство детского спорта</h1>
		    </div>
	    </div>
        @include('inc.header')

        @yield('content')
        @include('inc.footer')
    </main>

    <!---->
</body>
</html>
