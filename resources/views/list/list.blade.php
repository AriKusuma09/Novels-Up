@extends('main.main')

@section('main')
    

<div class="container shadow-list container-dark-mode">
    <div class="head py-5">
        <h1>All List Novel</h1>
    </div>

    <div class="list-body pb-5">
        @foreach ($all_novel as $novel)

        <div class="list-card mt-5 mb-3">
            <div class="img-list">
                <img src="{{ asset('assets/uploads/novel/'.$novel->image) }}" style="width: 380px" height="430px" alt="">
            </div>
            <div class="title-list">
                <span class="list-link"><a href="{{ url('/detail/'.$novel->slug) }}">{{ $novel->name }}</a></span>
            </div>
        </div>

        @endforeach
    </div>
</div>


@endsection