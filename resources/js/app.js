import './bootstrap';

import jQuery from 'jquery';
import 'bootstrap'
import '@fortawesome/fontawesome-free/js/all';

window.$ = jQuery



$("#dismiss,#close").on("click",function(e){
    $("#updateForm")[0].reset()
})

$("button[type='fitayo-delete']").on("click",function(e){
    var id = $(this).index()+1
    $.ajax({
        url:'/delete/'+id,
        method:"GET",
        async: false,
        success: function(data){
           alert("user deleted")
        }
    })
})
$("button[type='fitayo-edit']").on("click",function(e){
    var id = $(this).index()+1
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
})

//search
$("#search").on("keyup keydown", function () {
    var val = $(this).val().toLowerCase();

    $("#mem-list>tbody>tr").filter(function () {
        $(this).toggle($(this).find("td:eq(0)").text().toLowerCase().indexOf(val) > -1)

    })
})
