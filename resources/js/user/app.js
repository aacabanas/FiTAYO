import '../bootstrap';

import jQuery from 'jquery';
import 'bootstrap'
import '@fortawesome/fontawesome-free/js/all';


window.$ = jQuery
const click = (e)=>{document.getElementById(e).click()}


$("#hasAssessment").text()==1?click('showModal'):null



// Handle dropdown menu clicks
$('a[type="fitayo-exercise"]').on('click', function (e) {
    populateTable($(this).attr('data-lift'))
})

$("#regWeight,#regHeight").on('change',function(e){
    var height = $("#regHeight").val()
    var weight = $("#regWeight").val()
    if(height == "" && weight == "")return
    var user_bmi = bmi(height,weight)
    $("#regBMI").val(user_bmi)
    $("#regBMIType").val(bmi_type(user_bmi))
})
const bmi = function(height,weight){return Math.round((weight/Math.pow(height,2))*703)}
const bmi_type = function(bmi){
    if(bmi<18.5)return "Underweight"
    if(bmi<=24.9) return "Normal"
    if(bmi<=29.9) return "Overweight"
    return "Obese"
}
// Populate the table with hardcoded data
function populateTable(lift) {
    var tableRows = '';
    switch (lift) {
        case 'benchpress':
            tableRows = '<tr><th scope="row">1</th><td>John Doe</td><td>150</td></tr>' +
                '<tr><th scope="row">2</th><td>Jane Doe</td><td>140</td></tr>' +
                '<tr><th scope="row">3</th><td>Bob Smith</td><td>130</td></tr>' +
                '<tr><th scope="row">4</th><td>Alice Johnson</td><td>120</td></tr>' +
                '<tr><th scope="row">5</th><td>Mark White</td><td>110</td></tr>';
            break;
        case 'deadlift':
            tableRows = '<tr><th scope="row">1</th><td>John Doe</td><td>250</td></tr>' +
                '<tr><th scope="row">2</th><td>Jane Doe</td><td>240</td></tr>' +
                '<tr><th scope="row">3</th><td>Bob Smith</td><td>230</td></tr>' +
                '<tr><th scope="row">4</th><td>Alice Johnson</td><td>220</td></tr>' +
                '<tr><th scope="row">5</th><td>Mark White</td><td>210</td></tr>';
            break;
        case 'barbell-squats':
            tableRows = '<tr><th scope="row">1</th><td>John Doe</td><td>350</td></tr>' +
                '<tr><th scope="row">2</th><td>Jane Doe</td><td>340</td></tr>' +
                '<tr><th scope="row">3</th><td>Bob Smith</td><td>330</td></tr>' +
                '<tr><th scope="row">4</th><td>Alice Johnson</td><td>320</td></tr>' +
                '<tr><th scope="row">5</th><td>Mark White</td><td>310</td></tr>';
            break;
        default:
            tableRows = ''
            break
    }
    $('#leaderboardTable').html(tableRows);
}
