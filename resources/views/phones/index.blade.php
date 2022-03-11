@extends('layout.layout')
@section('content')

    <h1>Phones informations</h1>

    <a href="{{route('phones.create')}}" style="width: 10%" class="btn btn-success">➕</a>
    <form class="form-group" action="{{route('phones.index')}}">
        <input class="form-control" type="search" name="search" id="" placeholder="🔎 Search">
        <input class="btn btn-primary" style="width: 10%" type="submit" value="🔎 Search">
    </form>
    <table class="table table-light">
        
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Years</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>

        @foreach ($phone as $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->years}}</td>
                    <td>{{$value->price}}</td>
                    <td>{{$value->category ? $value->category->name : ''}}</td>
                    <td><img src="{{asset('/storage/images/'.$value->image)}}" width="100" alt="Bu yerda rasm bor"></td>
                    <td>{{$value->created_at}}</td>
                    <td>
                    <div class="btn-group" role="group">

                        <a href="{{route('phones.show', ['phone' => $value->id])}}" class="btn btn-primary">Show</a><br>
                        <a href="{{route('phones.edit', ['phone' => $value->id])}}" class="btn btn-warning">Update</a>

                        <form action="{{route('phones.destroy', ['phone' => $value->id])}}" method="POST">
                                   @csrf
                                   @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Delete">


                        </form>
                    </div>
                    </td>
                </tr>

        @endforeach

    </table>
@endsection



