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
            @if(count($catalogs))
            @foreach($catalogs as $catalog)
            <div class="col-md-4">
                <div class="card img-animated-section2" style="margin-bottom: 30px;">
                    <a href="{{ url('images/catalogs').'/'.$catalog->image }}" data-fancybox="gallery"
                    data-caption="{{$catalog->name}} - Rp.{{$catalog->price}}">
                        <img src="{{ url('images/catalogs').'/'.$catalog->image }}"
                            alt="Card image cap" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <a href="{{ route('catalogs.detail', $catalog->id) }}"><h4 class="card-title">{{$catalog->name}}</h4></a>
                            </div>
                            @if($catalog->available > 0)
                                <div class="col-md-5" style="text-align:right">
                                    <h6 style="color: red;">Rp. {{$catalog->price}}</h6>
                                </div>
                            @else
                                <div class="col-md-5" style="text-align:right">
                                    <h6 style="color: red;"><b>SOLD OUT</b></h6>
                                    {{--  <button disabled="disabled">SOLD OUT</button>  --}}
                                </div>
                            @endif
                        </div>
                        {{--  <div class="card-text fr-view">{!! $catalog->description !!}</div>  --}}
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-md-4">
                <div class="card img-animated-section2">
                    <a href="{{ url('img/No_image.png') }}" data-fancybox="gallery"
                    data-caption="No Catalog Found">
                        <img src="{{ url('img/No_image.png') }}"
                            alt="Card image cap" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <h4 class="card-title">No Catalog Found</h4>
                            </div>
                            <div class="col-md-5" style="text-align:right">
                                <h6 style="color: red;">No Catalog Found</h6>
                            </div>
                        </div>
                        <div class="card-text fr-view">No Catalog Found</div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="d-flex">
            {{ $catalogs->links() }}
        </div>
    </section>
    @include('login')
@endsection