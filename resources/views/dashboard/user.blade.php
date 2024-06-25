@extends('base')
@section('title', 'Dashboard')
@section('extras')
    <style>
        .width-0{
            width: 0%;
        }
        .width-20{
            width: 20%;
        }
        .width-40{
            width: 40%;
        }
        .width-60{
            width: 60%;
        }
        .width-80{
            width: 80%
        }

        .width-100{
            width: 100%
        }
        body {
            background-color: #f0f0f0;
            color: #333;
        }
        

        .header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 2em;
            font-weight: bold;
        }

        .header #date {
            font-size: 1.1em;
            color: #f8f9fa;
        }

        .header .toggle-container span {
            font-size: 1em;
            color: #f8f9fa;
        }

        .header .switch {
            margin-left: 10px;
        }

        .qr-code-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .qr-code-image {
            border: 5px solid #000;
            padding: 10px;
            background-color: #fff;
            max-width: 100%;
            height: auto;
        }
        .scan-me {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            padding: 10px;
            background-color: #000;
            color: #fff;
            border-radius: 10px;
            font-size: 1.2em;
            font-weight: bold;
        }
        .scan-me i {
            margin-right: 10px;
        }
        .scan-me-text {
            margin-left: 10px;
        }
        .qr-instruction {
            margin-top: 10px;
            font-size: 1.2em;
            color: #212529;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 0.25rem;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .rounded {
            border-radius: 10px;
        }
        .btn-secondary, .btn-primary {
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 0.25rem;
            transition: background-color 0.3s, border-color 0.3s;
        }
        #nav-bot .nav-link {
            color: #ffffff;
        }

        #nav-bot .nav-link.active {
            color: #ffffff;
        }
        .navbar-nav {
            display: flex;
            justify-content: center;
        }
        .nav-link.active {
            font-weight: bold; 
        }
        .nav-link:hover,
        .nav-link:focus {
            color: rgba(255, 255, 255, 0.75); 
            text-decoration: none; 
        }
        .nav-link:hover,
        .nav-link:focus {
            color: black; 
            text-decoration: none; 
        }
        .container-fluid {
            padding: 10px;
            margin-bottom: 20px;
        }
        .card-body {
            padding: 40px;
        }
        .bg-primary {
            background-color: #007bff;
        }
        .text-white {
            color: white;
        }
        h1 {
            font-size: 1.2em;
        }
        #date {
            font-size: 0.9em;
        }
        .box {
            background-color: #FEFBF6;
            margin-bottom: 10px;
            padding: 15px;
            border: 1px solid #ddd;
        }
        .progress-text-indicators {
            position: relative;
            top: 8px;
            font-size: 12px;
            color: #666;
        }
        .progress-text-indicators span {
            position: absolute;
            top: 0;
            transform: translateX(-50%);
        }
        .progress-text-indicators span:first-child {
            left: 0%;
        }
        .progress-text-indicators span:last-child {
            left: 0%;
        }
        .bmi-metrics-box {
            background-color: #f9f9f9;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .bmi-metrics-box h2 {
            margin-top: 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        body.dark-mode .card {
            background-color: #333 !important; 
            color: #f1f1f1; 
        }
        
        body.light-mode .profile-email, 
        body.light-mode .text-muted.small {
            color: #6c757d !important;
        }
        body.dark-mode {
            background-color: #0d1117;
            color: #c9d1d9;
        }
        /* Dark mode specific styles */
        body.dark-mode .card {
            background-color: #21262d !important;
            color: #f1f1f1; 
        }
        body.dark-mode .card-text, .profile-email, .text-muted.small {
            color: #f1f1f1; 
        }
        body.dark-mode .form-control {
            color: #f1f1f1;
        }
        body.dark-mode .form-label {
            color: #f1f1f1; 
        }

        body.dark-mode .form-control {
            color: #f1f1f1;
            background-color: #161b22;
            border-color: #555;
        }

        body.dark-mode .form-control:focus,
        body.dark-mode .form-control:active {
            color: #f1f1f1;
            background-color: #161b22; 
            border-color: #555; 
            outline: none; 
            box-shadow: none; 
        }

        body.dark-mode .btn-primary {
            background-color: #007bff; 
            border-color: #007bff;
        }
        body.dark-mode .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .form-control {
            border-radius: 0.25rem;
            padding: 10px;
        }
        .form-label {
            font-weight: bold;
            color: #343a40;
        }
        .form-group input[type="number"] {
            width: 100%;
            height: 40px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group input[type="number"]:read-only {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }
        #update-metrics-btn,
        #save-metrics-btn {
            width: 100%;
            height: 40px;
            padding: 10px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #update-metrics-btn {
            background-color: #337ab7;
            color: #fff;
        }
        #update-metrics-btn:hover,
        #save-metrics-btn:hover {
            background-color: #23527c;
        }
        /* Default light mode styles for modal  */
        .modal-dialog {
            max-width: 100%;
            margin: 10% auto;
            padding: 10px;
            background-color: #fff; 
            border: none; 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }
        .modal-header {
            padding: 10px;
            border-bottom: none; 
            color: #000; 
        }
        .modal-header .close {
            font-size: 24px;
            line-height: 1;
            color: #000; 
            opacity: 0.5;
            cursor: pointer;
            background: none; 
            border: none; 
        }
        .modal-header .close:hover {
            opacity: 1;
        }
        .modal-body {
            padding: 10px;
            color: #000; 
        }
        .modal-footer {
            padding: 10px;
            border-top: none;
            text-align: right;
            color: #000; 
        }
        .modal-footer .btn {
            margin-left: 5px;
            background-color: #555; 
            border: none; 
            color: #fff; 
        }
        .modal-footer .btn:hover {
            background-color: #666;
        }

        /* Dark mode styles */
        body.dark-mode .modal-dialog {
            background-color: #333; /* Dark background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Darker shadow */
        }

        body.dark-mode .modal-header {
            color: #fff; /* White text color for dark mode */
        }

        body.dark-mode .modal-header .close {
            color: #fff; /* White color for close button in dark mode */
        }

        body.dark-mode .modal-body {
            color: #fff; /* White text color for dark mode */
        }

        body.dark-mode .modal-footer {
            color: #fff; /* White text color for dark mode */
        }

        .profile-content,
        .page-content {
            display: none;
        }
        .active-content {
            display: block;
        }
        .profile-section {
            margin-top: 20px;
        }
        .profile-header {
            background-color: #f8f9fa;
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
            border-radius: 0.25rem 0.25rem 0 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-picture {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 3px solid #007bff;
        }
        .profile-name,
        .profile-plan {
            font-size: 1.5em;
            font-weight: bold;
            color: #343a40;
            margin-top: 15px;
        }
        .profile-email {
            font-size: 1em;
            color: #fff;
            margin-top: 5px;
        }
        .profile-body {
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 0 0 0.25rem 0.25rem;
        }
        .profile-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            background-color: #f8f9fa;
            text-decoration: none;
            color: #212529;
            transition: background-color 0.2s ease-in-out;
            width: 100%;
        }
        .profile-button:hover {
            background-color: #e9ecef;
            color: #212529;
        }
        .profile-button i {
            margin-right: 10px;
        }
        .profile-button-text {
            margin-left: 10px;
        }
        .toggle-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 66px;
            height: 34px;
        }
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .slider:before {
            position: absolute;
            content: "\263C";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
            text-align: center;
            line-height: 26px;
            font-size: 18px;
            color: #fdd835;
        }
        
        input:checked + .slider {
            background-color: #1e3a8a;
        }
        input:checked + .slider:before {
            transform: translateX(33px);
            content: "\263E"; 
            color: #1e3a8a;
        }
        /* Dark Mode Styles */
        body.dark-mode {
            background-color: #0d1117;
            color: #c9d1d9;
        }
        .dark-mode .container,
        .dark-mode .card,
        .dark-mode .profile-header,
        .dark-mode .profile-body,
        .dark-mode .profile-button,
        .dark-mode .page-content,
        .dark-mode .navbar,
        .dark-mode .footer {
            color: #c9d1d9;
            border-color: #30363d;
        }
        .dark-mode .navbar .nav-link,
        .dark-mode .footer .nav-link {
            color: #c9d1d9;
        }
        
        .dark-mode .btn {
            background-color: #21262d;
            color: #c9d1d9;
            border-color: #30363d;
        }
        .dark-mode .btn:hover {
            background-color: #30363d;
            border-color: #484f58;
        }

        .dark-mode .form-control {
            background-color: #21262d;
            color: #c9d1d9;
            border-color: #30363d;
        }
        .dark-mode .form-control::placeholder {
            color: #8b949e;
        }
        .dark-mode .text-primary {
            color: #58a6ff !important;
        }
        .dark-mode .text-secondary, .card-title {
            color: #8b949e !important;
        }
        .dark-mode .bg-primary {
            background-color: #21262d !important;
        }
        .dark-mode .card-title,
        .dark-mode .profile-name,
        .dark-mode .profile-plan {
            color: #c9d1d9;
        }
        .dark-mode .form-label {
            color: #c9d1d9;
        }
        .dark-mode .qr-code-container {
            background-color: #21262d;
        }
        .dark-mode .qr-code-image {
            border: 5px solid #30363d;
            color: #000000;
        }
        .dark-mode .scan-me {
            background-color: #30363d;
        }
        .dark-mode .scan-me-text {
            color: #c9d1d9;
        }
        .dark-mode .qr-instruction {
            color: #c9d1d9;
        }
        .dark-mode .profile-button:hover {
            background-color: #30363d;
            color: #c9d1d9;
        }
        .dark-mode .card.policies-card {
            background-color: #21262d;
        }
        .dark-mode .policies-content p,
        .dark-mode .policies-content ul {
            color: #c9d1d9;
        }
        .dark-mode .policies-content h6 {
            color: #58a6ff;
        }
        .dark-mode .table {
            background-color: #21262d;
            color: #c9d1d9;
        }
        .dark-mode .table thead th {
            background-color: #30363d;
            color: #c9d1d9;
        }
        .dark-mode .table tbody tr {
            background-color: #21262d;
            color: #c9d1d9;
        }
        .dark-mode .table tbody tr:hover {
            background-color: #30363d;
        }
        .dark-mode .nav-link.active {
            background-color: #21262d;
            color: #58a6ff;
        }
        .dark-mode .box {
            background-color: #21262d;
            color: #c9d1d9;
            border-color: #30363d;
        }
        .dark-mode .progress-container {
            background-color: #30363d;
        }
        .dark-mode .progress-bar {
            background-color: #fff;
        }
        .dark-mode .btn-danger {
            background-color: #cc0000;
            border-color: #990000;
        }
        .dark-mode .btn-danger:hover {
            background-color: #990000;
            border-color: #660000;
        }

        .dark-mode .btn-success {
            background-color: #1e7e34;
            border-color: #155724;
        }
        .dark-mode .btn-success:hover {
            background-color: #155724;
            border-color: #0b3d19;
        }

        .dark-mode .category-box {
            background-color: #21262d;
            color: #c9d1d9;
            border-color: #30363d;
        }
        .dark-mode .bmi-metrics-box {
            background-color: #21262d;
            color: #c9d1d9;
            border-color: #30363d;
        }
        .dark-mode .modal-content {
            background-color: #21262d;
            color: #c9d1d9;
            border-color: #30363d;
        }
        .dark-mode .modal-header,
        .dark-mode .modal-footer {
            border-color: #30363d;
        }
        .dark-mode #update-metrics-btn {
            background-color: #0056b3;
            color: #ffffff;
            border-color: #0056b3;
        }
        .dark-mode #update-metrics-btn:hover {
            background-color: #004494;
            border-color: #004494;
        }
        .dark-mode #save-metrics-btn {
            background-color: #28a745;
            color: #ffffff;
            border-color: #28a745;
        }
        .dark-mode #save-metrics-btn:hover {
            background-color: #218838;
            border-color: #218838;
        }
        .dark-mode .edit-profile-card {
            background-color: #21262d;
            color: #c9d1d9;
            border-color: #30363d;
        }
        .dark-mode .form-group {
            background-color: #161b22;
            border-color: #30363d;
        }
        .dark-mode .form-control {
            background-color: #161b22;
            color: #c9d1d9;
            border-color: #30363d;
        }
        .dark-mode .btn-primary {
            background-color: #0056b3;
            color: #ffffff;
            border-color: #0056b3;
        }
        .dark-mode .btn-primary:hover {
            background-color: #004494;
            border-color: #004494;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-weight: bold;
            text-align: center;
        }
        .custom-table {
            background-color: #fff;
        }

        .custom-table tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        .progress-container {
            margin-top: 20px;
        }
        .progress-text-indicators span {
            position: relative;
            font-size: 12px;
            color: #666;
        }
        .progress-bar {
            background-color: #007bff;
        }
        .btn-success,
        .btn-danger {
            width: 45%;
            margin: 5px 2.5%;
            font-size: 1em;
        }
        .tab-content .tab-pane {
            padding: 20px;
        }
        .category-box {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .nav-tabs {
            border-bottom: none;
            justify-content: center;
            margin-bottom: 20px;
        }
        .nav-link {
            color: #000;
            border: none;
            font-size: 1.1em;
        }
        .nav-link.active {
            color: #fff;
            background-color: #007bff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        body.dark-mode .container.mt-5.profile-container {
            background-color: #0d1117;
        }

        /* Container and Card Styling Adjustments */
        .container.mt-5.profile-container {
            padding: 0 15px;
        }

        .card.shadow-sm {
            margin-bottom: 15px;
        }

        body.dark-mode .nav-link {
            color: #fff;
        }

        body.dark-mode .nav-link.active {
            color: #fff;
            background-color: #0d1117;
        }

        /* Home Tab Styles */
        #nav-home {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #nav-home h2 {
            font-size: 2em;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        #nav-home p {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 20px;
        }

        #nav-home .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        #nav-home .card-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        #nav-home .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
            transition: background-color 0.3s, color 0.3s;
        }

        #nav-home .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        #nav-home .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        #nav-home .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        #nav-home .profile-picture {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 3px solid #007bff;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        #nav-home .profile-name {
            font-size: 1.5em;
            font-weight: bold;
            color: #343a40;
            margin-top: 15px;
        }

        #nav-home .profile-email {
            font-size: 1em;
            color: #6c757d;
            margin-top: 5px;
        }

        #nav-home .profile-plan {
            font-size: 1.1em;
            color: #6c757d;
            margin-top: 5px;
        }

        #nav-home .toggle-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        #nav-home .switch {
            position: relative;
            display: inline-block;
            width: 66px;
            height: 34px;
        }

        #nav-home .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        #nav-home .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #nav-home .slider:before {
            position: absolute;
            content: "\263C";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
            text-align: center;
            line-height: 26px;
            font-size: 18px;
            color: #fdd835;
        }

        #nav-home input:checked + .slider {
            background-color: #1e3a8a;
        }

        #nav-home input:checked + .slider:before {
            transform: translateX(33px);
            content: "\263E";
            color: #1e3a8a;
        }

        /* Chart Sizes */
        #workoutPlanChart, #progressChart, #attendanceChart {
            width: 100%;
            height: 400px; 
        }

        @media (max-width: 768px) {
            #workoutPlanChart, #progressChart, #attendanceChart {
                height: 400px;
            }
            .card-body {
                padding: 0 !important;
            }
            .card {
                width: 100%;
            }

            #title {
                font-size: 1.5rem;
            }
            .toggle-container {
                margin-top: 10px; 
            }
        }

        /* Dark Mode Styles */
        body.dark-mode #nav-home {
            background-color: #0d1117;
            color: #c9d1d9;
            border-color: #30363d;
        }

        body.dark-mode #nav-home h2 {
            color: #c9d1d9;
        }

        body.dark-mode #nav-home p {
            color: #8b949e;
        }

        body.dark-mode #nav-home .card {
            background-color: #333;
            color: #f1f1f1;
            border-color: #444;
        }

        body.dark-mode #nav-home .card-title {
            color: #c9d1d9;
        }

        body.dark-mode #nav-home .btn-outline-primary {
            border-color: #58a6ff;
            color: #58a6ff;
        }

        body.dark-mode #nav-home .btn-outline-primary:hover {
            background-color: #58a6ff;
            color: #fff;
        }

        body.dark-mode #nav-home .btn-primary {
            background-color: #58a6ff;
            border-color: #58a6ff;
        }

        body.dark-mode #nav-home .btn-primary:hover {
            background-color: #1e7e34;
            border-color: #1e7e34;
        }

        body.dark-mode #nav-home .profile-picture {
            border-color: #58a6ff;
        }

        body.dark-mode #nav-home .profile-name, 
        body.dark-mode #nav-home .profile-email,
        body.dark-mode #nav-home .profile-plan {
            color: #c9d1d9;
        }

        body.dark-mode #nav-home .toggle-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        body.dark-mode .container.mt-6.profile-container {
            background-color: #21262d;
        }

        /* Dark Mode Nav Link Styles */
        body.dark-mode .nav-link {
            color: #c9d1d9;
        }

    </style>
