@extends('layouts.app')

@section('content')
     <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center">
                <h1 class="display-3 img-animated-section2 title-sc"><b>OUR PRODUCTS</b></h1>
            </div>
        </div>
    </header>

    <section class="section-2 section-article container">
        <div class="card-deck" style="margin-bottom: 30px;">
            <div class="col-md-4">
                <div class="card img-animated-section2" >
                    <a href="{{ url('images/catalogs').'/'.$catalog->image }}" data-fancybox="gallery"
                    data-caption="{{$catalog->name}} - Rp.{{$catalog->price}}">
                        <img src="{{ url('images/catalogs').'/'.$catalog->image }}"
                            alt="Card image cap" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <div class="row">
                            @if($catalog->available < 1)
                                <div class="col-md-12">
                                    <small><button class="btn btn-danger btn-block">SOLD OUT</button></small>
                                </div>
                            @else
                                <div class="col-md-12" style="text-align:left">
                                    <small><button class="btn btn-danger btn-block">Rp. {{$catalog->price}}</button></small>
                                    {{--  <h6 style="color: #8e1d1d;"><b>Price: Rp. {{$catalog->price}}</b></h6>  --}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h3 style="color: #bc1818;">{{$catalog->name}}</h3>
                <br>
                @if($catalog->available > 0)
                    Stock: {{$catalog->available}}
                @endif
                
                {{--  <small>Rp. {{$catalog->price}}</small>  --}}
                <br>
                <p>{!! $catalog->description !!}</p>
            </div>
        </div>
        <div class="d-flex">
        </div>
    </section>
    @include('login')
@endsection