import './bootstrap';

import jQuery from 'jquery';
import 'bootstrap'

window.$ = jQuery


window.memData = function(id){
    $.ajax({
        url:'/member/'+id,
        method:"GET",
        async: false,
        success: function(data){
            $("#userID").val(id)
            $.each(data,function(k,v){
                if(k=="editUserLabel"){
                    $("#"+k).text(v)
                }
                $("#"+k).val(v)
            })
        }
    })
}
//search
$("#search").on("keyup keydown", function () {
    var val = $(this).val().toLowerCase();

    $("#mem-list>tbody>tr").filter(function () {
        $(this).toggle($(this).find("td:eq(8)").text().toLowerCase().indexOf(val) > -1)

    })
})
