import '../bootstrap';
import jQuery from 'jquery';
import 'bootstrap';
import '@fortawesome/fontawesome-free/js/all';

console.log("app.js is loaded!");

window.$ = jQuery;
const click = (e) => { document.getElementById(e).click(); };

$("#hasAssessment").text() == 1 ? click('showModal') : null;

document.querySelectorAll('.nav-link').forEach(button => {
    button.addEventListener('click', function() {
        // Get the target tab pane ID from the button's data-bs-target attribute
        let targetId = this.getAttribute('data-bs-target');

        // Hide all tab panes
        document.querySelectorAll('.tab-pane').forEach(tabPane => {
            tabPane.classList.remove('show', 'active');
        });

        // Show the target tab pane
        document.querySelector(targetId).classList.add('show', 'active');
    });
});

$("#regWeight,#regHeight").on('change', function (e) {
    var height = $("#regHeight").val();
    var weight = $("#regWeight").val();
    if (height == "" && weight == "") return;
    var user_bmi = bmi(height, weight);
    $("#regBMI").val(user_bmi);
    $("#regBMIType").val(bmi_type(user_bmi));
});

const bmi = function (height, weight) { return Math.round((weight / Math.pow(height, 2)) * 703); };

const bmi_type = function (bmi) {
    if (bmi < 18.5) return "Underweight";
    if (bmi <= 24.9) return "Normal";
    if (bmi <= 29.9) return "Overweight";
    return "Obese";
};

$(document).ready(function() {
    // Event listener for BENCH PRESS tab
    $('#nav-bench-tab').on('click', function() {
        populateTableBody('table1RepMax', [
            { ranking: 1, name: 'John Doe', weight: 150 },
            { ranking: 2, name: 'Jane Doe', weight: 140 },
            { ranking: 3, name: 'Bob Smith', weight: 130 },
            { ranking: 4, name: 'Alice Johnson', weight: 120 },
            { ranking: 5, name: 'Mark White', weight: 110 }
        ]);
        populateTableBody('table6Reps', [
            { ranking: 1, name: 'John Doe', weight: 160 },
            { ranking: 2, name: 'Jane Doe', weight: 150 },
            { ranking: 3, name: 'Bob Smith', weight: 140 },
            { ranking: 4, name: 'Alice Johnson', weight: 130 },
            { ranking: 5, name: 'Mark White', weight: 120 }
        ]);
        populateTableBody('table12Reps', [
            { ranking: 1, name: 'John Doe', weight: 170 },
            { ranking: 2, name: 'Jane Doe', weight: 160 },
            { ranking: 3, name: 'Bob Smith', weight: 150 },
            { ranking: 4, name: 'Alice Johnson', weight: 140 },
            { ranking: 5, name: 'Mark White', weight: 130 }
        ]);
    });

    // Event listener for DEADLIFT tab
    $('#nav-deadlift-tab').on('click', function() {
        populateTableBody('table1RepMax', [
            { ranking: 1, name: 'John Doe', weight: 250 },
            { ranking: 2, name: 'Jane Doe', weight: 240 },
            { ranking: 3, name: 'Bob Smith', weight: 230 },
            { ranking: 4, name: 'Alice Johnson', weight: 220 },
            { ranking: 5, name: 'Mark White', weight: 210 }
        ]);
        populateTableBody('table6Reps', [
            { ranking: 1, name: 'John Doe', weight: 260 },
            { ranking: 2, name: 'Jane Doe', weight: 250 },
            { ranking: 3, name: 'Bob Smith', weight: 240 },
            { ranking: 4, name: 'Alice Johnson', weight: 230 },
            { ranking: 5, name: 'Mark White', weight: 220 }
        ]);
        populateTableBody('table12Reps', [
            { ranking: 1, name: 'John Doe', weight: 270 },
            { ranking: 2, name: 'Jane Doe', weight: 260 },
            { ranking: 3, name: 'Bob Smith', weight: 250 },
            { ranking: 4, name: 'Alice Johnson', weight: 240 },
            { ranking: 5, name: 'Mark White', weight: 230 }
        ]);
    });

    // Event listener for SQUATS tab
    $('#nav-squats-tab').on('click', function() {
        populateTableBody('table1RepMax', [
            { ranking: 1, name: 'John Doe', weight: 350 },
            { ranking: 2, name: 'Jane Doe', weight: 340 },
            { ranking: 3, name: 'Bob Smith', weight: 330 },
            { ranking: 4, name: 'Alice Johnson', weight: 320 },
            { ranking: 5, name: 'Mark White', weight: 310 }
        ]);
        populateTableBody('table6Reps', [
            { ranking: 1, name: 'John Doe', weight: 360 },
            { ranking: 2, name: 'Jane Doe', weight: 350 },
            { ranking: 3, name: 'Bob Smith', weight: 340 },
            { ranking: 4, name: 'Alice Johnson', weight: 330 },
            { ranking: 5, name: 'Mark White', weight: 320 }
        ]);
        populateTableBody('table12Reps', [
            { ranking: 1, name: 'John Doe', weight: 370 },
            { ranking: 2, name: 'Jane Doe', weight: 360 },
            { ranking: 3, name: 'Bob Smith', weight: 350 },
            { ranking: 4, name: 'Alice Johnson', weight: 340 },
            { ranking: 5, name: 'Mark White', weight: 330 }
        ]);
    });

    // Helper function to populate table body with rows
    function populateTableBody(tableId, data) {
        var tableRows = '';
        data.forEach(function(row, index) {
            tableRows += '<tr><th scope="row">' + (index + 1) + '</th><td>' + row.name + '</td><td>' + row.weight + '</td></tr>';
        });
        $('#' + tableId).html(tableRows);
    }

    $('#nav-bench-tab').click();
});




// Profile tab functionality

