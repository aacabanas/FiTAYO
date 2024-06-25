import '../bootstrap';
import jQuery from 'jquery';
import 'bootstrap';
import '@fortawesome/fontawesome-free/js/all';
import { profileButtons } from './properties';

window.$ = jQuery;

$("#accept").on('click',function(e){
    $("#dpnotice").attr("style","display:none")
    $("#filldata").attr("style","display:block")
    $("#data_privacy_accepted").val("Yes")
})

$("#pay_status").text()==1?$("#paymentNotice").click():null
$("#filled").text()==1?$("#showModal").click():null
// Profile tab navigation
$("li>a.nav-link").on('click',function(e){
    $("#title").text($(this).text())
})
$("#regWeight,#regHeight").on('change',function(e){
    if($("#regHeight").val() == "" && $("#regWeight").val() == "")return    
    var user_bmi = Math.round(($("#regWeight").val()/Math.pow($("#regHeight").val(),2))*703)
    $("#regBMI").val(user_bmi)
    $("#regBMIType").val(
        user_bmi < 18.5? "Underweight" : user_bmi <= 24.9? "Normal" : user_bmi <= 29.9 ? "Overweight" : "Obese"
    )
    
})
$("#show_hide").on('click',function(e){
    $("#password").attr("type",$("#password").attr('type')=="password"?"text":"password")
    $(this).text($(this).text()=="Show"?"Hide":"Show")
    

})
$("#regContactNum").on('change',function(){
    $(this).val("0"+$(this).val())
})
$.getJSON("/milestones",function(data){ 
    $.each(data,function(i,v){
        $(`#${v.id}`).addClass(`width-${v.weight}`)
        var num_loops = v.weight==1?1:v.weight/20+1
        for(var i = 0;i<num_loops;i++){
            $(`#${v.id}${i*20}`).addClass("highlighted")
        }
        if(v.weight==0){
            $(`button[lift='${v.lift}'][reps='${v.reps}'][mode='lazy']`).addClass("disabled")
        }
        if(v.weight==100){
            $(`button[lift='${v.lift}'][reps='${v.reps}']`).addClass("disabled")
        }
    })
})
$("button[type='mst']").on("click",function(e){
    var lift = $(this).attr('lift')
    var reps = $(this).attr('reps')
    var mode = $(this).attr('mode')
    var act = mode=="work"?"+20":"-20"
    var url = `/request?mode=${mode}&reps=${reps}&lift=${lift}`
    alert(
        `Your request of: \nLift: ${lift}\nReps: ${reps}\n with: ${act} will be processed`
    )
    $.get(url)
})
$("button[type='back']").on('click',function(e){
    $("#"+$(this).attr('target')).attr("style","display:none")
    $("#profile").attr("style","display:block")
})  
$("button[type='profile']").on('click',function(e){
    $("#"+$(this).attr('targets')).attr("style","display:block")
    $("#profile").attr("style","display:none")
    
})
$.getJSON("/regions",function(data){
    
    $.each(data,function(i,v){
        $("#regRegion").html($("#regRegion").html()+`<option region_code="${v['code']}" value="${v['name']}">${v['name']}</option>`)
    })
})
$("#regRegion").on('change',function(){
    var reg_code = $("#regRegion option:selected").attr("region_code")
    if(reg_code=="None"){
        $("#regCity").empty()
        $("#regCity").html('<option city_code="None" selected>Choose a City</option>')
        $("#regBarangay").empty()
        $("#regBarangay").html('<option selected="selected">Choose a Barangay</option>')
        return

    }
    $.getJSON(`/cities/${reg_code}`,function(data){
        $("#regCity").empty()
        $("#regCity").html('<option city_code="None" selected>Choose a City</option>')
        $("#regBarangay").empty()
        $("#regBarangay").html('<option selected="selected">Choose a Barangay</option>')
        $.each(data,function(i,v){
            $("#regCity").html($("#regCity").html()+`<option city_code="${v['code']}" value="${v['name']}">${v['name']}</option>`)

        })
    })
})
$("#regCity").on('change',function(){
    var reg_code = $("#regRegion option:selected").attr("region_code")
    var city_code = $("#regCity option:selected").attr("city_code")
    if(city_code == "None" || reg_code == "None"){
        $("#regBarangay").empty()
        $("#regBarangay").html('<option selected="selected">Choose a Barangay</option>')
        return
    }
    $.getJSON(`/barangays/${reg_code}/${city_code}`,function(data){
        $("#regBarangay").empty()
        $("#regBarangay").html('<option selected="selected">Choose a Barangay</option>')
        $.each(data,function(i,v){
            $("#regBarangay").html($("#regBarangay").html()+`<option value="${v['name']}">${v['name']}</option>`)
        })
    })
})