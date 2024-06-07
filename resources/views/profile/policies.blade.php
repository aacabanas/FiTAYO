@extends('base')
@section('title', 'Data Privacy Notice')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow p-4" style="background-color: #f8f9fa; border-radius: 10px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title mb-4 text-center">Data Privacy Notice</h5>
                        <div class="policies-content mb-4">
                            <h6 class="text-uppercase">Introduction</h6>
                            <p>
                                At Stamina Fitness Centre, we value your privacy and are committed to protecting your personal data in compliance with the Data Privacy Act of 2012 (Republic Act No. 10173) of the Philippines. This Data Privacy Notice explains how we collect, use, and safeguard your personal information.
                            </p>
                            <h6 class="text-uppercase mt-4">Collection of Personal Data</h6>
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
                            <h6 class="text-uppercase mt-4">Use of Personal Data</h6>
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
                            <h6 class="text-uppercase mt-4">Data Security</h6>
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
                            <h6 class="text-uppercase mt-4">Sharing of Personal Data</h6>
                            <p>
                                We do not share your personal data with third parties without your consent, except in the following circumstances:
                            </p>
                            <ul>
                                <li>When required by law or legal processes</li>
                                <li>When necessary to provide our services (e.g., sharing information with fitness instructors for personalized training)</li>
                                <li>When required to protect your vital interests (e.g., sharing medical information with healthcare providers in emergencies)</li>
                            </ul>
                            <h6 class="text-uppercase mt-4">Retention of Personal Data</h6>
                            <p>
                                We retain your personal data only for as long as necessary to fulfill the purposes for which it was collected and to comply with legal obligations. The retention period may vary depending on the type of data and the purpose for its collection.
                            </p>
                            <h6 class="text-uppercase mt-4">Your Rights</h6>
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
                            <h6 class="text-uppercase mt-4">Changes to the Privacy Notice</h6>
                            <p>
                                We may update this Data Privacy Notice from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. Any changes will be posted on our website and, where appropriate, notified to you via email.
                            </p>
                            <p class="mt-4">
                                If you have any questions or concerns about our Data Privacy Notice, please do not hesitate to contact us at 09234567891 or visit our customer service desk.
                            </p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            border: none;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 2em;
            font-weight: bold;
            color: #343a40;
        }

        .policies-content h6 {
            font-size: 1.3em;
            font-weight: bold;
            color: #343a40;
            margin-top: 1em;
        }

        .policies-content p, .policies-content ul {
            font-size: 1em;
            color: #6c757d;
        }

        .policies-content ul {
            padding-left: 20px;
        }

        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
            font-size: 1.2em;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .btn-sm {
            font-size: 1.1em;
        }

        .card-body {
            padding: 2em;
        }

        .container {
            margin-top: 5em;
        }

        .row {
            margin-bottom: 1.5em;
        }
    </style>
@endsection