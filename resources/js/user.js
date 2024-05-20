$(document).ready(function() {

    // Handle dropdown menu clicks
    $('#leaderboardDropdown').on('click', 'a', function(e) {
        e.preventDefault();
        var lift = $(this).data('lift');
        populateTable(lift);
    });

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
        }
        $('#leaderboardTable').html(tableRows);
    }
});