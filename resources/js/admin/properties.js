import jQuery from "jquery"
var $ = jQuery
export const exceptions = [
    "search_member","search_non_member",null,"regMemId"
]
export const view = {
    credentials : [
        $('#viewEmail'),
        $('#viewUsername')
    ],
    profile : [
        $('#viewFName'),
        $('#viewLName'),
        $('#viewContactDetails'),
        $('#viewBirthdate'),
        $('#viewAddressNum'),
        $('#viewAddressStreet'),
        $('#viewAddressCity'),
        $('#viewAddressRegion'),
        $('#viewProfileBio')
    ],
    membership : [
        $('#viewMembershipType'),
        $('#viewMembershipPlan'),
        $('#viewMembershipDesc'),
        $('#viewStartDate'),
        $('#viewExpiryDate'),
        $('#viewNextPayment'),
        $('#viewPaymentStatus'),
        $('#viewTrainer')
    ],
    assessment : [
        $('#viewHeight'),
        $('#viewWeight'),
        $('#viewHasIllness'),
        $('#viewHasInjuries'),
        $('#viewMedicalHistory')
    ]
}