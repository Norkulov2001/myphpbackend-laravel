<?php

namespace App\Http\Controllers;

use App\Http\Requests\Phones\PhoneRequest;
use App\Http\Requests\Phones\UpdateRequest;
use App\Models\Category;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $phone = Phone::query()->with('category');


        if($request->search)
        {
            $phone = $phone->where('name', 'like', '%'.$request->search.'%');
        }

            $phone = $phone->get();

           return view('phones.index', ['phone' => $phone]);
    }

    public function create()
    {
        $categories = Category::get();
        return view('phones.create', ['categories' => $categories]);
    }

    public function store(PhoneRequest $request)
    {

        // dd($request->file('image')->getClientOriginalName());
        $image = null;
        if($request->file('image')){
            $image = time() . '.'. $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/public/images/', $image);
        }
             $cat = null;
             if($request->cat_name){
             $cat = Category::create([
                 'name' => $request->cat_name
            ]);
    }
        $request->validate([
            'name' => 'required',
            'years' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'years' => $request->years,
            'price' => $request->price,
            'category_id' => $cat ? $cat->id : $request->category_id,
            'image' => $image??''
        ];

        Phone::create($data);

        return redirect()->route('phones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        // $phone = Phone::where('id', '=', $id)->first();

        return view('phones.show', ['phone' => $phone]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();

        // dd($categories);
        $phone = Phone::where('id', '=', $id)->first();

        // dd($phone);

        return view('phones.edit', ['phone' =>$phone, 'categories'=> $categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {

        $image =  null;
            if($phone->image){

                if($request->file('image')){
                    $image = time() . '.'. $request->file('image')->getClientOriginalExtension();
                    $request->file('image')->storeAs('/public/images/', $image);

                    unlink('storage/images/'.$phone->image);
                }
            }else{
                $image = time() . '.'. $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('/public/images/', $image);
            }

            // dd($image);

       $request->validate([
            'name' => 'required',
            'years' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'years' => $request->years,
            'price' => $request->price,
            'category_id' =>$request->category_id,
            'image' => $image ?? $phone->image
        ];

        $phone->update($data);

        return redirect()->route('phones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phone::where('id', '=', $id)->first();
        $phone->delete();

        return redirect()->route('phones.index');
    }

    public function category()
    {
        $category = Category::with('phone')->get();

        dd($category);

        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
