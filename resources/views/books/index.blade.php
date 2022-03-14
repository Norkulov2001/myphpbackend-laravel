@extends('layout.layout')
@section('content')
        <h1>Books all information</h1>
       <div style="margin-left: 1015px">
            <a style="width: 100px" class="btn btn-primary" href="{{route('book.create')}}">
                <span style='width: 5px'>&#10010;</span>
            </a>
       </div>
    <form action="{{route('book.index')}}" method="GET">
        <input class="form-control" type="search" name="search" placeholder="🔎 Search">
        <input style="width: 15%" class="btn btn-success" type="submit" value="🔎Search">
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
                    <td><a style="color: black" href="{{route('book.show', ['book' => $item->id])}}">{{$item->name}}</a></td>
                    <td><a style="color: black" href="{{route('book.show', ['book' => $item->id])}}"><img src="{{asset('/storage/books/'.$item->image)}}" width="100" height="120" alt="Bu yerda rasm bor"></a></td>
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

