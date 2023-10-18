@extends('layout.main')
@section('content')
    @if(isset($_SESSION['errors']) && isset($_GET['msg']))
        <ul>
            @foreach($_SESSION['errors'] as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if(isset($_SESSION['success']) && isset($_GET['msg']))
        <span style="color: green">{{ $_SESSION['success'] }}</span>
    @endif
    <form action="{{ route('post-customer') }}" method="POST">
        Tên sản phẩm <input type="text" name="name"/>
        Giá <input type="text" name="age">
        <input type="submit" name="add" value="Thêm">
    </form>
@endsection