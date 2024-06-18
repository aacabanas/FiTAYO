import '../bootstrap';
import jQuery from 'jquery';
import 'bootstrap';
import '@fortawesome/fontawesome-free/js/all';

window.$ = jQuery
$("li.nav-item>a.nav-link").on('click',function(e){
    $("#title").text($(this).text())
})