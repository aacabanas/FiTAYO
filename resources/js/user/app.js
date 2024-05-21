import '../bootstrap';

import jQuery from 'jquery';
import 'bootstrap'
import '@fortawesome/fontawesome-free/js/all';


window.$ = jQuery
const click = (e)=>{document.getElementById(e).click()}


$("#hasAssessment").text()==1?click('showModal'):null


$("#alertBtn").on('click',function(e){
    e.preventDefault()
    $("#alertBtnPlace").addClass('d-none')
    $("#alertPlace").removeClass('d-none')
    
    const fillables = [$("#userWeight"),$("#userHeight"),$("#userMedHist"),$("#userHasIllness"),$("#userHasInjuries")]
    $.each(fillables,function(i,v){
        if(i==3 || i==4){
            v.attr('disabled','disabled')
            return
        }
        v.attr('readonly','readonly')
    })

})
$("#cancel").on('click',function(e){
    e.preventDefault()
    $("#alertPlace").addClass('d-none')
    $("#alertBtnPlace").removeClass('d-none')
    const fillables = [$("#userWeight"),$("#userHeight"),$("#userMedHist"),$("#userHasIllness"),$("#userHasInjuries")]
    $.each(fillables,function(i,v){
        if(i==3 || i==4){
            v.removeAttr('disabled')
            return
        }
        v.removeAttr('readonly')
    })

})
// Handle dropdown menu clicks
$('a[type="fitayo-exercise"]').on('click', function (e) {
    populateTable($(this).attr('data-lift'))
})

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
