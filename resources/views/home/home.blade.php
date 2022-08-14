@extends('main.main')

@section('main')
    

<!--  Jumbotron  -->

    <div style="padding: 0.1px;" class="jumbotron jumbotron-fluid">
        <div class="container">
        <p class="display-4">Are you looking for some <span>Light Novel?</span> <br>Then you've come to the right place.</p>
        <a href="/list-novel" class="btn btn-primary">DAFTAR NOVEL</a>
        </div>
    </div>

<!--  End Jumbotron  -->


    <div class="container">
        <div class="head">
            <h1>Latest Update</h1>
        </div>
        
        <div class="card-body d-flex justify-content-center  row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4 mb-5">

            @foreach ($chapter as $chap)

            <div class="Card mt-5 justify-content-center">
                <div class="card-img text-center">
                    <img class="img-cov" src="{{ asset('assets/uploads/chapter/'.$chap->image) }}" alt="">
                </div>
                <div class="title-novel text-truncate">
                    <span><a href="{{ url('/detail/'.$chap->novel->slug) }}" class="link-list">{{ $chap->novel->name }}</a></span>
                </div>
                <div class="date-up">
                    <span>{{ $chap->created_at->format('d-m-Y') }}</span>
                </div>
                <div class="link-novel">
                    <a href="{{ url('/read/'.$chap->novel->slug.'/'.$chap->slug) }}">{{ $chap->name }}</a>
                </div>
            </div>
                
            @endforeach
            

        </div>
        <div class="d-flex justify-content-end">
            {{ $chapter->links() }}
        </div>

    </div>


@endsection