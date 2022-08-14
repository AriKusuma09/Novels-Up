@extends('main.main')

@section('main')
    

<div class="bg">
    <img src="{{ asset('assets/uploads/novel/'.$novel->image) }}" class="bg-detail" alt="">
</div>

<div class="container-fluid body-detail">
    <div class="container">
        <div class="detail-body">
            <div class="detail-img">
                <img src="{{ asset('assets/uploads/novel/'.$novel->image) }}" class="cover-novel" alt="">
                <div class="type-status">
                    <span class="info-type">{{ $novel->type }}</span>
                    <span class="info-status">
                    @if ($novel->condition == '0')
                            Finished
                        @elseif ($novel->condition == '1')
                            On Going
                    @endif    
                    </span>
                </div>
                <div class="detail-info">
                    <div class="info mb-4">
                        <span class="info-top">Country</span><br><span class="info-bottom">{{ $novel->country }}</span>
                    </div>
                    <div class="info mb-4">
                        <span class="info-top">Published</span><br><span class="info-bottom">{{ $novel->published }}</span>
                    </div>
                    <div class="info mb-4">
                        <span class="info-top">Author</span><br><span class="info-bottom">{{ $novel->author }}</span>
                    </div>
                    <div class="info mb-4">
                        <span class="info-top">Total Chapter</span><br><span class="info-bottom">{{ $novel->total_chap }} Chapter</span>
                    </div>  
                </div>
            </div>
            <div class="detail-title">
                <h4 class="text-truncate" style="max-width: 740px; color: white !important;">{{ $novel->name }}</h4>
                <span class="">{{ $novel->alternative }}</span>
            </div>

            <div class="detail-desc">

                {{-- Genre --}}
                <div class="genre d-flex pt-4 mb-3">
                    <div class="genre-btn me-1 my-1">
                        <span class="genre-body">
                            Genre :
                            <span href="" class="genre-detail"> {{ $novel->genre }} </span>
                        </span>
                    </div>
                    
                </div>

                {{-- Description --}}
                <div class="desc-body pt-3">
                    <span class="">{!! $novel->description !!}</span>
                </div>

                {{-- Chapter List --}}
                <div class="chapter-body">
                    <div class="chapter-title">
                        <h3><span class="spanleft">Chapter</span><span class="spanright"> List</span></h3>
                    </div>
                    <div class="chapter">
                        <div class="scroll-object">

                            @foreach ($chapter as $chap)
                                <div class="chapter-list">
                                    <div class="float-start icon-list">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <div class="title-chapter-list">
                                        <a href="{{ url('/read/'.$novel->slug.'/'.$chap->slug) }}">{{ $chap->name }}<br> <span>{{ $chap->created_at->format('d-m-Y') }}</span></a>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>


@endsection