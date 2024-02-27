@extends('layouts.app')

@section('content')

@include('layouts.nav')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                    <!-- slide -->
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="2000">
                            <img src="{{asset('public/uploads/truyen/tuf163.jpg')}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="{{asset('public/uploads/truyen/yaeeeee.jpg')}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div><br>

                <!-- card -->
                <!-- 1 -->
                <div class="row">
                    @foreach($truyen as $key => $value)
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$value->tentruyen}}</h5>
                                <p class="card-text">{{$value->tomtat}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$value->tacgia}}</li>
                                <li class="list-group-item">{{$value->danhmuctruyen->tendanhmuc}}</li>
                                <li class="list-group-item">{{$value->slug_truyen}}</li>
                            </ul>
                            <div class="card-body">
                                <a href="truyen/{{ $value->slug_truyen }}" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    @endforeach
                </div><br>
                <!-- pagination -->
                <nav aria-label="Page navigation example" style="text-align: center;">
                    <ul class="pagination" style="display: flex; justify-content: center;">
                        <li class="page-item"><a class="page-link" href="{{url('/page1')}}">1</a></li>
                        <li class="page-item"><a class="page-link" href="{{url('/page2')}}">2</a></li>
                        <li class="page-item"><a class="page-link" href="{{url('/page3')}}">3</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
