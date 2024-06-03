@extends('base')
@section('title', 'QR Code')
@section('content')
<div class="container text-center mt-5">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6">
            <div class="qr-code-container">
                <img src="{{ route('qr',auth()->user()->id) }}" alt="QR Code" class="img-fluid qr-code-image" id="qrcode"> 
                <div class="scan-me">
                    <i class="fa fa-mobile"></i>
                    <span class="scan-me-text">SCAN ME</span>
                </div>
                <p class="qr-instruction">Present this QR code to the Gym Admin to check in/out</p>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
</div>

<style>
    .qr-code-container {
        background-color: #f8f9fa;
        padding: 20px;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        display: inline-block;
        text-align: center;
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
        border-radius: 0.25rem;
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
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>
@endsection