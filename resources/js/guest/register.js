import jQuery from "jquery";
import Utility from "../utils/utility";

const utils = new Utility(Utility.CTX_guest)
utils.$("#accept").on("click", (e) => {
    e.preventDefault()
    utils.$("#dpnotice").attr("class", "d-none")
    utils.$("#filldata").attr("class", "d-block")
    utils.$("#data_privacy_accepted").val("Yes")
})


utils.$.each(utils.regions,(i,v)=>{
    utils.$("#region").html(utils.$("#region").html() + `<option region_code="${v.code}" value="${v.name}">${v.name}</option>`)
})
utils.$("#region").on("change",(e)=>{
    e.preventDefault()
    var reg_code = utils.$("#region option:selected").attr("region_code")
    if (reg_code == "None") {
        utils.$("#city").empty().html('<option city_code="None" selected>Choose a City</option>')
        utils.$("#barangay").empty().html('<option selected="selected">Choose a Barangay</option>')
        return
    }
    utils.$("#city").empty().html('<option city_code="None" selected>Choose a City</option>')
    utils.$("#barangay").empty().html('<option selected="selected">Choose a Barangay</option>')
    $.each(utils.cities(reg_code),(i,v)=>{
        utils.$("#city").html(utils.$("#city").html() + `<option city_code="${v['code']}" value="${v['name']}">${v['name']}</option>`)
    })
    
    
})
utils.$("#city").on("change",(e)=>{
    e.preventDefault()
    var reg_code = utils.$("#region option:selected").attr("region_code")
    var city_code = utils.$("#city option:selected").attr("city_code")
    if (city_code == "None" || reg_code == "None") {
        utils.$("#barangay").empty().html('<option selected="selected">Choose a Barangay</option>')
        return
    }
    utils.$("#barangay").empty().html('<option selected="selected">Choose a Barangay</option>')
    $.each(utils.barangays(reg_code,city_code),(i,v)=>{
        utils.$("#barangay").html(utils.$("#barangay").html() + `<option value="${v.name}">${v.name}</option>`)
    })
    
})
utils.$("#weight,#height").on('change', function (e) {
    if (utils.$("#height").val() == "" && utils.$("#weight").val() == "") return
    var user_bmi = Math.round((utils.$("#weight").val() / Math.pow(utils.$("#height").val(), 2)) * 703)
    utils.$("#bmi").val(user_bmi)
    utils.$("#bmitype").val(
        user_bmi < 18.5 ? "Underweight" : user_bmi <= 24.9 ? "Normal" : user_bmi <= 29.9 ?
            "Overweight" : "Obese"
    )
})
//console.log(get().regions)