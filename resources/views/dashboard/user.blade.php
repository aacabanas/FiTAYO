@extends('base')
@section("title","Dashboard")
@section('content')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Leaderboard</title>
        <style>
            .container-fluid {
                padding: 10px 20px;
                margin-bottom: 20px;
            }
            .bg-primary {
                background-color: #007bff; /* Bootstrap primary color */
            }
            .text-white {
                color: white;
            }
            h1 {
                font-size: 1.5em;
            }
            #date {
                font-size: 1em;
            }
            /* Responsive adjustments */
            @media (max-width: 600px) {
                .container-fluid {
                    padding: 10px;
                }
                h1 {
                    font-size: 1.2em;
                }
                #date {
                    font-size: 0.9em;
                }
            }
        </style>
    </head>
  <body>
    <header class="container-fluid bg-primary text-white" style="padding: 20px; margin-bottom: 20px">
      <h1>Leaderboards</h1>
      <p id="date"></p>
    </header>

    <div class="container">
    <div class="row">
        <div class="col-md-6 mb-4"> <!-- Add mb-4 class for margin-bottom -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">This week's leaderboards!</h5>
                </div>
                <div class="card-body">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="leaderboardDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select a lift
                        </button>
                        <div class="dropdown-menu" aria-labelledby="leaderboardDropdown">
                            <a class="dropdown-item" href="#" data-lift="benchpress">Benchpress</a>
                            <a class="dropdown-item" href="#" data-lift="deadlift">Deadlift</a>
                            <a class="dropdown-item" href="#" data-lift="barbell-squats">Barbell Squats</a>
                        </div>
                    </div>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Ranking</th>
                                <th scope="col">Name</th>
                                <th scope="col">Weight (kg)</th>
                            </tr>
                        </thead>
                        <tbody id="leaderboardTable">
                            <!-- Table rows will be added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4"> <!-- Add mb-4 class for margin-bottom -->
            <div class="card h-100"> <!-- Add h-100 class to make it full height -->
                <div class="card-header bg-primary text-white"> <!-- Change the card-header class -->
                    <h5 class="card-title">News</h5>
                </div>
                <div class="card-body">
                    <p>John just surpassed Emily in the 1RM Benchpress with a new record of 150 kg!</p>
                    <p>Sarah just surpassed Michael in the 6RM Deadlift with a new record of 200 kg!</p>
                </div>
            </div>
        </div>
    </div>
</div>

    <footer class="container-fluid bg-orange text-white footer">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">Leaderboards</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Milestones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">BMI Tracker</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
      </ul>
    </footer>

    <script>
      // Update the date on the landing page
      var date = new Date();
      var dateElement = document.getElementById("date");
      dateElement.innerHTML = date.toDateString();
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/user.js') }}"></script>
  </body>
</html>
@endsection