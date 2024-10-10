import Utility from "../utils/utility"
import jQuery from "jquery"
import { Chart } from "chart.js"
var utils = new Utility("user")
var $ = jQuery
$("li>a.nav-link").on('click', function (e) {
    $("#title").text($(this).text())
})
$("button[type='mst']").on("click", function (e) {
    $.getJSON(`{{route('milestone_request')}}?lift=${$(this).attr('lift')}&reps=${$(this).attr('reps')}&mode=${$(this).attr('mode')}`, (data) => {
        alert(data.request)
    })
})
$.each(utils.lift_data, (k, v) => {
    $.getJSON(`{{route('leaderboard')}}?lift=${v.lift}&reps=${v.reps}`, (v) => {
        if (v.data.length == 0) return
        $.each(v.data, (i, v) => {
            $("#" + k).html($("#" + k).html() + `<tr><td>${i + 1}</td><td>${v.username}</td><td>${v.weight}</td></tr>`)
        })
    })
})
window.loadCharts = (username)=>{
    var url = utils.url_builder("",{username:username})
}
var ctxWorkout = $("#workoutPlanChart")[0].getContext("2d")
var workout_data
$.getJSON()