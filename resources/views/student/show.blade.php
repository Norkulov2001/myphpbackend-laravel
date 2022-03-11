@extends('layout.layout')
@section('content')

    <h1>Show Students informations</h1>
    <a href="{{route('student.index')}}" class="btn btn-success">Index</a>
    <table class="table table-primary">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Group</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->group}}</td>
                    <td>{{$student->created_at}}</td>
                    <td>{{$student->updated_at}}</td>
                </tr>
    </table>

@endsection
