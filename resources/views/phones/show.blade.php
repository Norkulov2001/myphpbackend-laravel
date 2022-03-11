@extends('layout.layout')
@section('content')

    <h1>Show Phones informations</h1>
    <a href="{{route('phones.index')}}" class="btn btn-success">Index</a>
    <table class="table table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Years</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Created at</th>
            </tr>
            <tr>
                <td>{{$phone->id}}</td>
                <td>{{$phone->name}}</td>
                <td>{{$phone->years}}</td>
                <td>{{$phone->price}}</td>
                <td>{{$phone->category->name}}</td>
                <td><img src="{{asset('/storage/images/'.$phone->image)}}" width="100" alt="Bu yerda rasm bor"></td>
                <td>{{$phone->created_at}}</td>

            </tr>
    </table>
@endsection
