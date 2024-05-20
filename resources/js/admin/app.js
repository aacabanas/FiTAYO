import '../bootstrap';

import jQuery from 'jquery';
import 'bootstrap'
import '@fortawesome/fontawesome-free/js/all';
import { view,exceptions } from './properties';


window.$ = jQuery

$("#dismiss,#close").on("click", function (e) {
    var inputs = $("#nav-viewContent").find('form')
    for(var i=0;i<inputs.length;i++){
        inputs[i].reset()
    }
})

$("button[type='fitayo-delete']").on("click", function (e) {
    var id = $(this).attr("del-key")
    $.ajax({
        url: '/delete/' + id,
        method: "GET",
        async: false,
        success: function (data) {
            alert("user deleted")
            location.reload()
        }
    })
})
$("button[type='fitayo-view']").on("click", function (e) {
    var id = $(this).attr("edit-key")
    $.ajax({
        url: '/member/' + id,
        method: "GET",
        async: false,
        success: function (data) {

            $.each(data,function(k,v){
                if(k=="viewDetail"){
                    $("#"+k).text(v)
                }
                $("#"+k).val(v)
            })
        }
    })
})
$("#toggleEdit[action='edit']").on('click', function (e) {
    $(this).on('mouseover',function(e){
        console.log(e.eventPhase)
    })
    if($(this).hasClass('btn-secondary')){
        $(this).removeClass('btn-secondary').addClass('btn-danger')
    }else{
        $(this).removeClass('btn-danger').addClass('btn-secondary')

    }
    switch ($(this).attr('target')) {
        case "credential":
            if ($(this).attr('toggled') == 0) {
                $(this).attr('toggled', 1)
                $.each(view.credentials, function (i, val) {
                    val.removeAttr('readonly')
                })
                $(this).text("Cancel")
                $("#"+$(this).attr('target')+"-submit").removeClass('d-none')
                break
            }
            $(this).attr('toggled', 0)
            $.each(view.credentials, function (i, val) {
                val.attr('readonly', 'readonly')
            })
            $(this).text("Edit")
            $("#credential-submit").addClass('d-none')
            break
        case "profile":
            if($(this).attr('toggled')==0){
                $(this).attr('toggled',1)
                $.each(view.profile,function(i,val){
                    val.removeAttr('readonly')
                })
                $(this).text("Cancel")
                $("#profile-submit").removeClass('d-none')
                break
            }
            $(this).attr('toggled', 0)
            $.each(view.profile,function(i,val){
                val.attr('readonly','readonly')
            })
            $(this).text("Edit")
            $("#profile-submit").addClass('d-none')
            break
        case "membership":
            if($(this).attr('toggled')==0){
                $(this).attr('toggled',1)
                $.each(view.membership,function(i,val){
                    val.removeAttr('readonly')
                })
                $(this).text("Cancel")
                $("#membership-submit").removeClass('d-none')
                break
            }
            $(this).attr('toggled', 0)
            $.each(view.membership,function(i,val){
                val.attr('readonly','readonly')
            })
            $(this).text("Edit")
            $("#membership-submit").addClass('d-none')
            break
        case "assessment":
            if($(this).attr('toggled')==0){
                $(this).attr('toggled',1)
                $.each(view.assessment,function(i,val){
                    val.removeAttr('readonly')
                })
                $(this).text("Cancel")
                $("#assessment-submit").removeClass('d-none')
                break
            }
            $(this).attr('toggled', 0)
            $.each(view.assessment,function(i,val){
                val.attr('readonly','readonly')
            })
            $(this).text("Edit")
            $("#assessment-submit").addClass('d-none')
            break
        
    }


}

)
//ps: dev is lazy to go back and add required attribute :)
$("input,select,textarea").each(function(i,val){
    var id = val.getAttribute('id')
    if(exceptions.includes(id)){
        return
    }
    $("#"+id).attr('required','required')
})

$("#search_member").on('keyup',function(){
    var val = $(this).val().toLowerCase();

    $("#mem-list>tbody>tr").filter(function () {
        $(this).toggle($(this).find("td:eq(0)").text().toLowerCase().indexOf(val) > -1)

    })
})

