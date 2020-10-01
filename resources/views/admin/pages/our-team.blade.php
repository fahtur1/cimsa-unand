@extends('layouts.app')

@section('content')
    <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center ">
                {{--  <h1 class="display-3 img-animated-section2 title-sc"><b>{{ $data['title'] }}</b></h1>  --}}
            </div>
        </div>
    </header>

    <section class="section-2 section-article container">
        <div class="card-deck" style="margin-bottom: 20px;">
            
        </div>
        <div class="d-flex">
            {{--  {{ $activities->links() }}  --}}
        </div>
    </section>
    

    @include('login')
@endsection

    