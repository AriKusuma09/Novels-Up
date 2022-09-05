@extends('main.main')

@section('main')
    

<div class="bg">
    <img src="{{ asset('assets/uploads/novel/'.$novel->image) }}" class="bg-detail" alt="">
</div>

<div class="container-fluid body-detail">
    <div class="container">
        <div class="detail-body">
            <div class="detail-img">
                <img src="{{ asset('assets/uploads/novel/'.$novel->image) }}" class="cover-novel" alt="Cover {{ $novel->name }}" title="Cover {{ $novel->name }}">
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
                        <span class="info-top">Total Chapter / Volume</span><br><span class="info-bottom">{{ $novel->total_chap }}</span>
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

                            @if ($chapter->count() > 0)
                                @foreach ($chapter as $chap)
                                    <div class="chapter-list">
                                        <div class="float-start icon-list">
                                            <i class="bi bi-book"></i>
                                        </div>
                                        <div class="title-chapter-list">
                                            <a href="{{ url('/read/'.$novel->slug.'/'.$chap->slug) }}">{{ $chap->name }}<br> <span>{{ $chap->created_at->diffForHumans() }}</span></a>
                                        </div>
                                    </div>
                                @endforeach
                            @else 
                                <div class="text-center">
                                    <h2 class="fw-bold text-primary" style="margin-top: 70px">Chapter Not Uploaded Yet</h2>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>


                {{-- Comment --}}
                {{-- <div class="comment-body">
                    <div class="title-comment text-center">
                        <h3>Bagaimana Tanggapan Kalian ?</h3>
                        <span class="mt-1">Komen Dibawah</span>
                    </div>

                    <hr class="garis-comment my-5">

                    <div class="body-comment">
                        
                        
                        <div class="d-flex create-comment">
                            <div class="left">
                                <img class="img-comment" src="/assets/img/ilustrasi/ilus1.jpg" width="55" height="60" alt="">
                            </div>
                            <div class="right">
                                
                                <input id="text" type="hidden" name="text" class="@error('text') is-invalid @enderror">
                                <trix-editor input="text"></trix-editor>
                            </div>
                        </div>

                        
                        <div class="d-flex show-comment">
                            <div class="left">
                                <img class="img-comment" src="/assets/img/ilustrasi/ilus1.jpg" width="55" height="60" alt="">
                            </div>
                            <div class="right">
                                <span><small class="fw-bold me-1" style="font-size: 16px; color: #0a55be;">Erika </small> | <small class="ms-1 fw-bold"> 1 Days Ago</small> </span>
                                <div class="comment mt-1">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, iure?</p>
                                    <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, iure?Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, iure?Lorem ipsum dolor sit amet,</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex show-comment">
                            <div class="left">
                                <img class="img-comment" src="/assets/img/ilustrasi/ilus1.jpg" width="55" height="60" alt="">
                            </div>
                            <div class="right">
                                <span><small class="fw-bold me-1" style="font-size: 16px; color: #0a55be;">Erika </small> | <small class="ms-1 fw-bold"> 1 Days Ago</small> </span>
                                <div class="comment mt-1">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, iure?</p>
                                    <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, iure?Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, iure?Lorem ipsum dolor sit amet,</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div> --}}

            </div>

        </div>

        

    </div>
    
    

</div>


@endsection



