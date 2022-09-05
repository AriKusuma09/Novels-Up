@extends('main.main')

@section('main')
    

<!--  Jumbotron  -->

    {{-- <div style="padding: 0.1px;" class="jumbotron jumbotron-fluid">
        <div class="container">
        <p class="display-4">Are you looking for some <span>Light Novel?</span> <br>Then you've come to the right place.</p>
        <a href="/list-novel" class="btn btn-primary">DAFTAR NOVEL</a>
        </div>
    </div> --}}

<!--  End Jumbotron  -->

    <div class="container random">
        <div class="">
            <div class="head">
                <h2><span style="color: #0d6efd;">Random</span> Novel</h2>
            </div>
            <div class="random-body my-3 d-flex justify-content-between">
                @foreach ($novel as $nov)
                    <div class="random-card mx-4">
                        <a href="{{ url('/detail/'.$nov->slug) }}">
                            <div class="img-random">
                                <img src="{{ asset('assets/uploads/novel/'.$nov->image) }}" alt="">
                            </div>
                            <div class="title-random mt-3 ">
                                <span>{{ $nov->name }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach    
            </div>
        </div>
    </div>

    

    <div class="container" style="margin-top: 100px">
        <div class="head">
            <h2><span style="color: #0d6efd;">Latest</span> Updated</h2>
        </div>
        
        <div class="card-body d-flex justify-content-center row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 mb-5">

            {{-- Foreach Latest Update Novel --}}
            @foreach ($chapter as $chap)

            <div class="Card mt-3 mb-3">
                <div class="card-img text-center">
                    <img class="img-cov" src="{{ asset('assets/uploads/chapter/'.$chap->image) }}" alt="">
                </div>
                <div class="title-novel text-truncate ps-2">
                    <span><a href="{{ url('/detail/'.$chap->novel->slug) }}" class="link-list">{{ $chap->novel->name }}</a></span>
                </div>
                <div class="date-up ps-2 d-flex ">
                    <div class="me-2">
                        <span>- {{ $chap->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="line">
                        |
                    </div>
                    <div class="ms-2">
                        <span class="text-primary">{{ $chap->novel->type }}</span>
                    </div>
                </div>
                <div class="link-novel ps-2">
                    <a href="{{ url('/read/'.$chap->novel->slug.'/'.$chap->slug) }}">{{ $chap->name }}</a>
                </div>
            </div>
                
            @endforeach

            
        </div>
        
        {{-- Pagination Links --}}
        {{-- <div class="d-flex justify-content-end">
            {{ $chapter->links() }}
        </div> --}}

    </div>


@endsection