@extends('layouts.app')

@section('content')

<header class="header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center" style="margin-top: 20px;">
            <h1 class="display-3 img-animated-section2"><b>{{ $title }}</b></h1>
            <br>
            <p class="lead">Sexual & Reproductive Health including HIV/AIDS</p>
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
                SCORA ( Standing Commitee on Sexual & Reproductive Health and Rights Including HIV & AIDS )
            </span>
        </h4>
        <hr>
        <p class="text-justify">
            <span>HISTORY</span><br>SCORA (Standing Committee on Sexual & Reproductive Health and Rights including HIV & AIDS) exists because so many people are living with HIV and AIDS yet very few know the facts about the aforementioned disease. SCORA is engaged in the field of sexual and reproductive health, HIV/AIDS, maternal health and many other reproductive issues including gender-based violence, sexuality, and gender identity, as well as sex education for teenager.<br><br>
            SCORA (Standing Committee on Sexual & Reproductive Health and Rights including HIV & AIDS) exists because so many people are living with HIV and AIDS yet very few know the facts about the aforementioned disease. SCORA is engaged in the field of sexual and reproductive health, HIV/AIDS, maternal health and many other reproductive issues including gender-based violence, sexuality, and gender identity, as well as sex education for teenager.<br><br>
            <span>MOTTO</span><br>The only way of fighting AIDS is through prevention and the only way of prevention is through education.<br><br>
            <span>GOALS</span><br>1. To raise awareness and knowledge of the community on topics related to HIV/AIDS
            and sexual and reproductive health. <br>
            2. To facilitate Indonesian medical students to contribute more in the fields of sexual and reproductive health including AIDS <br>
            3. To develop programs in the fields of sexual and reproductive health including AIDS which tackles the nation's conditions. <br>
            4. To create oppurtinities for medical students to act for the betterment of the society's sexual and reproductive health.
            <br><br>
            <span>MISSION</span><br>"To provide necessary tools to advocate for sexual for sexual and reproductive health and rights
            within respective communities in a culturally fashion."
            <br><br>
            <span>VISION</span><br>"A world where every individual is empowered to exercise their sexual and reproductive health rights equally, free from stigma and discrimination."
            <br><br>
        </p>
    </div>
</section>

@include('login')
@endsection
