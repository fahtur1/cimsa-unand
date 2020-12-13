@extends('layouts.app')

@section('content')
<header class="header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center" style="margin-top: 20px;">
            <h1 class="display-3 img-animated-section2"><b>{{ $title }}</b></h1>
            <br>
            <p class="lead">Research Exchange</p>
        </div>
    </div>
</header>

<section class="section-2 section-about container">
    <div class="image-about img-animated-section2" style="text-align: center;">
        <img src="{{ asset('img/sco/score.png') }}" alt="CIMSA LOGO" style="width: 100%; height: auto;" class="img-responsive">
    </div>
    <br>
    <div class="content-about img-animated-section2">
        <h4 class="lead" style="color:#d00a2c;">
            <span>
                SCORE ( Standing Commitee on Research Exchange )
            </span>
        </h4>
        <hr>
        <p class="text-justify">
            <div class="row">
                <div class="col-md-7 text-justify">
                    <span>HISTORY</span><br>SCORE involves than 82 active National Member Organizations, offering over 2800 research
                    projects to provide more than 1800 medical students worldwide the opportunity to participate in IFMSA research exchange
                    program and learn the basic principles of medical research such as literature studies, collecting data, scientific writing,
                    lab work, statistics, and ethical aspects related to the medicine.
                </div>
                <div class="col-md-5">
                    <img class="img-fluid" style="object-fit: contain;" src="/img/sco/bg/score.png" alt="">
                </div>
            </div>
            <span>GOALS</span><br>1. To provide research projects in medical curriculum in order enabling medical students worldwide to take
            responsibility for their own curriculum according to their personal interests and to introduce them to basic principles of medical
            research. <br>2. To increase the mobility and widen the horizon of medical students worldwide providing them with the possibility to
            experience different approaches in medical research, education, and treatement by partaking in research projects in other countries. <br>
            3. To enhance the academic quality of the medical student curriculum and achieve educational benefits of practical and theoretical knowledge
            in the field of medical research either on basic science of clinical science with/without lab work. <br> 4. To facilitate collaboration
            and partnership between different medical universities/schools, research institutions and allied medical students across the globe in order to
            share and spread new achivements in the field of medical research. <br>5. To maintain affordable research exchange tuition through its governing
            body to insure the medical students within the different IFMSA NMOs accross the world can participate in this IFMSA program without incurring a financial
            burden.<br><br>
            <span>MISSION</span><br>"To offer future physicians an opportunity to experience research work and the diversity of countries all over the world
            . Also, to develop both culturally sensitive students and skilled researchers intent on shaping the world of science in the upcoming future."<br><br>
        </p>
    </div>
</section>
@include('login')
@endsection
