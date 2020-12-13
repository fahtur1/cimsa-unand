@extends('layouts.app')

@section('content')

<header class="header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center" style="margin-top: 20px;">
            <h1 class="display-3 img-animated-section2"><b>{{ $title }}</b></h1>
            <br>
            <p class="lead">Sexual & Reproductive Health and Rights Including HIV & AIDS</p>
        </div>
    </div>
</header>

<section class="section-2 section-about container">
    <div class="image-about img-animated-section2" style="text-align: center;">
        <img src="/img/sco/scora.png" alt="CIMSA LOGO" style="width: 100%; height: auto;" class="img-responsive">
    </div>
    <br>
    <div class="content-about img-animated-section2">
        <h4 class="lead" style="color:#d00a2c;">
            <span>
                SCORA ( Sexual & Reproductive Health and Rights Including HIV & AIDS )
            </span>
        </h4>
        <hr>
        <p class="text-justify">
            <div class="row">
                <div class="col-md-7 text-justify">
                    <span>HISTORY</span><br>SCORA (Sexual & Reproductive Health and Rights Including HIV & AIDS) exists because so many people are living with HIV and AIDS yet very few know the facts about the aforementioned disease. SCORA is engaged in the field of sexual and reproductive health, HIV/AIDS, maternal health and many other reproductive issues including gender-based violence, sexuality, and gender identity, as well as sex education for teenager.<br><br>
                    SCORA (Sexual & Reproductive Health and Rights Including HIV & AIDS) exists because so many people are living with HIV and AIDS yet very few know the facts about the aforementioned disease. SCORA is engaged in the field of sexual and reproductive health, HIV/AIDS, maternal health and many other reproductive issues including gender-based violence, sexuality, and gender identity, as well as sex education for teenager.
                </div>
                <div class="col-md-5">
                    <img class="img-fluid" style="object-fit: contain;" src="/img/sco/bg/scora.png" alt="">
                </div>
            </div>
            <br>
            <span>MOTTO</span><br>The only way of fighting AIDS is through prevention and the only way of prevention is through education.<br><br>
            <span>GOALS</span><br>1. To raise awareness and knowledge of the community on topics related to HIV/AIDS
            and sexual and reproductive health. <br>
            2. To facilitate Indonesian medical students to contribute more in the fields of sexual and reproductive health including AIDS <br>
            3. To develop programs in the fields of sexual and reproductive health including AIDS which tackles the nation's conditions. <br>
            4. To create oppurtinities for medical students to act for the betterment of the society's sexual and reproductive health.
            <br><br>
            <span>MISSION</span><br>"To provide our members with the tools necessary to advocate for sexual and reproductive health and rights within their respective communities in a culturally respected fashion. This has been accomplished through building the skills and the knowledge about, providing trainings on Comprehensive Sexuality Education other respective reproductive health issues, exchanging ideas and projects, as well as drafting policies and working with our external partners in order to create change in local, regional and international level."
            <br><br>
            <span>VISION</span><br>"A world where every individual is empowered to exercise their sexual and reproductive health rights equally, free from stigma and discrimination."
            <br><br>
        </p>
    </div>
</section>

@include('login')
@endsection
