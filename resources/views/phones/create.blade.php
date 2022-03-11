@extends('layout.layout')
@section('content')

        <h1>Enter Phones information </h1>

    <form class="form-group" action="{{route('phones.store')}}" method="POST" enctype="multipart/form-data">

        <a href="{{route('phones.index')}}" class="btn btn-success">Index</a>

        @csrf

        <div class="container" style="border-width: 300px">

        <label for="">Name:</label>
        <span style="color: red">{{$errors->first('name')}}</span>
        <input class="form-control" type="text" name="name" placeholder="iPhone 13 PRO Max">

        <label for="">Years:</label>
        <span style="color: red">{{$errors->first('years')}}</span>
        <input class="form-control" type="number" name="years" placeholder="2022">

        <label for="">Price:</label>
        <span style="color: red">{{$errors->first('price')}}</span>
        <input class="form-control" type="text" name="price" aria-label="Amount (to the nearest dollar)" placeholder="$1200">


        <label for="">Category:</label>
        <span style="color: red">{{$errors->first('category_id')}}</span>
          <select class="form-control" name="category_id" id="" >
              @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
          </select>
          <input class="form-control" type="text" name="cat_name" placeholder="Create new category">
<br>
          <span style="color: red">{{$errors->first('image')}}</span>
          <input class="form-control" type="file" name="image" id=""><br>
        <input class="btn btn-primary" type="submit" value="send" style="width: 50%">
        </div>
    </form>
@endsection

