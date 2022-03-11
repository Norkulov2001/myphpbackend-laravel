<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)  // get
    {
        $student = Student::query();
        // dd($student);
        if($request->search)
        {
            $student = $student->where('name', 'like', '%'.$request->search.'%');
        }

        $student = $student->get();

        return view('student.index', ['student' => $student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()   // get
    {
          return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  // post
    {
        // $student = new Student();
        // // dd($student);
        // $student->name = $request->name;
        // $student->email = $request->email;
        // $student->group = $request->group;
        // $student->save();

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'group' => 'required'
            ]
        );

        Student::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'group' => $request->group,
            ]
        );

        return redirect()->route('student.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)  // get
    {
        // dd($id);
        $student = Student::where('id', '=', $id)->first();

        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)  // get
    {
        $student = Student::where('id', '=', $id)->first();

        return view('student.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)  // put
    {
        $student = Student::where('id', '=', $id)->first();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->group = $request->group;
        $student->save();

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'group' => 'required'
            ]
        );

        return redirect()->route('student.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)   // delete
    {
        $student = Student::where('id', '=', $id)->first();
        $student->delete();

        return redirect()->route('student.index');
    }
}
