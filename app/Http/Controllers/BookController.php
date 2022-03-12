<?php

namespace App\Http\Controllers;

use App\Http\Requests\Books\StoreRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $book =  Book::query()->with('author');

        if($request->search){
            $book = $book->where('name', 'like', '%'.$request->search.'%');
        }

        $book = $book->get();

        return view('books.index', ['book' => $book]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::get();
        return view('books.create', ['author' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('image')->getClientOriginalExtension());
        $image = null;
        if($request->file('image')){
            $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/public/books/', $image);
        }

        $auth = null;
        if($request->new_author){
            $auth = Author::create([
                'name' => $request->new_author
            ]);
        }
        $request->validate(
            [
                'name' => 'required',
                'author_id' => 'required',
                'years' => 'required',
                'price' => 'required',
                'image' => 'required'

            ]
        );
            $data = [
                'name' => $request->name,
                'author_id' => $auth ? $auth->id : $request->author_id,
                'years' => $request->years,
                'price' => $request->price,
                'image' => $image??''
            ];

            Book::create($data);

            return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // $book = Book::where('id', '=', $id)->first();

        return view('books.show', ['item' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::get();

        // dd($categories);
        $book = Book::where('id', '=', $id)->first();

        // dd($phone);

        return view('books.edit', ['book' =>$book, 'author'=> $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // dd($book->image);
        // dd($request->file('image'));

        $image = null;
        if($book->image){
            if($request->file('image')){
                $image = time() . '.'. $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('/public/books/', $image);

                unlink('storage/books/'.$book->image);
            }
        }else{
                $image = time() . '.'. $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('/public/books/', $image);
        }

        $request->validate(
            [
                'name' => 'required',
                'author_id' => 'required',
                'years' => 'required',
                'price' => 'required'

            ]
        );
            $data = [
                'name' => $request->name,
                'author_id' => $request->author_id,
                'years' => $request->years,
                'price' => $request->price,
                'image' => $image??$book->image

            ];

            $book->update($data);

            return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::where('id', '=', $id)->first();
        $book->delete();

        return redirect()->route('book.index');
    }

    public function author()
    {
        $author = Author::with('book')->get();

        dd($author);

        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