@endsection
@if(Auth::user()->payment_status)
    @if (Auth::user()->data_filled)
    @section('content')

        
        
    <!-- Dark Mode Toggle Switch -->
    <header class="container-fluid bg-primary text-white py-3 mb-4 mt-3 shadow-sm rounded">
        <div class="row align-items-center">
            <div class="col-8 col-md-9">
                <h1 id="title" class="mb-0 display-4" style="font-weight: bold;">Leaderboards</h1>
            </div>
            <div class="col-4 col-md-3 text-end">
                <div class="toggle-container d-inline-flex align-items-center">
                    <label class="switch mb-0">
                        <input type="checkbox" id="darkModeToggle">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <p id="date" class="mb-0 fs-5">
                    {{ DateTime::createFromFormat('!m', date('m'))->format('F'). ' '. date('d Y') }}
                </p>
            </div>
        </div>
    </header> 


    <div class="container-fluid bg-orange footer">
    <nav class="navbar navbar-expand navbar-dark bg-primary text-white fixed-bottom">
        <ul class="navbar-nav nav justified w-100" id="nav-bot">
            <li class="nav-item">
                <a href="#" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" class="nav-link active" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" id="nav-leaderboards-tab" data-bs-toggle="tab" data-bs-target="#nav-leaderboards" class="nav-link" role="tab" aria-controls="nav-leaderboards" aria-selected="false">Leaderboards</a>
            </li>
            <li class="nav-item">
                <a href="#" id="nav-milestones-tab" data-bs-toggle="tab" data-bs-target="#nav-milestones" class="nav-link" role="tab" aria-controls="nav-milestones" aria-selected="false">Milestones</a>
            </li>
            <li class="nav-item">
                <a href="#" id="nav-bmi-tab" data-bs-toggle="tab" data-bs-target="#nav-bmi" class="nav-link" role="tab" aria-controls="nav-bmi" aria-selected="false">My BMI</a>
            </li>
            <li class="nav-item">
                <a href="#" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" class="nav-link" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
            </li>
        </ul>
    </nav>

    <!-- Tab content -->
    <div class="tab-content" id="nav-tabContent">
        <!-- Home Tab -->
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container mt-5 profile-container">
                <!-- Combined Sections -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <!-- Welcome Message -->
                        <div class="text-center mb-4">
                            <h2>Welcome Back, {{ auth()->user()->username }}!</h2>
                            <p>Let's make today a great workout day!</p>
                        </div>
                        <hr>

                        <!-- Recent Activity -->
                        <h3 class="card-title d-flex justify-content-between align-items-center">
                            <span>Recent Activity</span>
                            <i id="recentActivityChevron" class="fas fa-chevron-right ms-2" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#recentActivityDetails"></i>
                        </h3>
                        <table class="table table-striped table-dark-mode">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>June 25, 2024</td>
                                    <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps with 40kg</td>
                                </tr>
                                <tr>
                                    <td>June 23, 2024</td>
                                    <td>Completed Bench Press - 3 sets of 8 reps with 20kg and Deadlift - 2 sets of 8 reps with 30kg</td>
                                </tr>
                                <tr>
                                    <td>June 21, 2024</td>
                                    <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps with 40kg</td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="recentActivityDetails" class="collapse">
                            <table class="table table-striped table-dark-mode">
                                <tbody>
                                    <tr>
                                        <td>June 19, 2024</td>
                                        <td>Completed Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg</td>
                                    </tr>
                                    <tr>
                                        <td>June 17, 2024</td>
                                        <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of 8 reps with 20kg</td>
                                    </tr>
                                    <tr>
                                        <td>June 15, 2024</td>
                                        <td>Completed Bench Press - 3 sets of 8 reps with 20kg and Deadlift - 2 sets of 8 reps with 30kg</td>
                                    </tr>
                                    <tr>
                                        <td>June 13, 2024</td>
                                        <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps with 40kg</td>
                                    </tr>
                                    <tr>
                                        <td>June 11, 2024</td>
                                        <td>Completed Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg</td>
                                    </tr>
                                    <tr>
                                        <td>June 9, 2024</td>
                                        <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of 8 reps with 20kg</td>
                                    </tr>
                                    <tr>
                                        <td>June 7, 2024</td>
                                        <td>Completed Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg</td>
                                    </tr>
                                    <tr>
                                        <td>June 5, 2024</td>
                                        <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps with 40kg</td>
                                    </tr>
                                    <tr>
                                        <td>June 3, 2024</td>
                                        <td>Attended Beginner Yoga Class</td>
                                    </tr>
                                    <tr>
                                        <td>June 2, 2024</td>
                                        <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of 8 reps with 20kg</td>
                                    </tr>
                                    <tr>
                                        <td>June 1, 2024</td>
                                        <td>Completed Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>

                        <!-- Attendance Section -->
                        <h3 class="card-title d-flex justify-content-between align-items-center">
                            <span class="ms-3">Gym Visits this month</span>
                            <div class="d-flex align-items-center ms-auto">
                                <span class="badge bg-primary ms-2" id="attendanceCount">{{count($visits)}}</span>
                                <i id="attendanceChevron" class="fas fa-chevron-right ms-2" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#visitHistory"></i>
                            </div>
                        </h3>
                        <p class="text-left ms-3">Tap to view your full visit history</p>
                        <div id="visitHistory" class="collapse">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Check-in Time</th>
                                    <th>Check-out Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visits as $visit)
                                <tr>
                                    <td>{{$visit->date}}</td>
                                    <td>{{$visit->time_in}}</td>
                                    <td>{{$visit->time_out==null?"N/A":$visit->time_out}}</td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                        </div>
                        <hr>

                        <div class="row">
                            <!-- Today's Workout Plan -->
                            <div class="col-lg-6 col-md-12">
                                <div class="card shadow-sm mb-4">
                                    <div class="card-body">
                                        <h3 class="card-title">Today's Workout Plan</h3>
                                        <canvas id="workoutPlanChart"></canvas>
                                        <div id="chartInsights" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Progress Overview with Charts -->
                            <div class="col-lg-6 col-md-12">
                                <div class="card shadow-sm mb-4">
                                    <div class="card-body">
                                        <h3 class="card-title">Progress Overview</h3>
                                        <canvas id="progressChart"></canvas>
                                        <div id="progressInsights" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Upcoming Events/Classes -->
                            <div class="col-lg-6 col-md-12">
                                <div class="card shadow-sm mb-4">
                                    <div class="card-body">
                                        <h3 class="card-title">Upcoming Events/Classes</h3>
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Goals and Challenges -->
                        <div class="container mt-5">
                            <div class="card shadow-sm mb-4">
                                <div class="card-body text-center">
                                    <h3 class="card-title text-center">Goals and Challenges</h3>
                                    <p class="text-center"><strong>Current Goal:</strong> Assigned by Trainer - Lose 2kg by the end of July.</p>
                                    <p class="text-center"><strong>Challenge:</strong> Participate in the 15-day beginner squat challenge (starting with 10 squats per day).</p>
                                </div>
                            </div>

                            <!-- Trainer's Corner & Gym News -->
                            <div class="card shadow-sm mb-4">
                                <div class="card-body text-center">
                                    <h3 class="card-title text-center">Trainer's Corner & Gym News</h3>
                                    <hr>
                                    <div class="text-center">
                                        <h4>Trainer's Corner</h4>
                                        <p>Message from your trainer: <em>"Keep pushing yourself and stay consistent. You're doing great!"</em></p>
                                        <p>Watch this tutorial on proper deadlift form:</p>
                                        <a href="https://www.youtube.com/watch?v=r4MzxtBKyNE" class="btn btn-primary" target="_self">Watch Video</a>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <h4>Gym News and Updates</h4>
                                        <p>We're excited to announce the arrival of new state-of-the-art equipment in the gym!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for event details -->
                        <div class="modal fade" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="eventDetailsModalLabel">Event Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p id="eventTitle"></p>
                                        <p id="eventTime"></p>
                                        <p id="eventDescription"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of event details modal -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End of home tab -->

        <!-- Leaderboards Tab -->
        <div class="tab-pane fade" id="nav-leaderboards" role="tabpanel" aria-labelledby="nav-leaderboards-tab">
            <!-- Leaderboards content goes here -->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-bottom: 20px">
                    <h1 style="margin-left: 5px; margin-right: 15px">LIFTS</h1>
                    <button class="nav-link active" id="nav-bench-tab" data-bs-toggle="tab" data-bs-target="#nav-bench" type="button" role="tab" aria-controls="nav-bench" aria-selected="true">BENCH PRESS</button>
                    <button class="nav-link" id="nav-deadlift-tab" data-bs-toggle="tab" data-bs-target="#nav-deadlift" type="button" role="tab" aria-controls="nav-deadlift" aria-selected="false">DEADLIFT</button>
                    <button class="nav-link" id="nav-squats-tab" data-bs-toggle="tab" data-bs-target="#nav-squats" type="button" role="tab" aria-controls="nav-squats" aria-selected="false">SQUATS</button>
                </div>
            </nav>

                    <!-- Tables for each category -->
                    
                    <div class="tab-content">
                        <div id="nav-bench" class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-bench-tab">
                            <div class="category-box mb-4">
                                <h6>1 REP MAX</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table1RepMaxBench">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="category-box mb-4">
                                <h6>6 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table6RepsBench">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="category-box mb-4">
                                <h6>12 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table12RepsBench">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="nav-deadlift" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-deadlift-tab">
                            <div class="category-box mb-4">
                                <h6>1 REP MAX</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table1RepMaxDeadlift">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="category-box mb-4">
                                <h6>6 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table6RepsDeadlift">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="category-box mb-4">
                                <h6>12 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table12RepsDeadlift">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="nav-squats" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-squats-tab">
                            <div class="category-box mb-4">
                                <h6>1 REP MAX</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table1RepMaxSquats">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="category-box mb-4">
                                <h6>6 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table6RepsSquats">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="category-box mb-4">
                                <h6>12 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table12RepsSquats">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                            
                </div>


        <!-- Milestones tab and content goes here -->
        <div class="tab-pane fade" id="nav-milestones" role="tabpanel" aria-labelledby="nav-milestones-tab">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-bottom: 20px">
                    <h1 class="text-primary" style="margin-left: 5px; margin-right: 15px; font-weight: bold;">
                        CATEGORIES</h1>
                    <button class="nav-link active text-primary" id="nav-1rep-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-1rep" type="button" role="tab" aria-controls="nav-1rep"
                        aria-selected="true">1 REP MAX</button>
                    <button class="nav-link text-primary" id="nav-6reps-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-6reps" type="button" role="tab" aria-controls="nav-6reps"
                        aria-selected="false">6 REPS</button>
                    <button class="nav-link text-primary" id="nav-12reps-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-12reps" type="button" role="tab" aria-controls="nav-12reps"
                        aria-selected="false">12 REPS</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-1rep" role="tabpanel"
                    aria-labelledby="nav-1rep-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title text-center">BENCH PRESS</h3>
                                    <div class="progress-container ml-5 mb-3">
                                        <div class="progress h-30">
                                            <div class="progress-bar bg-info" type="progressbar"
                                                id="1bp" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        
                                        <div class="d-flex justify-content-between">
                                            @for ($i = 0; $i < 6; $i++)
                                                <div id="1bp{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                            @endfor
                                            
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-danger" type='mst' mode="lazy"
                                            reps="1" lift="Bench Press">I Slacked Off</button>
                                        <button class="btn btn-success" type='mst' mode="work"
                                            reps="1" lift="Bench Press">Advance Progress</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title text-center">DEADLIFT</h3>
                                    <div class="progress-container ml-5 mb-3">
                                        <div class="progress h-30">
                                            <div class="progress-bar bg-info" type="progressbar"
                                                id="1dl" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            @for ($i = 0; $i < 6; $i++)
                                                <div id="1dl{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                            @endfor
                                            
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-danger" type='mst' mode="lazy" type="milestone"
                                            lift="Deadlift" reps="1">I Slacked Off</button>
                                        <button class="btn btn-success" type='mst' mode="work" type="milestone"
                                            lift="Deadlift" reps="1">Advance Progress</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title text-center">BARBELL SQUATS</h3>
                                    <div class="progress-container ml-5 mb-3">
                                        <div class="progress h-30">
                                            <div class="progress-bar bg-info" type="progressbar"
                                                id="1bs" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            @for ($i = 0; $i < 6; $i++)
                                                <div id="1bs{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                            @endfor
                                            
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-danger" type='mst' mode="lazy"
                                            lift="Barbell Squats" reps="1">I Slacked Off</button>
                                        <button class="btn btn-success" type='mst' mode="work" 
                                            lift="Barbell Squats" reps="1">Advance Progress</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-6reps" role="tabpanel" aria-labelledby="nav-6reps-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title text-center">BENCH PRESS</h3>
                                    <div class="progress-container ml-5 mb-3">
                                        <div class="progress h-30">
                                            <div class="progress-bar bg-info" type="progressbar"
                                                id="6bp" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            @for ($i = 0; $i < 6; $i++)
                                                <div id="6bp{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                            @endfor

                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-danger" type='mst' mode="lazy" type="milestone"
                                            lift="Bench Press" reps="6">I Slacked Off</button>
                                        <button class="btn btn-success" type='mst' mode="work" type="milestone"
                                            lift="Bench Press" reps="6">Advance Progress</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title text-center">DEADLIFT</h3>
                                    <div class="progress-container ml-5 mb-3">
                                        <div class="progress h-30">
                                            <div class="progress-bar bg-info" type="progressbar"
                                                id="6dl" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            @for ($i = 0; $i < 6; $i++)
                                                <div id="6dl{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                            @endfor
                                            
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-danger" type='mst' mode="lazy" type="milestone"
                                            lift="Deadlift" reps="6">I Slacked Off</button>
                                        <button class="btn btn-success" type='mst' mode="work" type="milestone"
                                            lift="Deadlift" reps="6">Advance Progress</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title text-center">BARBELL SQUATS</h3>
                                    <div class="progress-container ml-5 mb-3">
                                        <div class="progress h-30">
                                            <div class="progress-bar bg-info" type="progressbar"
                                                id="6bs" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            @for ($i = 0; $i < 6; $i++)
                                                <div id="6bs{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                            @endfor
                                            
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-danger" type='mst' mode="lazy"
                                            lift="Barbell Squats" reps="6">I Slacked Off</button>
                                        <button class="btn btn-success" type='mst' mode="work" 
                                            lift="Barbell Squats" reps="6">Advance Progress</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-12reps" role="tabpanel" aria-labelledby="nav-12reps-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title text-center">BENCH PRESS</h3>
                                    <div class="progress-container ml-5 mb-3">
                                        <div class="progress h-30">
                                            <div class="progress-bar bg-info" type="progressbar"
                                                id="12bp" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>

                                        <div class="d-flex justify-content-between mt-2">
                                            @for ($i = 0; $i < 6; $i++)
                                                <div id="12bp{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                            @endfor

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-danger" type='mst' mode="lazy" type="milestone"
                                            lift="Bench Press" reps="12">I Slacked Off</button>
                                        <button class="btn btn-success" type='mst' mode="work" type="milestone"
                                            lift="Bench Press" reps="12">Advance Progress</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title text-center">DEADLIFT</h3>
                                    <div class="progress-container ml-5 mb-3">
                                        <div class="progress h-30">
                                            <div class="progress-bar bg-info" type="progressbar"
                                                id="12dl" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            @for ($i = 0; $i < 6; $i++)
                                                <div id="12dl{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                            @endfor
                                            
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-danger" type='mst' mode="lazy" type="milestone"
                                            lift="Deadlift" reps="12">I Slacked Off</button>
                                        <button class="btn btn-success" type='mst' mode="work" type="milestone"
                                            lift="Deadlift" reps="12">Advance Progress</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h3 class="card-title text-center">BARBELL SQUATS</h3>
                                    <div class="progress-container ml-5 mb-3">
                                        <div class="progress h-30">
                                            <div class="progress-bar bg-info" type="progressbar"
                                                id="12bs" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            @for ($i = 0; $i < 6; $i++)
                                                <div id="12bs{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                            @endfor
                                            
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-danger" type='mst' mode="lazy"
                                            lift="Barbell Squats" reps="12">I Slacked Off</button>
                                        <button class="btn btn-success" type='mst' mode="work" 
                                            lift="Barbell Squats" reps="12">Advance Progress</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Milestones tab -->


                <div class="tab-pane fade" id="nav-bmi" role="tabpanel" aria-labelledby="nav-bmi-tab">
                    <!-- BMI content goes here -->
                    
                    <!-- Graph here -->

                    <!-- Table here -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>BMI</th>
                                <th>BMI Classification</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bmis as $bmi)
                                <tr>
                                    <td> {{$bmi->date}} </td>
                                    <td> {{$bmi->height}} </td>
                                    <td> {{$bmi->weight}} </td>
                                    <td> {{$bmi->bmi}} </td>
                                    <td> {{$bmi->bmi_classification}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    
                </div>

                <!-- Profile Tab -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="container mt-5 profile-container" id="profile">
                        <div class="profile-header text-center p-4 bg-primary text-white rounded shadow">
                            <img src="{{ asset($profile->profile_image )  }}" alt="Profile Picture" class="rounded-circle profile-picture mb-3">
                            <h4 class="profile-name mb-1">{{  $profile->firstName}} {{  $profile->lastName}}</h4>
                            <p class="profile-email mb-2">{{ Auth::user()->email }}</p>
                            <p class="profile-plan badge bg-light text-dark">Monthly plan</p>
                        </div>    
                        <div class="d-grid gap-2 mt-4">
                            <button type="profile" targets="qrCodePage" id="qrCodeBtn" class="btn btn-outline-primary">QR Code</button>
                            <button type="profile" targets="editProfilePage" id="editProfileBtn" class="btn btn-outline-primary">Edit Profile</button>
                            <button type="profile" targets="editProfilePage" id="membershipDetailsBtn" class="btn btn-outline-primary">Membership Details</button>
                            <a href="{{ route('password.request') }}" id="passwordSecurityBtn" class="btn btn-outline-primary">Password and Security</a>
                            <button type="profile" targets="policiesRegulationsPage" id="policiesRegulationsBtn" class="btn btn-outline-primary">Policies and Regulations</button>
                            <a class="btn btn-outline-danger" href="{{route('logout')}}">Logout</a>
                        </div>
                    </div>
                </div>


                    <!-- QR Code Page -->
                    <div id="qrCodePage" class="page-content" style="display: none;">
                        <h3>QR Code</h3>
                        <div class="container text-center mt-5">
                            <div class="row mt-5 justify-content-center">
                                <div class="col-md-6">
                                    <div class="qr-code-container shadow-lg rounded">
                                        <img src="{{ route('qr',auth()->user()->id) }}" alt="QR Code" class="img-fluid qr-code-image rounded">
                                        <div class="scan-me mt-3">
                                            <i class="fa fa-mobile"></i>
                                            <span class="scan-me-text">SCAN ME</span>
                                        </div>
                                        <p class="qr-instruction mt-3">Present this QR code to the Gym Admin to check in/out</p>
                                        <button class="btn btn-secondary mt-3" target="qrCodePage" type="back"><i class="fa fa-arrow-left"></i> Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Profile Page -->
                    <div id="editProfilePage" class="page-content" style="display: none;">
                        <h3>Edit Profile</h3>
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="card shadow-lg rounded-lg" style="background-color: #f8f9fa;">
                                        <div class="card-body">
                                            <div class="text-center mb-4">
                                                <form id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <label for="profile_image" style="cursor: pointer;">
                                                        <img src="{{ asset( $profile->profile_image)   }}" alt="Profile Image" class="rounded-circle border border-secondary shadow-sm" width="120" height="120">
                                                        <input type="file" id="profile_image" name="profile_image" accept="image/jpeg,image/png" style="display: none;" onchange="document.getElementById('profileForm').submit();">
                                                    </label>
                                                </form>
                                                <h4 class="card-title mt-3">{{  $profile->firstName}} {{  $profile->lastName }}</h4>
                                                <p class="card-text text-muted">{{ !Auth::user()->email }}</p>
                                            </div>
                                            <form id="profileFormDetails" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group text-left">
                                                    <label for="firstName" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="firstName" name="firstName" value="{{  $profile->firstName }}" required>
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="lastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName" value="{{  $profile->lastName }}" required>
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="birthdate" class="form-label">Date of Birth</label>
                                                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{$profile->birthdate }}" required>
                                                </div>
                                                <div class="form-group text-left">
                                                    <label for="email" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$" title="Please enter a valid email address">
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </form>

                                                    <button class="btn btn-secondary ml-2" type='back' target="editProfilePage"><i class="fa fa-arrow-left"></i> Back</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Membership Details Page -->
                    <div id="membershipDetailsPage" class="page-content" style="display: none;">
                        <h3>Membership Details</h3>
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="card shadow text-center p-4 rounded-lg" style="background-color: #f8f9fa;">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Current Membership Plan</h5>
                                            <div class="membership-plan mb-4">
                                                
                                            </div>
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="mb-1 font-weight-bold">Start Date:</p>
                                                    
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-1 font-weight-bold">Expiry Date:</p>
                                                    
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="mb-1 font-weight-bold">Price:</p>
                                                        <p class="text-secondary">₱499.00</p>
                                                        <p class="text-muted small">Pricing may vary</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-secondary mt-3" type="back" target="membershipDetailsPage">
                                                    <i class="fa fa-arrow-left"></i> Back
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Policies and Regulations Page -->
                    <div id="policiesRegulationsPage" class="page-content" style="display: none;">
                        <h3>Data Privacy Notice</h3>
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="card shadow-lg p-4" style="background-color: #ffffff; border-radius: 10px; width: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4 text-center text-dark">Data Privacy Notice</h5>
                                            <div class="policies-content mb-4">
                                                <h6 class="text-uppercase text-secondary">Introduction</h6>
                                                <p>
                                                    At Stamina Fitness Centre, we value your privacy and are committed to protecting your personal data in compliance with the Data Privacy Act of 2012 (Republic Act No. 10173) of the Philippines. This Data Privacy Notice explains how we collect, use, and safeguard your personal information.
                                                </p>
                                                <h6 class="text-uppercase text-secondary mt-4">Collection of Personal Data</h6>
                                                <p>
                                                    We collect personal data that you provide to us directly through various means, including:
                                                </p>
                                                <ul>
                                                    <li>Membership registration forms, both online and offline</li>
                                                    <li>Health assessment forms</li>
                                                    <li>Event and activity registration forms</li>
                                                    <li>Communications through emails, phone calls, and face-to-face interactions</li>
                                                    <li>Payment transactions</li>
                                                </ul>
                                                <p>
                                                    The personal data we collect includes, but is not limited to:
                                                </p>
                                                <ul>
                                                    <li>Full name</li>
                                                    <li>Contact information (email address, phone number, home address)</li>
                                                    <li>Demographic information (age, gender, date of birth)</li>
                                                    <li>Health and medical information relevant to your fitness activities</li>
                                                    <li>Payment details (credit/debit card information, billing address)</li>
                                                </ul>
                                                <h6 class="text-uppercase text-secondary mt-4">Use of Personal Data</h6>
                                                <p>
                                                    Your personal data is used for the following purposes:
                                                </p>
                                                <ul>
                                                    <li>To manage your gym membership and provide you with access to our facilities and services</li>
                                                    <li>To conduct health assessments and tailor fitness programs to your needs</li>
                                                    <li>To communicate with you regarding your membership, schedules, and any updates</li>
                                                    <li>To process your payments and manage your financial transactions</li>
                                                    <li>To improve our services through internal analysis and research</li>
                                                    <li>To ensure your safety and provide first aid or emergency response if necessary</li>
                                                </ul>
                                                <h6 class="text-uppercase text-secondary mt-4">Data Security</h6>
                                                <p>
                                                    We implement appropriate technical and organizational measures to protect your personal data from unauthorized access, use, or disclosure. These measures include:
                                                </p>
                                                <ul>
                                                    <li>Secure storage of physical and digital records</li>
                                                    <li>Restricted access to your data, limited to authorized personnel only</li>
                                                    <li>Use of encryption technologies for sensitive information</li>
                                                    <li>Regular security audits and assessments</li>
                                                    <li>Training our staff on data privacy and protection practices</li>
                                                </ul>
                                                <h6 class="text-uppercase text-secondary mt-4">Sharing of Personal Data</h6>
                                                <p>
                                                    We do not share your personal data with third parties without your consent, except in the following circumstances:
                                                </p>
                                                <ul>
                                                    <li>When required by law or legal processes</li>
                                                    <li>When necessary to provide our services (e.g., sharing information with fitness instructors for personalized training)</li>
                                                    <li>When required to protect your vital interests (e.g., sharing medical information with healthcare providers in emergencies)</li>
                                                </ul>
                                                <h6 class="text-uppercase text-secondary mt-4">Retention of Personal Data</h6>
                                                <p>
                                                    We retain your personal data only for as long as necessary to fulfill the purposes for which it was collected and to comply with legal obligations. The retention period may vary depending on the type of data and the purpose for its collection.
                                                </p>
                                                <h6 class="text-uppercase text-secondary mt-4">Your Rights</h6>
                                                <p>
                                                    Under the Data Privacy Act of 2012, you have the following rights regarding your personal data:
                                                </p>
                                                <ul>
                                                    <li><strong>Right to Access:</strong> You can request access to your personal data held by us.</li>
                                                    <li><strong>Right to Rectification:</strong> You can request corrections to any inaccuracies in your personal data.</li>
                                                    <li><strong>Right to Erasure:</strong> You can request the deletion of your personal data under certain conditions.</li>
                                                    <li><strong>Right to Restrict Processing:</strong> You can request the restriction of processing your personal data under certain conditions.</li>
                                                    <li><strong>Right to Object:</strong> You can object to the processing of your personal data under certain conditions.</li>
                                                    <li><strong>Right to Data Portability:</strong> You can request the transfer of your personal data to another organization.</li>
                                                </ul>
                                                <p>
                                                    To exercise these rights, please contact us at our provided contact information. We will respond to your request within a reasonable timeframe.
                                                </p>
                                                <h6 class="text-uppercase text-secondary mt-4">Changes to the Privacy Notice</h6>
                                                <p>
                                                    We may update this Data Privacy Notice from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. Any changes will be posted on our website and, where appropriate, notified to you via email.
                                                </p>
                                                <p class="mt-4">
                                                    If you have any questions or concerns about our Data Privacy Notice, please do not hesitate to contact us at 09234567891 or visit our customer service desk.
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-secondary mt-3" type="back" target="policiesRegulationsPage">
                                                    <i class="fa fa-arrow-left"></i> Back
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

    <!-- Chart.js for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <!-- Popper.js (required for Bootstrap 4) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>

        <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const darkModeToggle = document.getElementById('darkModeToggle');
            const body = document.body;

            // Load saved dark mode preference
            if (localStorage.getItem('dark-mode') === 'enabled') {
                body.classList.add('dark-mode');
                darkModeToggle.checked = true;
            }

            darkModeToggle.addEventListener('change', () => {
                body.classList.toggle('dark-mode');
                if (body.classList.contains('dark-mode')) {
                    localStorage.setItem('dark-mode', 'enabled');
                } else {
                    localStorage.setItem('dark-mode', 'disabled');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Workout Plan Chart
            var ctxWorkout = document.getElementById('workoutPlanChart').getContext('2d');
            var workoutPlanChart = new Chart(ctxWorkout, {
                type: 'bar',
                data: {
                    labels: ['Deadlift', 'Squats'],
            datasets: [
                {
                    label: 'Sets',
                    data: [2, 3], 
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Reps',
                    data: [8, 10],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Weight (kg)',
                    data: [30, 40], 
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Count / Weight (kg)',
                                color: '#666'
                            }
                        }
                    },
                    onClick: function(event, elements) {
                        if (elements.length > 0) {
                            var elementIndex = elements[0].index;
                            var datasetIndex = elements[0].datasetIndex;
                            var datasetLabel = workoutPlanChart.data.datasets[datasetIndex].label;
                            var datasetValue = workoutPlanChart.data.datasets[datasetIndex].data[elementIndex];
                            var exerciseLabel = workoutPlanChart.data.labels[elementIndex];

                            generateInsight(datasetLabel, datasetValue, exerciseLabel);
                        }
                    }
                }
            });

            function generateInsight(label, value, exercise) {
                var insightText = '';
                if (label === 'Sets') {
                    insightText = `You have planned ${value} sets of ${exercise}.`;
                } else if (label === 'Reps') {
                    insightText = `You have planned ${value} reps for each set of ${exercise}.`;
                } else if (label === 'Weight (kg)') {
                    insightText = `You have planned to lift ${value} kg for ${exercise}.`;
                }

                document.getElementById('chartInsights').innerText = insightText;
            }

            // Workout Duration Chart
            var ctxDuration = document.getElementById('progressChart').getContext('2d');
            var durationChart = new Chart(ctxDuration, {
                type: 'line',
                data: {
                    labels: [
                        'June 1', 'June 2', 'June 3', 'June 5', 'June 7', 'June 9', 'June 11',
                        'June 13', 'June 15', 'June 17', 'June 19', 'June 21', 'June 23', 'June 25'
                    ],
                    datasets: [{
                        label: 'Workout Duration (minutes)',
                        data: [
                            115, 
                            115, 
                            115, 
                            115, 
                            115, 
                            115, 
                            115, 
                            120, 
                            115, 
                            120, 
                            110, 
                            115, 
                            120, 
                            115
                        ],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Insights for Workout Duration Chart
            function generateDurationInsights() {
                var insights = '';
                var data = durationChart.data.datasets[0].data;

                // Calculate total duration
                var totalDuration = data.reduce((a, b) => a + b, 0);

                // Calculate average duration
                var averageDuration = totalDuration / data.length;

                insights += `<p>Total Workout Duration: ${totalDuration} minutes over 14 days.</p>`;
                insights += `<p>Average Daily Workout Duration: ${averageDuration.toFixed(2)} minutes.</p>`;

                document.getElementById('progressInsights').innerHTML = insights;
            }

            // Generate insights after the chart is rendered
            durationChart.options.animation.onComplete = generateDurationInsights;

            // Calendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-01T08:10:00',
                        end: '2024-06-01T10:05:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-02T08:05:00',
                        end: '2024-06-02T10:00:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of 8 reps with 20kg.'
                    },
                    { 
                        title: 'Yoga Class', 
                        start: '2024-06-03T08:15:00',
                        end: '2024-06-03T10:10:00',
                        description: 'Beginner Yoga Class.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-05T08:20:00',
                        end: '2024-06-05T10:15:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-07T08:10:00',
                        end: '2024-06-07T10:05:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-09T08:25:00',
                        end: '2024-06-09T10:20:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of 8 reps with 20kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-11T08:10:00',
                        end: '2024-06-11T10:05:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-13T08:00:00',
                        end: '2024-06-13T10:00:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-15T08:05:00',
                        end: '2024-06-15T10:00:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Deadlift - 2 sets of 8 reps with 30kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-17T08:10:00',
                        end: '2024-06-17T10:10:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of 8 reps with 20kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-19T08:15:00',
                        end: '2024-06-19T10:05:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-21T08:00:00',
                        end: '2024-06-21T09:55:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-23T08:00:00',
                        end: '2024-06-23T10:00:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Deadlift - 2 sets of 8 reps with 30kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-25T08:20:00',
                        end: '2024-06-25T10:15:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-27T08:05:00',
                        end: '2024-06-27T09:50:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-29T08:10:00',
                        end: '2024-06-29T10:05:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of 8 reps with 20kg.'
                    },
                    { 
                        title: 'Workout session with Coach Alex', 
                        start: '2024-06-30T08:00:00',
                        end: '2024-06-30T09:55:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg.'
                    }
                ],
                eventClick: function(info) {
                    // Display event details in the modal
                    document.getElementById('eventTitle').innerText = 'Title: ' + info.event.title;
                    document.getElementById('eventTime').innerText = 'Time: ' + info.event.start.toLocaleString() + ' - ' + info.event.end.toLocaleString();
                    document.getElementById('eventDescription').innerText = 'Description: ' + info.event.extendedProps.description;

                    // Show the modal
                    var eventDetailsModal = new bootstrap.Modal(document.getElementById('eventDetailsModal'));
                    eventDetailsModal.show();
                }
            });
            calendar.render();

        // Toggle visit history
        document.getElementById('attendanceChevron').addEventListener('click', function() {
            var visitHistory = document.getElementById('visitHistory');
            var chevron = this;
            if (visitHistory.classList.contains('show')) {
                visitHistory.classList.remove('show');
                chevron.classList.remove('fa-chevron-down');
                chevron.classList.add('fa-chevron-right');
            } else {
                visitHistory.classList.add('show');
                chevron.classList.remove('fa-chevron-right');
                chevron.classList.add('fa-chevron-down');
            }
        });

        document.getElementById('recentActivityChevron').addEventListener('click', function() {
            var recentActivityDetails = document.getElementById('recentActivityDetails');
            var chevron = this;
            if (recentActivityDetails.classList.contains('show')) {
                recentActivityDetails.classList.remove('show');
                chevron.classList.remove('fa-chevron-down');
                chevron.classList.add('fa-chevron-right');
            } else {
                recentActivityDetails.classList.add('show');
                chevron.classList.remove('fa-chevron-right');
                chevron.classList.add('fa-chevron-down');
            }
        });

        document.getElementById('visitHistory').addEventListener('hidden.bs.collapse', function () {
            var chevron = document.getElementById('attendanceChevron');
            chevron.classList.remove('fa-chevron-down');
            chevron.classList.add('fa-chevron-right');
        });

        document.getElementById('visitHistory').addEventListener('shown.bs.collapse', function () {
            var chevron = document.getElementById('attendanceChevron');
            chevron.classList.remove('fa-chevron-right');
            chevron.classList.add('fa-chevron-down');
        });

        document.getElementById('recentActivityDetails').addEventListener('hidden.bs.collapse', function () {
            var chevron = document.getElementById('recentActivityChevron');
            chevron.classList.remove('fa-chevron-down');
            chevron.classList.add('fa-chevron-right');
        });

        document.getElementById('recentActivityDetails').addEventListener('shown.bs.collapse', function () {
            var chevron = document.getElementById('recentActivityChevron');
            chevron.classList.remove('fa-chevron-right');
            chevron.classList.add('fa-chevron-down');
        });
    });
        </script>

@endsection
    @else
    <p class="d-none" id="filled">{{!Auth::user()->filled_details}}</p>
    <button type="button" id="showModal" class="d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Launch static backdrop modal
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content">
            <div class="modal-body">
                <div id="dpnotice" style="display: block">
                    <div class="row text-center">
                        <h3>Data Privacy Notice</h3>
                    </div>
                    <div class="container mt-5">
                        <div class="policies-content mb-4">
                            <h6 class="text-uppercase text-secondary">Introduction</h6>
                            <p>
                                At Stamina Fitness Centre, we value your privacy and are committed to protecting your personal data in compliance with the Data Privacy Act of 2012 (Republic Act No. 10173) of the Philippines. This Data Privacy Notice explains how we collect, use, and safeguard your personal information.
                            </p>
                            <h6 class="text-uppercase text-secondary mt-4">Collection of Personal Data</h6>
                            <p>
                                We collect personal data that you provide to us directly through various means, including:
                            </p>
                            <ul>
                                <li>Membership registration forms, both online and offline</li>
                                <li>Health assessment forms</li>
                                <li>Event and activity registration forms</li>
                                <li>Communications through emails, phone calls, and face-to-face interactions</li>
                                <li>Payment transactions</li>
                            </ul>
                            <p>
                                The personal data we collect includes, but is not limited to:
                            </p>
                            <ul>
                                <li>Full name</li>
                                <li>Contact information (email address, phone number, home address)</li>
                                <li>Demographic information (age, gender, date of birth)</li>
                                <li>Health and medical information relevant to your fitness activities</li>
                                <li>Payment details (credit/debit card information, billing address)</li>
                            </ul>
                            <h6 class="text-uppercase text-secondary mt-4">Use of Personal Data</h6>
                            <p>
                                Your personal data is used for the following purposes:
                            </p>
                            <ul>
                                <li>To manage your gym membership and provide you with access to our facilities and services</li>
                                <li>To conduct health assessments and tailor fitness programs to your needs</li>
                                <li>To communicate with you regarding your membership, schedules, and any updates</li>
                                <li>To process your payments and manage your financial transactions</li>
                                <li>To improve our services through internal analysis and research</li>
                                <li>To ensure your safety and provide first aid or emergency response if necessary</li>
                            </ul>
                            <h6 class="text-uppercase text-secondary mt-4">Data Security</h6>
                            <p>
                                We implement appropriate technical and organizational measures to protect your personal data from unauthorized access, use, or disclosure. These measures include:
                            </p>
                            <ul>
                                <li>Secure storage of physical and digital records</li>
                                <li>Restricted access to your data, limited to authorized personnel only</li>
                                <li>Use of encryption technologies for sensitive information</li>
                                <li>Regular security audits and assessments</li>
                                <li>Training our staff on data privacy and protection practices</li>
                            </ul>
                            <h6 class="text-uppercase text-secondary mt-4">Sharing of Personal Data</h6>
                            <p>
                                We do not share your personal data with third parties without your consent, except in the following circumstances:
                            </p>
                            <ul>
                                <li>When required by law or legal processes</li>
                                <li>When necessary to provide our services (e.g., sharing information with fitness instructors for personalized training)</li>
                                <li>When required to protect your vital interests (e.g., sharing medical information with healthcare providers in emergencies)</li>
                            </ul>
                            <h6 class="text-uppercase text-secondary mt-4">Retention of Personal Data</h6>
                            <p>
                                We retain your personal data only for as long as necessary to fulfill the purposes for which it was collected and to comply with legal obligations. The retention period may vary depending on the type of data and the purpose for its collection.
                            </p>
                            <h6 class="text-uppercase text-secondary mt-4">Your Rights</h6>
                            <p>
                                Under the Data Privacy Act of 2012, you have the following rights regarding your personal data:
                            </p>
                            <ul>
                                <li><strong>Right to Access:</strong> You can request access to your personal data held by us.</li>
                                <li><strong>Right to Rectification:</strong> You can request corrections to any inaccuracies in your personal data.</li>
                                <li><strong>Right to Erasure:</strong> You can request the deletion of your personal data under certain conditions.</li>
                                <li><strong>Right to Restrict Processing:</strong> You can request the restriction of processing your personal data under certain conditions.</li>
                                <li><strong>Right to Object:</strong> You can object to the processing of your personal data under certain conditions.</li>
                                <li><strong>Right to Data Portability:</strong> You can request the transfer of your personal data to another organization.</li>
                            </ul>
                            <p>
                                To exercise these rights, please contact us at our provided contact information. We will respond to your request within a reasonable timeframe.
                            </p>
                            <h6 class="text-uppercase text-secondary mt-4">Changes to the Privacy Notice</h6>
                            <p>
                                We may update this Data Privacy Notice from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. Any changes will be posted on our website and, where appropriate, notified to you via email.
                            </p>
                            <p class="mt-4">
                                If you have any questions or concerns about our Data Privacy Notice, please do not hesitate to contact us at 09234567891 or visit our customer service desk.
                            </p>
                        </div>
                        <div class="row">
                            <button class="btn btn-primary mt-3" id="accept">
                                Accept
                            </button>
                        </div>
                    </div>
                </div>
                <div id="filldata" style="display:none">
                    
                    <div class="row text-center">
                        <h3>Complete your registration</h3>
                    </div>
                    <br>
                    <form action="{{route('registrationFinish.POST')}}" method="post">
                        @csrf
                        <input value="No" type="hidden" name="data_privacy_accepted" id="data_privacy_accepted">
                        <input value="{{Auth::id()}}" type="hidden" name="regID" id="regID">
                        <br>
                        <div class="row text-center border border-primary">
                            <h5>Profile</h5>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" name="regFname" id="regFname" class="form-control" placeholder="">
                                    <label for="regFname">Enter your First Name</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" name="regLname" id="regLname" class="form-control" placeholder="">
                                    <label for="regLname">Enter your Last Name</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating"><input type="date" name="regBirthdate" id="regBirthdate" class="form-control" placeholder=""><label for="regBirthdate">Enter your Birthdate</label></div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating"><input type="tel" name="regContactNum" id="regContactNum" class="form-control" placeholder="" minlength="10" maxlength="11"><label for="regContactNum">Enter your contact number</label></div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">

                                <div class="form-floating">
                                    <select name="regRegion" id="regRegion" class="form-control" required="required" placeholder>
                                        <option  region_code="None">Choose a Region</option>
                                    </select>
                                    <label for="regRegion">Region</label>
                                </div>

                                

                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <select name="regCity" id="regCity" class="form-control" required="required" placeholder>
                                        <option city_code="None" >Choose a City</option>
                                    </select>
                                    <label for="regCity">City:&nbsp;</label>
                                </div>
                                

                            </div>
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating">
                                    <select name="regBarangay" id="regBarangay" class="form-control" required="required" placeholder>
                                        <option>Choose a Barangay</option>
                                    </select>
                                    <label for="regBarangay">Barangay</label>
                                </div>
                                

                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" name="regStreetNum" id="regStreetNum" class="form-control"
                                    required="required" placeholder>
                                <label for="regStreetNum">Street No./Street</label>
                                </div>
                                

                            </div>
                        </div>
                        <br>
                        <div class="row text-center border border-primary">
                            <h5>Health Assessment Form</h5>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="number" step="0.01" name="regHeight" id="regHeight" class="form-control" required="required" placeholder="">
                                    <label for="regHeight">Height(in)</label>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="number" step="0.01" name="regWeight" id="regWeight" class="form-control" required="required" placeholder>
                                    <label for="regWeight">Weight(lbs)</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="regBMI" name="regBMI" readonly="readonly" step="0.01" placeholder>
                                    <label for="regBMI">BMI</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="regBMIType" name="regBMIType" readonly="readonly">
                                    <label for="regBMIType">BMI Classification</label>

                                </div>
                            </div>
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        Are you physically fit?
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-6">
                                        <input type="radio" name="regPhysFit" id="regPhysFit" class="form-radio" value="1">
                                        <label for="regPhysFit">Yes</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" name="regPhysFit" id="regPhysFit" class="form-radio" value="0">
                                        <label for="regPhysFit">No</label>
                                    </div>
                                </div>
                                    
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        Have you undergone an operation?
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-6">
                                        <input type="radio" name="regOperation" id="regOperation" class="form-radio" value="1">
                                        <label for="regOperation">Yes</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" name="regOperation" id="regOperation" class="form-radio" value="0">
                                        <label for="regOperation">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        Do you have high blood pressure?
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-6">
                                        <input type="radio" name="regBP" id="regBP" class="form-radio" value="1">
                                        <label for="regBP">Yes</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" name="regBP" id="regBP" class="form-radio" value="0">
                                        <label for="regBP">No</label>
                                    </div>
                                </div>
                                    
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        Do you have heart problem?
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-6">
                                        <input type="radio" name="regHP" id="regHP" class="form-radio" value="1">
                                        <label for="regHP">Yes</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" name="regHP" id="regHP" class="form-radio" value="0">
                                        <label for="regHP">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" name="regEmergName" id="regEmergName" class="form-control" placeholder>
                                    <label for="regEmergName">Emergency Contact Name:</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" name="regEmergNum" id="regEmergNum" class="form-control" placeholder>
                                    <label for="regEmergNum">Emergency Contact Number:</label>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                
                                <div class="form-floating">
                                    <select  name="regTrainer" id="regTrainer" class="form-control" placeholder="">
                                        <option selected>Available Trainers</option>
                                        @foreach ($trainers as $trainer)
                                            <option value="{{$trainer->name}}">{{$trainer->name}} | Time in: {{$trainer->time_in}} | Time out: {{$trainer->time_out}} | Trainees : {{$trainer->trainee_count}}/10</option>
                                        @endforeach
                                    </select>
                                    <label for="regTrainer">Trainer</label></div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Finish Registration</button>

                        </div>
                        
                    </form>
                </div>
            </div>
          </div>
          
        </div>
      </div>
    @endif
        
@else
<p class="d-none" id="pay_status">{{!Auth::user()->payment_status}}</p>
<button type="button" class="d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="paymentNotice">
        
</button>

<!-- Modal -->
<div class="modal fade mt-5" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center"><br>
            <br>
            <br>
            <br>
            <br>
                <h1 style="font-size: 40px;">To activate your account, please pay the membership fee at the counter</h1>
                <h4>Once paid refresh this page</h4>
                <br>
                <br>
                <br>
                <br>
                <br>

            </div>
        </div>
    </div>
</div>
@endif