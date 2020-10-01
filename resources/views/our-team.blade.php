@extends('layouts.app')

@section('content')
<header class="header">
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-3 img-animated-section2 title-sc"><b>OUR TEAM</b></h1>
        </div>
    </div>
</header>

<section class="section-2 section-about container">
    <div class="row">

        <div class="col-md-4">
            <div class="team-container">
                <a href="{{ asset('img/our-team/exec.jpeg') }}" data-fancybox="gallery" data-caption="Executive Board">
                    <img src="{{ asset('img/our-team/exec.jpeg') }}" alt="Executive Board" class="rounded mx-auto d-block img-thumbnail image-ot">
                    <div class="overlay">
                        <div class="text-ot">Executive Board</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="team-container">
                <a href="{{ asset('img/our-team/ot.jpeg') }}" data-fancybox="gallery" data-caption="Official Team">
                    <img src="{{ asset('img/our-team/ot.jpeg') }}" alt="Official Team" class="rounded mx-auto d-block img-thumbnail image-ot">
                    <div class="overlay">
                        <div class="text-ot">Official Team</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="team-container">
                <a href="{{ asset('img/our-team/sc.jpeg') }}" data-fancybox="gallery" data-caption="Supervising Council">
                    <img src="{{ asset('img/our-team/sc.jpeg') }}" alt="Supervising Council" class="rounded mx-auto d-block img-thumbnail image-ot">
                    <div class="overlay">
                        <div class="text-ot">Supervising Council</div>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-md-4">
            <div class="team-container">
                <a href="{{ asset('img/our-team/rnd.jpeg') }}" data-fancybox="gallery" data-caption="RnD Team">
                    <img src="{{ asset('img/our-team/rnd.jpeg') }}" alt="RnD Team" class="rounded mx-auto d-block img-thumbnail image-ot">
                    <div class="overlay">
                        <div class="text-ot">RnD Team</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="team-container">
                <a href="{{ asset('img/our-team/oc.jpeg') }}" data-fancybox="gallery" data-caption="Officer Committees">
                    <img src="{{ asset('img/our-team/oc.jpeg') }}" alt="Officer Committees" class="rounded mx-auto d-block img-thumbnail image-ot">
                    <div class="overlay">
                        <div class="text-ot">Officer Committees</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="team-container">
                <a href="{{ asset('img/our-team/project.jpeg') }}" data-fancybox="gallery" data-caption="Project Team">
                    <img src="{{ asset('img/our-team/project.jpeg') }}" alt="Project Team" class="rounded mx-auto d-block img-thumbnail image-ot">
                    <div class="overlay">
                        <div class="text-ot">Project Team</div>
                    </div>
                </a>
            </div>
        </div>



    </div>
    <div class="row">

        <div class="col-md-4">
            <div class="team-container">
                <a href="{{ asset('img/our-team/mc.jpeg') }}" data-fancybox="gallery" data-caption="MC Team">
                    <img src="{{ asset('img/our-team/mc.jpeg') }}" alt="MC Team" class="rounded mx-auto d-block img-thumbnail image-ot">
                    <div class="overlay">
                        <div class="text-ot">MC Team</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="team-container">
                <a href="{{ asset('img/our-team/hrod.jpeg') }}" data-fancybox="gallery" data-caption="HROD Team">
                    <img src="{{ asset('img/our-team/hrod.jpeg') }}" alt="HROD Team" class="rounded mx-auto d-block img-thumbnail image-ot">
                    <div class="overlay">
                        <div class="text-ot">HROD Team</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="team-container">
                <a href="{{ asset('img/our-team/fnm.jpeg') }}" data-fancybox="gallery" data-caption="FnM Team">
                    <img src="{{ asset('img/our-team/fnm.jpeg') }}" alt="FnM Team" class="rounded mx-auto d-block img-thumbnail image-ot">
                    <div class="overlay">
                        <div class="text-ot">FnM Team</div>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col-md-4">
            <div class="team-container">
                <a href="{{ asset('img/our-team/comdev.jpeg') }}" data-fancybox="gallery" data-caption="Comdev Team">
                    <img src="{{ asset('img/our-team/comdev.jpeg') }}" alt="Comdev Team" class="rounded mx-auto d-block img-thumbnail image-ot">
                    <div class="overlay">
                        <div class="text-ot">Comdev Team</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="team-container">
                <a href="{{ asset('img/our-team/alumni.jpeg') }}" data-fancybox="gallery" data-caption="Alumni Team">
                    <img src="{{ asset('img/our-team/alumni.jpeg') }}" alt="Alumni Team" class="rounded mx-auto d-block img-thumbnail image-ot">
                    <div class="overlay">
                        <div class="text-ot">Alumni Team</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="team-container">
                <a href="{{ asset('img/our-team/admin.jpeg') }}" data-fancybox="gallery" data-caption="Admin Team">
                    <img src="{{ asset('img/our-team/admin.jpeg') }}" alt="Admin Team" class="rounded mx-auto d-block img-thumbnail image-ot">
                    <div class="overlay">
                        <div class="text-ot">Admin Team</div>
                    </div>
                </a>
            </div>
        </div>



    </div>
</section>

@include('login')

@endsection