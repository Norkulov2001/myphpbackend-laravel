@extends('layout.layout')
@section('content')
        <h1>Books all information</h1>
       <div style="margin-right: 0%">
          <a style="width: 10%" class="btn btn-primary" href="{{route('book.create')}}"><span style='width: 10px'>&#10010;</span></a>
       </div>
    <form action="{{route('book.index')}}" method="GET">
        <input class="form-control" type="search" name="search" placeholder="🔎 Search">
        <input  class="btn btn-success" type="submit" value="🔎">
    </form><br>
    <table class="table table-light">
        <thead>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Delete</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($book as $item)

                <tr>
                    <td>{{$item->id}}</td>
                    <td><a href="{{route('book.show', ['book' => $item->id])}}">{{$item->name}}</a></td>
                    <td><img src="{{asset('/storage/books/'.$item->image)}}" width="100" alt="Bu yerda rasm bor"></td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <form action="{{route('book.destroy', ['book' => $item->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">

                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>
@endsection

