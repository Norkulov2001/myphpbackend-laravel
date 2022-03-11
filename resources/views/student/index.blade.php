@extends('layout.layout')
@section('content')

    <h1>Students informations</h1>
    <a href="{{route('student.create')}}" class="btn btn-success">Create</a>

    <form class="form-group" action="{{route('student.index')}}" method="GET">
        <input class="form-control" type="search" name="search" id="" placeholder="search">
        <input class="btn btn-primary" type="submit" value="search">
    </form>
    <table class="table table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Group</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>

        @foreach ($student as $value)

                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</a></td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->group}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>
                        <div class="btn-group" role="group">
                        <a href="{{route('student.show', ['id' => $value->id])}}" class="btn btn-success ">Show</a>
                        <a href="{{route('student.edit', ['id' => $value->id])}}" class="btn btn-warning">Update</a>
                        <form action="{{route('student.destroy', ['id' => $value->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger " value="Delete">
                        </form>
                        </div>

                    </td>
                </tr>

        @endforeach

    </table>

@endsection
