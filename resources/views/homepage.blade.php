@extends('layouts.app')

@section('content')
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item img-responsive active" style="background-image: url('/img/home/home1.jpg')">
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item img-responsive" style="background-image: url('/img/home/home2.jpg')">
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item img-responsive" style="background-image: url('/img/home/home3.jpg')">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!-- Page Content 2-->
<section class="section-2">
    <div class="container">
        <div class="content-about img-animated-section2">
            <div class="row">
                <div class="col-md-7 text-justify">
                    <h1 class="shadow"><b>WHO ARE WE ?</b></h1><br>
                    Center for Indonesian Medical Students' Activities (CIMSA) is a non-profit and non government organization that is independent, nationalist, non-political and non partisan with activity based programs. Through its vision, "Empowering Medical Students, Improving Nation's Health", CIMSA provides chances and experiences for medical students to express their opinions and idealisms through their activities that will bring out evident results for Indonesia, especially in the medical field.<br><br>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('img/home/whoarewe.JPG') }}" alt="" class="img-fluid">
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('img/home/history.JPG') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-7 ml-auto text-justify">
                    <h1><b>HISTORY</b></h1><br>
                    <span>CIMSA was officially established in May 6, 2001 by some medical students from various city of Indonesia based on the inclination for an organization that based on ongoing activities; utilize the developing technology, with internationally standard programs to support medical students in Indonesia CIMSA held its first General Assembly at May 11-13, 2001 and become affiliation with International Federation of Medical Students’ Associations (IFMSA) in 2002. Now, CIMSA has 27 locals spread in various Faculty of Medicine throughout Indonesia and continues to grow.</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Page Content 3-->
<section class="section-3">
    <div class="container text-center">
        <img src="{{ asset('img/logo/logo-section3.png') }}" alt="logo-section3">
        <br>
        <br>
        <div class="row">
            <div class="col-md-4 text-center img-animated-section3">
                <i class="fa fa-map-marker fa-5x" aria-hidden="true"></i>
                <br>
                <br>
                <h4>
                    <b>
                        <span class="counter" data-count="27">0</span>
                        <p> LOCALS</p>
                    </b>
                </h4>
            </div>
            <div class="col-md-4 text-center img-animated-section3">
                <i class="fa fa-check-square fa-5x" aria-hidden="true"></i>
                <br>
                <br>
                <h4>
                    <b>
                        <span class="counter" data-count="1000">500</span><span>+</span>
                        <p>PROJECTS</p>
                    </b>
                </h4>
            </div>
            <div class="col-md-4 text-center img-animated-section3">
                <i class="fa fa-group fa-5x" aria-hidden="true"></i>
                <br>
                <br>
                <h4>
                    <b>
                        <span class="counter" data-count="10000">8500</span><span>+</span>
                        <p>MEMBERS</p>
                    </b>
                </h4>
            </div>
        </div>
    </div>
</section>

<!-- Page Content 4 -->
<section class="section-4">
    <div class="container">

        <h3 class="img-animated-section4"><b>Recent Updates</b></h3>
        <br>
        <br>
        <div class="row">
            <div class="card-deck">
                <div class="col-md-4 col-xs-12">
                    <div class="card img-animated-section4" style="width: 20rem;">
                        <img class="card-img-top" src="{{ $articles->image }}" alt="Card image cap" style="height: 256px;">
                        <span class="img-preview fade-caption">
                            {{ substr(strip_tags($articles->content),0,80).'...' }}
                            <a href="{{ route('articles.detail', $articlesid) }}">read more</a></p>
                        </span>
                        <div class="card-body">
                            <h4 class="card-text">{{ $articles->title }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="card img-animated-section4" style="width: 20rem;">
                        <img class="card-img-top" src="{{ $activities->image }}" alt="Card image cap" style="height: 256px">
                        <span class="img-preview fade-caption">
                            {{ substr(strip_tags($activities->content),0,80).'...' }}
                            <a href="{{ route('activity.detail', $activitiesid) }}">read more</a></p>
                        </span>
                        <div class="card-body">
                            <h4 class="card-text">{{ $activities->title }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="card img-animated-section4" style="width: 20rem;">
                        <img class="card-img-top" src="{{ $catalogs->image }}" alt="Card image cap" style="height: 256px;">
                        <span class="img-preview fade-caption fr-view">
                            {{substr(strip_tags($catalogs->description),0,80).'...'}}
                            <a href="{{url('/catalogs')}}">read more</a></p>
                        </span>
                        <div class="card-body">
                            <h4 class="card-text">{{ $catalogs->name }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <h3 class="img-animated-section4"><b>Videos</b></h3>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card img-animated-section4" style="width: 20rem;">
                    <div class="embed-responsive embed-responsive-16by9 card-img-top">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/UOZd6QQ0hq4" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <h4 class="card-text">CIMSA UNAND Profile - Video</h4>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>

<section class="section-5">
    <div class="container">
        {{-- <div class="row justify-content-center"> --}}
        <div class="row">
            <div class="col-md-4">
                <h4 class="img-animated-section5 text-center">
                    <i class="fa fa-twitter" aria-hidden="true"></i> <b>TWITTER</b>
                </h4>
                <br>
                <div class="img-animated-section5">
                    <a class="twitter-timeline img-animated-section5" href="https://twitter.com/cimsaunand" data-width="400" data-height="440">Tweets by cimsaunand</a>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="img-animated-section5 text-center">
                    <i class="fa fa-facebook-official" aria-hidden="true"></i> <b>FACEBOOK</b>
                </h4>
                <br>
                <div class="img-animated-section5">
                    <div class="fb-post" data-href="https://www.facebook.com/cimsa.unand/posts/3484053138315715" data-show-text="true" data-width="400" data-height="400">
                        <blockquote cite="https://www.facebook.com/cimsa.unand/posts/3484053138315715" class="fb-xfbml-parse-ignore">
                            <p>[CIMSVOICE EPS. 6]⁣⁣
                                ⁣⁣
                                Halo, CIMSA!⁣⁣
                                ⁣⁣
                                CIMSA-BEM KM FK Unand baru saja merilis episode baru dari CIMSVOICE bersama...</p>Dikirim oleh <a href="https://www.facebook.com/cimsa.unand">Cimsa Unand</a> pada&nbsp;<a href="https://www.facebook.com/cimsa.unand/posts/3484053138315715">Sabtu, 05 Desember 2020</a>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="img-animated-section5 text-center">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i> <b>YOUTUBE</b>
                </h4>
                <br>
                <div class="img-animated-section5">
                    <iframe width="400" height="435" src="https://www.youtube.com/embed/Q-sQmRcjicU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            {{-- <div class="col-md-4">
                    <h4 class="img-animated-section5"><i class="fa fa-instagram" aria-hidden="true"></i> <b>INSTAGRAM</b></h4>
                    <br>
                    <br>
                    <!-- LightWidget WIDGET -->
                    <!-- <iframe src="http://lightwidget.com/widgets/214bb146aced5626966160484f1fab84.html" 
                    scrolling="no" allowtransparency="true"
                    class="lightwidget-widget img-animated-section5" style="width: 100%; border: 0; overflow: hidden;"></iframe> -->
                    <iframe src="http://lightwidget.com/widgets/7f5b130c742857a1940b0d2c74e56e7c.html" 
                    scrolling="no" allowtransparency="true" class="lightwidget-widget img-animated-section5" 
                    style="width: 100%; border: 0; overflow: hidden;"></iframe>
                </div> --}}
        </div>
    </div>
</section>

@include('login')

@endsection
