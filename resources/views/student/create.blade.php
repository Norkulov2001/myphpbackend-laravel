@extends('layout.layout')
@section('content')

        <h1>Enter Students information </h1>

    <form class="form-group" action="{{route('student.store')}}" method="POST">
        @csrf

        <div class="container">
            <label for="">Name:</label>
            <span style="color: red">{{$errors->first('name')}}</span>
            <div class="input-group mb-3">
                <input  class="form-control" type="text" name="name" placeholder="Norqulov Ramazon">
        <span class="input-group-text" id="basic-addon2">Fullname</span>
            </div>


        <label for="">Email:</label>
        <span style="color: red">{{$errors->first('email')}}</span>
        <div class="input-group mb-3">
            <input class="form-control" type="text" name="email" placeholder="norqulov202@gmail.com" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <span class="input-group-text" id="basic-addon2">@gmail.com</span>
        </div>


        <label for="">Group:</label>
        <span style="color: red">{{$errors->first('group')}}</span>
        <input class="form-control" type="number" name="group" placeholder="31220">

        <input class="btn btn-primary" type="submit" value="Save">
        </div>


    </form>
@endsection

