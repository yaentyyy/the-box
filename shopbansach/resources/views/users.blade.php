@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">id</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $key => $user)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$user -> id}}</td>
                                <td>{{$user -> name}}</td>
                                <td>{{$user -> email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
