@extends('layout.main')
@section('content')
    <style>

        table td{
            width: 100px;
        }
        table button{
            color: white;
            background-color: blue;
            border-radius: 10%;
            width: 70px;
        }
        table button:hover{
            color: black;
            background-color: white;
        }
        table button:active{
            color: brown;
        }
    </style>
    <h1>{{ $header }}</h1>
    <table>
        <tr><a href="{{route('add-customer')}}" class="btn btn-primary">Thêm Sản Phẩm</a></tr>
        <tr>
            <td><h4>ID</h4></td>
            <td><h4>Tên</h4></td>
            <td><h4>Tuổi</h4> </td>
        </tr>
        @foreach($customers as $cr)
        <tr>
            <td>{{ $cr->id }}</td>
            <td>{{ $cr->name }}</td>
            <td>{{ $cr->age }} </td>
            <td> <a href="{{route('detail-customer/'.$value->id) }}" class="btn btn-primary">Sửa</a> </td>
            <td>Xóa</td>
        </tr>
        @endforeach
    </table>
@endsection
{{--<a href="{{route('detail-product/'.$value->id) }}" class="btn btn-primary">Update Sản Phẩm</a>--}}
{{--<a href="{{route('delete-customer/'.$value->id)}}" class="btn btn-danger">Xóa Sản Phẩm</a>--}}