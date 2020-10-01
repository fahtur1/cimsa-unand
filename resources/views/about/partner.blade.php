@extends('layouts.app')

@section('content')
<header class="header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-3 img-animated-section2 title-sc"><b>OUR PARTNERS</b></h1>
        </div>
    </div>
</header>

<section class="section-2 container">
    <div class="row">
        <div class="col-md-4">
            <a href="#">
                <img src="{{ asset('img/official-partners/bcc-logo.png') }}" alt="BCC LOGO" style="width: 100%; height: auto;">
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ url('https://instagram.com/jooksjuicebar/') }}" target="_blank">
                <img src=" {{ asset('img/official-partners/jooks.png') }}" alt="JOOKS LOGO" style="width: 100%; height: auto;">
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ url('http://malala-tours.com/') }}" target="_blank">
                <img src=" {{ asset('img/official-partners/malala.png') }}" alt="MALALA LOGO" style="width: 100%; height: auto;">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ url('https://instagram.com/_thekafe/') }}" target="_blank">
                <img src=" {{ asset('img/official-partners/thekafe.png') }}" alt="THE KAFE LOGO" style="width: 100%; height: auto;">
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ url('http://starradiopadang.com/') }}" target="_blank">
                <img src=" {{ asset('img/official-partners/star-radio.png') }}" alt="STAR RADIO" style="width: 100%; height: auto;">
            </a>
        </div>
    </div>
</section>
@include('login')
@endsection
