@extends('main.main')

@section('main')
    

<div class="container ">
    
    <div class="list-body">
        <div class="head">
            <h2><span style="color: #0d6efd; font-size: 32px;">All</span> Novel</h2>
        </div>

        <div class="list-card-body d-flex row row-cols-3">
        
            @foreach ($all_novel as $nov)
                <div>
                    <div class="card-list mx-2 my-2 ">
                        <a href="{{ url('/detail/'.$nov->slug) }}" class="d-flex">
                            <div class="img-list me-2">
                                <img src="{{ asset('assets/uploads/novel/'.$nov->image) }}" alt="">
                            </div>
                            <div class="info-list ms-2">
                                <div class="text-truncate" style="max-width: 220px;">
                                    <span class="list-title">{{ $nov->name }}</span>
                                </div>
                                <div class="">
                                <span class="info-desc">{!! $nov->description !!}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    
</div>


@endsection



{{-- <a href="{{ url('/detail/'.$novel->slug) }}">{{ $novel->name }}</a> --}}