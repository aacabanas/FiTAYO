import '../bootstrap';
import jQuery from 'jquery';
import 'bootstrap';
import '@fortawesome/fontawesome-free/js/all';
import { profileButtons } from './properties';

console.log("app.js is loaded!");

window.$ = jQuery;

$("#hasAssessment").text()==1?$("#showModal").click():null
$.each(['work','lazy'],function(i,v){
    var operator = v=="work"?"+":"-"
    $.each($(`button[type='${v}']`),function(i,x){
        $(x).on('click',function(e){
            e.preventDefault()
            var lift = $(this).attr('lift')
            var reps = $(this).attr('reps')
            var prog = `${operator}20`
            var data = JSON.parse(`{
                "lift":"${lift}",
                "reps" : ${reps},
                "progress":"${prog}"}`)
            console.log(data)
        })
    })
})

// Profile tab navigation
$("li>a.nav-link").on('click',function(e){
    $("#title").text($(this).text())
})
document.addEventListener('DOMContentLoaded', function () {
    console.log("DOM fully loaded and parsed");

    

    profileButtons.forEach(button => {
        const buttonElement = document.getElementById(button.id);
        if (buttonElement) {
            buttonElement.addEventListener('click', function () {
                showPage(button.page);
            });
        } else {
            console.error(`Button with id ${button.id} not found`);
        }
    });

    function showPage(pageId) {
        // Hide all page contents
        document.querySelectorAll('.page-content').forEach(page => {
            page.style.display = 'none';
        });

        // Show the selected page content
        const pageElement = document.getElementById(pageId);
        if (pageElement) {
            pageElement.style.display = 'block';
            document.querySelector('.profile-container').style.display = 'none'; // Hide the profile tab content
        } else {
            console.error(`Page with id ${pageId} not found`);
        }
    }

    // Add event listeners to "Back" buttons
    document.querySelectorAll('.page-content .btn-secondary').forEach(button => {
        button.addEventListener('click', function () {
            showProfileTab();
        });
    });

    function showProfileTab() {
        // Hide all page contents
        document.querySelectorAll('.page-content').forEach(page => {
            page.style.display = 'none';
        });

        // Show the profile tab content
        document.querySelector('.profile-container').style.display = 'block';
    }
});




