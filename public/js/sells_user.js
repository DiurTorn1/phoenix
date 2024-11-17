$(document).ready(function() {
    var params = new window.URLSearchParams(window.location.search);
    console.log(params.get('user_email'));
});