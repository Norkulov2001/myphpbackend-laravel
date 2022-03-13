@extends('layout.layout')
@section('content')
    <h1>Show books Informations</h1>
    <a class="btn btn-success" href="{{route('book.index')}}">Index</a>
    <table class="table table-light">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Author</th>
                <th>Years</th>
                <th>Price</th>
                <th>Create At</th>
                <th>Update At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->author ? $item->author->name : ''}}</td>
                <td>{{$item->years}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td><a class="btn btn-primary" href="{{route('book.edit', ['book' => $item->id])}}"><span style="font-size: 20px">&#9998</span></a></td>
                </tr>
        </tbody>
    </table>

@endsection
