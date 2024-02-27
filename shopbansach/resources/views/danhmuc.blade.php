@extends('layouts.app')

@section('content')

@include('layouts.nav')

                <div class="row">
                    @foreach($truyen as $key => $value)
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$value->tentruyen}}</h5>
                            <p class="card-text">{{$value->tomtat}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$value->slug_truyen}}</li>
                            <li class="list-group-item">{{$value->danhmuctruyen->tendanhmuc}}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{url('/truyen1')}}" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                    @endforeach
                </div><br>