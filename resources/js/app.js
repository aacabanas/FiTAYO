import './bootstrap';
import 'bootstrap';
import jQuery from 'jquery';
import { user } from './helpers/helper';
window.$ = jQuery
var selection = {
    "MemberType":{
        "Member":1,
        "Non-Member":2
    }

}
window.memData = function (id){
    
    var dat
    var opts = {
        url:"/member/"+id,
        method:"GET",
        async:false,
        success: function(data){
            dat=data
        }
    }
    $.ajax(opts)
    var credential = user.credential_data(dat['user_credential'])
    var membership = user.membership_data(dat['user_membership'])
    var profile = user.profile_data(dat['user_profile'])
    var assessment = user.assess_data(dat['user_assessment'])
    /*

    */
    
    $("#editUserLabel").text("Details of " + profile.firstName +" " + profile.lastName)
    $("#userID").val(credential.user_id)
    $("#editUsername").val(credential.username)
    $("#editUserType").val(credential.user_type)
    $("#editFname").val(profile.firstName)
    $("#editLname").val(profile.lastName)
    $("#editProfileBio").val(profile.profileBio)
    $("#editContactNum").val(profile.contactDetails)
    $("#editWeight").val(assessment.weight)
    $("#editHeight").val(assessment.height)
    $("#editBMI").val(assessment.bmi)
    $("#editBMIType").val(assessment.bmi_classification)
    $("#editBirthdate").val(profile.birthdate)
    $("#editMembershipType").val(membership.membership_type)
    $("#editMembershipPlan").val(membership.membership_plan)
    $("#editMembershipDesc").val(membership.membership_desc)
    $("#editAddressNum").val(profile.address_num)
    $("#editAddressStreet").val(profile.address_street)
    $("#editAddressCity").val(profile.address_city)
    $("#editAddressRegion").val(profile.address_region)
    $("#editEmail").val(credential.email)
    $("#editTrainer").val(membership.trainer)
    $("#editStartDate").val(membership.start_date)
    $("#editExpiryDate").val(membership.expiry_date)
    $("#editNextPayment").val(membership.next_payment)
    $("#editPaymentStatus").val(membership.payment_status)
    $("#editHasIllness").val(assessment.hasIllness)
    $("#editHasInjuries").val(assessment.hasInjuries)
    $("#editMedicalHistory").val(assessment.medical_history)
    //var data = new user(dat)
    //console.log(data.assessment.height)
    /* var user_cred = cred(dat['user_credential'])
    $("#editUserLabel").text("Details of " + dat['user_profile']['lastName']+" "+dat['user_profile']['firstName'])
    var userid = $("#userID")
    userid.val(id)
    var fname = $("#editFname")
    fname.val(dat['user_profile']['firstName'])
    var lname = $("#editLname")
    lname.val(dat['user_profile']['lastName']) */
    /* $.each(dat,function(k,v){
        console.log(k)
        $.each(v,function(key,val){
            console.log(key+" : "+val )
        })
    }) */

    /* $.getJSON("/member/"+id,function(data){
            $("#test").text(data['user_credential']);
            console.log(data)
        }
        
    ) */
}
    

$.getJSON("/users", function (data) {
    var content = $("#mem-list tbody")

    for (var i = 0; i < data['credentials'].length; i++) {

        var trH = "<tr>"
        var id = "<td>" + data['credentials'][i]['user_ID'] + "</td>"
        var lname = "<td>" + data['profile'][i]['lastName'] + "</td>"
        var fname = "<td>" + data['profile'][i]['firstName'] + "</td>"
        var memplan = "<td>" + data['membership'][i]['membership_plan'] + "</td>"
        var memdate = "<td>" + data['membership'][i]['start_date'] + "</td>"
        var memexpiry = "<td>" + data['membership'][i]['expiry_date'] + "</td>"
        var memstatus = "<td>" + ((data['membership'][i]['payment_status'] == 1) ? "Paid" : "Unpaid") + "</td>"
        var button = "<td><button type='button' onclick='getData(" + data['credentials'][i]['user_ID'] + ")' class='btn btn-primary fitayo' data-bs-toggle='modal' data-bs-target='#edit_user'>Edit</button></td>"
        var thE = "</tr>"
        content.append(trH + id + lname + fname + memplan + memdate + memexpiry + memstatus + button + thE)
        
    }

})

$("#search").on("keyup", function(){
    var val = $(this).val().toLowerCase();
    $("#mem-list>tbody>tr").filter(function(){
        $(this).toggle($(this).text().toLowerCase().indexOf(val) > -1)
    })
})


//$("#reg-form").on("submit",function(e){
//    e.preventDefault();
//    var unindexed = $(this).serializeArray()
//    var indexed = {}
//
//    $.map(unindexed,function(k,v){
//        indexed[k['name']] = k['value']
//    })
//    $.ajax({
//        url:"/register",
//        method:"POST",
//        dataType:"json",
//        data : indexed,
//        
//    })
//    
//})