@extends('layouts.app')

@section('content')
    <header class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center ">
                <h1 class="display-3 img-animated-section2 title-sc"><b>{{ $data['title'] }}</b></h1>
            </div>
        </div>
    </header>

    <section class="section-2 section-article container">
        <div class="card-deck" style="margin-bottom: 20px;">
            @if(count($activities))
            @foreach($activities as $index=>$activity)
                <div class="col-md-4">
                    <div class="card img-animated-section2">
                    <img class="card-img-top" 
                    src="{{ url('images/activities').'/'.$activity->image }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted">Posted :{{ $activity->updated_at->format('d F Y') }}</small></p>
                        <h4 class="card-title">{{ $activity->title }}</h4>
                        <div class="card-text fr-view">{{ substr(strip_tags($activity->content),0,80).'...' }}
                            <a href="{{ route('activity.detail', $id[$index]) }}">[ Read more ]</a>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
            @else
                <div class="col-md-4">
                    <div class="card img-animated-section2">
                    <img class="card-img-top" 
                    src="{{ url('img/No_image.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted">Posted : No Activity Found</small></p>
                        <h4 class="card-title">No Activity Found</h4>
                        <div class="card-text fr-view">
                            No Activity Found
                        </div>
                    </div>
                </div>
                </div>
            @endif
        </div>
        <div class="d-flex">
            {{ $activities->links() }}
        </div>
    </section>
    

    @include('login')
@endsection

    