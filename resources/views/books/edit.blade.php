@extends('layout.layout')
@section('content')
    <h1>Update books informations</h1>
    {{-- <a class="btn btn-success" href="{{route('book.index')}}">Index</a><br> --}}
    <form class="form-group" action="{{route('book.update', ['book' => $book->id])}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label for="">Author:</label>
        <span style="color: red">{{$errors->first('author_id')}}</span>
        <select class="form-control" name="author_id" id="">
            @foreach ($author as $item)
                @if ($item->id == $book->author_id)
                    <option selected value="{{$item->id}}">{{$item->name}}</option>
                @else
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endif
            @endforeach
        </select>

        <label for="">Name:</label>
        <span style="color: red">{{$errors->first('name')}}</span>
        <input class="form-control" type="text" name="name" value="{{$book->name}}">

        <label for="">Years:</label>
        <span style="color: red">{{$errors->first('years')}}</span>
        <input class="form-control" type="number" name="years" value="{{$book->years}}">

        <label for="">Price:</label>
        <span style="color: red">{{$errors->first('price')}}</span>
        <input class="form-control" type="text" name="price" value="{{$book->price}}">

        <label for="">Image:</label>
        <span style="color: red">{{$errors->first('image')}}</span>
        <input class="form-control" type="file" name="image" id="">
        @if ($book->image)
                <img src="{{asset('/storage/books/' .$book->image)}}" width="100" alt="">
          @endif
        <br><br><input class="btn btn-success" style="width: 50%" type="submit" value="Save">
    </form>

@endsection
