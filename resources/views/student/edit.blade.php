@extends('layout.layout')
@section('content')

        <h1>Update Students information </h1>

    <form class="form-group" action="{{route('student.update', ['id' => $student->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <label for="">Name:</label>
            <span style="color: red">{{$errors->first('name')}}</span>
        <input  class="form-control" type="text" name="name" value="{{$student->name}}">

        <label for="">Email:</label>
        <span style="color: red">{{$errors->first('email')}}</span>
        <input class="form-control" type="text" name="email" value="{{$student->email}}">

        <label for="">Group:</label>
        <span style="color: red">{{$errors->first('group')}}</span>
        <input class="form-control" type="number" name="group" value="{{$student->group}}">

        <input class="btn btn-primary" type="submit" value="Save">
        </div>


    </form>
@endsection

