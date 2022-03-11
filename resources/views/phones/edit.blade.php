@extends('layout.layout')
@section('content')

        <h1>Update Phones information </h1>



    <form class="form-group" action="{{route('phones.update', ['phone' => $phone->id])}}" method="POST" enctype="multipart/form-data">

        {{-- <a href="{{route('phones.index')}}" class="btn btn-success">Index</a> --}}
        @csrf
        @method('PUT')
        <div class="container">
            <label for="">Name:</label>
            <span style="color: red">{{$errors->first('name')}}</span>
            <input class="form-control" type="text" name="name" value="{{$phone->name}}">

            <label for="">Years:</label>
            <span style="color: red">{{$errors->first('years')}}</span>
            <input class="form-control" type="number" name="years" value="{{$phone->years}}">

            <label for="">Price:</label>
            <span style="color: red">{{$errors->first('price')}}</span>
            <input class="form-control" type="text" name="price" value="{{$phone->price}}">

            <label for="">Category:</label>
            <span style="color: red">{{$errors->first('category_id')}}</span>
            <select class="form-control" name="category_id" id="" >
                @foreach ($categories as $item)
                    @if ($item->id == $phone->category_id)
                        <option selected value="{{$item->id}}">{{$item->name}}</option>
                    @else
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
                @endforeach
          </select>
          <input class="form-control" type="text" name="cat_name" placeholder="Create new category"><br>

          <label for="">Image:</label>
          <span style="color: red">{{$errors->first('image')}}</span>
          <input class="form-control" type="file" name="image" id="">
          @if ($phone->image)
                <img src="{{asset('/storage/images/' .$phone->image)}}" width="100" alt="">
          @endif
        <br><input class="btn btn-primary" type="submit" value="Save">
        </div>
    </form>
@endsection

