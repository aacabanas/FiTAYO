import Utility from "../utils/utility"
var utils = new Utility(Utility.CTX_coach)
utils.$.each(utils.lift_data,(k,v)=>{
    utils.$.each(utils.json(utils.url_builder("/leaderboards",{lift:v.lift,reps:v.reps})),(i,v)=>{
        $(`#${k}`).append(`<tr><td>${i+1}</td><td>${v.username}</td><td>${v.weight}</td></tr>`)
    })
})
/* $.each(get().lift_data,(k,v)=>{
    $.getJSON(`/leaderboards?lift=${v.lift}&reps=${v.reps}`,(v)=>{
        if(v.data.length == 0)return
        $.each(v.data,(i,v)=>{
            $("#"+k).html($("#"+k).html()+`<tr><td>${i+1}</td><td>${v.username}</td><td>${v.weight}</td></tr>`)
        })
    })
}) */