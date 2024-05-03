import './bootstrap';
import 'bootstrap';
import jQuery from 'jquery';
window.$ = jQuery

var totMem
$.ajax({ url: "users/count", method: "GET", async: false, success: function (dat) { totMem = dat.count } })


window.memData = function (id) {

    $.ajax({ url: "/member/" + id, method: "GET", async: false, success: function (dat) {
        var credential = dat['user_credential']
        var profile = dat['user_profile']
        var membership = dat['user_membership']
        var assessment = dat['user_assessment']
        $("#editUserLabel").text("Details of " + profile.firstName + " " + profile.lastName)
        $("#userID").val(id)
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
        $("#editMembershipType").val({ "Member": 1, "Non-Member": 2 }[membership.membership_type])
        $("#editMembershipPlan").val({ "Basic": 1, "Standard": 2, "Premium": 3 }[membership.membership_plan])
        $("#editMembershipDesc").val(membership.membership_desc)
        $("#editAddressNum").val(profile.address_num)
        $("#editAddressStreet").val(profile.address_street)
        $("#editAddressCity").val(profile.address_city)
        $("#editAddressRegion").val(profile.address_region)
        $("#editEmail").val(credential.user_email)
        $("#editTrainer").val(membership.Trainer)
        $("#editStartDate").val(membership.start_date)
        $("#editExpiryDate").val(membership.expiry_date)
        $("#editNextPayment").val(membership.next_payment)
        $("#editPaymentStatus").val(membership.payment_status)
        $("#editHasIllness").val(assessment.hasIllness)
        $("#editHasInjuries").val(assessment.hasInjuries)
        $("#editMedicalHistory").val(assessment.medical_history)
        } })

    

}

for (var i = 1; i <= totMem; i++) {
    var content = $("#mem-list tbody")
    var dat
    var opts = {
        url: "/member/" + i,
        method: "GET",
        async: false,
        success: function (dat) {
            var membership = dat['user_membership']
            var profile = dat['user_profile']
            var trH = "<tr>"
            var id = "<td>" + i + "</td>"
            var lname = "<td>" + profile.lastName + "</td>"
            var fname = "<td>" + profile.firstName + "</td>"
            var memplan = "<td>" + ["Basic", "Standard", "Premium"][membership.membership_plan - 1] + "</td>"
            var memdate = "<td>" + membership.start_date + "</td>"
            var memexpiry = "<td>" + membership.expiry_date + "</td>"
            var memstatus = "<td>" + ((membership.payment_status - 1 == 1) ? "Paid" : "Unpaid") + "</td>"
            var hidden = "<td class='d-none'>" + profile.lastName + " " + profile.firstName + "</td>"
            var button = "<td><button type='button' onclick='getData(" + i + ")' class='btn btn-primary fitayo' data-bs-toggle='modal' data-bs-target='#edit_user'>Edit</button></td>"
            var thE = "</tr>"
            content.append(trH + id + lname + fname + memplan + memdate + memexpiry + memstatus + button + hidden + thE)
        }
    }
    $.ajax(opts)



}
$("#search").on("keyup keydown", function () {
    var val = $(this).val().toLowerCase();
    $("#mem-list>tbody>tr").filter(function () {
        $(this).toggle($(this).find("td:eq(8)").text().toLowerCase().indexOf(val) > -1)

    })
})

