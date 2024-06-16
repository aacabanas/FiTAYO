import '../bootstrap';
import jQuery from 'jquery';
import 'bootstrap';
import '@fortawesome/fontawesome-free/js/all';

console.log("app.js is loaded!");

window.$ = jQuery;

// Profile tab navigation
document.addEventListener('DOMContentLoaded', function () {
    console.log("DOM fully loaded and parsed");

    const profileButtons = [
        { id: 'qrCodeBtn', page: 'qrCodePage' },
        { id: 'editProfileBtn', page: 'editProfilePage' },
        { id: 'membershipDetailsBtn', page: 'membershipDetailsPage' },
        { id: 'passwordSecurityBtn', page: 'passwordSecurityPage' },
        { id: 'policiesRegulationsBtn', page: 'policiesRegulationsPage' }
    ];

    profileButtons.forEach(button => {
        const buttonElement = document.getElementById(button.id);
        if (buttonElement) {
            buttonElement.addEventListener('click', function () {
                console.log(`Button ${button.id} clicked, showing page ${button.page}`);
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
            console.log('Back button clicked, showing profile tab');
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




