@extends('main.main')

@section('main')
    

<div class="container body">
    <div class="read-body">

        <div class="read-top">
            <div class="title-read">
                <h2>{{ $chapter->name }}</h1>
            </div>
        
            <div class="img-read">
                <img src="{{ asset('assets/uploads/chapter/'.$chapter->image) }}" alt="Cover">
            </div>
        
            <div class="link-read">
                <a href=""><i class="bi bi-skip-backward me-1"></i> Sebelumnya</a> | <a href="{{ url('/detail/'.$novel->slug) }}"><i class="bi bi-list-ul"></i> Daftar Isi</a>  | <a href="">Selanjutnya <i class="bi bi-skip-forward ms-1"></i></a>
            </div>
        </div>

        <div class="read-mid">
            <div class="text">
                {!! $chapter->text !!}
            </div>
        </div>

        <div class="read-bottom">
            <div class="link-read">
                <a href=""><i class="bi bi-skip-backward me-1"></i> Sebelumnya</a> | <a href="{{ url('/detail/'.$novel->slug) }}"><i class="bi bi-list-ul"></i> Daftar Isi</a>  | <a href="">Selanjutnya <i class="bi bi-skip-forward ms-1"></i></a>
            </div>
        </div>
    </div>
</div>


@endsection