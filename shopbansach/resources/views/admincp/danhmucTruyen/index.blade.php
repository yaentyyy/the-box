@extends('layouts.app')

@section('content')

@include('layouts.nav')

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt Kê Danh Mục</div>

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
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Slug danh mục</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhmucTruyen as $key => $danhmuc)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$danhmuc -> tendanhmuc}}</td>
                                <td>{{$danhmuc -> slug_danhmuc}}</td>
                                <td>{{$danhmuc -> mota}}</td>
                                <td>
                                    @if($danhmuc -> kichhoat==0)
                                    <span class="text text-success">Kích hoạt</span>
                                    @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td style="display: flex; justify-content: space-between;">
                                    <a href="{{route('danhmuc.edit', ['danhmuc' => $danhmuc -> id])}}" class="btn btn-primary" 
                                        style="flex: 1; margin-right: 10px; ">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    <form action="{{route('danhmuc.destroy', ['danhmuc' => $danhmuc -> id])}}" method="POST" style="flex: 1;">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có muốn xóa danh mục này không?')" class="btn btn-danger" style="width: 100%; ">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
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
