@extends('layout.layout')
@section('content')
    <h1>Enter new books informations</h1>
    <a class="btn btn-success" href="{{route('book.index')}}">Index</a><br>
    <form class="form-group" action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <label for="">Author:</label>
        <span style="color: red">{{$errors->first('author_id')}}</span>
        <select class="form-control" name="author_id" id="">
            @foreach ($author as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        <input type="text" name="new_author" class="form-control" placeholder="Enter new author">

        <label for="">Name:</label>
        <span style="color: red">{{$errors->first('name')}}</span>
        <input class="form-control" type="text" name="name" placeholder="Ikki eshik orasi">

        <label for="">Years:</label>
        <span style="color: red">{{$errors->first('years')}}</span>
        <input class="form-control" type="number" name="years" placeholder="Yilini kiriting: 1998">

        <label for="">Price:</label>
        <span style="color: red">{{$errors->first('price')}}</span>
        <input class="form-control" type="text" name="price" placeholder="Narxini kiriting:  34500">

        <label for="">Image:</label>
        <span style="color: red">{{$errors->first('image')}}</span>
        <input type="file" name="image" class="form-control" id="">
        <br><input class="btn btn-success" style="width: 50%" type="submit" value="Send">
    </form>

@endsection
