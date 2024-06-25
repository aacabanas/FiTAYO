import '../bootstrap';

import jQuery from 'jquery';
import 'bootstrap'
import '@fortawesome/fontawesome-free/js/all';
import { view,exceptions } from './properties';
import base64 from 'base-64'
import { Html5QrcodeScanner } from 'html5-qrcode';
window.$ = jQuery
window.change_phone = function(code){
    $("#contact_prefix_dropdown").text(`+${code}`)
    $("#regContactPrefix").val(code)
}

new Html5QrcodeScanner('qr-reader',{fps:20,qrbox:{width:250,height:250}}).render((data)=>{

    var decoded = JSON.parse(base64.decode(data))
    $("#username").text(`Username: ${decoded.username}`)
    $.each(decoded,function(k,v){
        $(`#cin${k}`).val(v)
        $(`#co${k}`).val(v)
    })
    
})
$("button[type='personnel']").on('click',function(e){
    var make = $(this).attr('make')
    var id = $(this).attr('edit-key')
    if(id=="Unfinished")return
    var url = "/"+make+"/"+id
    $.get(url)
})
$("button[edit-key='Unfinished']").each(function(i,v){
    $(v).addClass("disabled")
})
$("#dismiss,#close").on("click", function (e) {
    var inputs = $("#nav-viewContent").find('form')
    for(var i=0;i<inputs.length;i++){
        inputs[i].reset()
    }
})
$("button[type='paid']").on("click",function(e){
    var id = $(this).attr('edit-key')
    var plan = $(this).attr('mode')
    if(id=="Unfinished")return

    var url = `user-paid/${plan}/${id}`
    $.get(url)
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
$("button[type='fitayo-edit']").on("click", function (e) {
    var id = $(this).attr("edit-key")
    $("#editCredID").val(id)
    $("#editProfID").val(id)
    $("#editMembID").val(id)
    $("#editAsseID").val(id)
    $.ajax({
        url: '/updateable/' + id,
        method: "GET",
        async: false,
        success: function (data) {

            $.each(data,function(k,v){
                
                $("#"+k).val(v)
            })
        }
    })
})
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
$("#search_non_member").on('keyup',function(){
    var val = $(this).val().toLowerCase();

    $("#non_mem_list>tbody>tr").filter(function () {
        $(this).toggle($(this).find("td:eq(0)").text().toLowerCase().indexOf(val) > -1)

    })
})
