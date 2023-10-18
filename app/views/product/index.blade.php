@extends('layout.main')
@section('content')
    <h1>{{ $header }}</h1>
    <table>
        <tr><a href='{{route('add-product')}}'>Thêm Sản Phẩm</a></tr>
        <tr>
            <td>ID</td>
            <td>Tên Sản phẩm</td>
            <td>Giá </td>
        </tr>
        @foreach($products as $pr)
        <tr>
            <td>{{ $pr->id }}</td>
            <td>{{ $pr->ten_sp }}</td>
            <td>{{ $pr->gia }} </td>
            <td><a href="{{route('detail-product/'.$value->id )}}"> Sủa </a></td>
            <td>Xóa</td>
        </tr>
        @endforeach
    </table>
@endsection