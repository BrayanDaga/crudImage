<?php

namespace App\Http\Controllers;

use App\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::paginate();
        return view('student.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'image'         =>  'required|image|max:2048'
        ]);
        $image = $request->file('image');
        $new_name   = rand().','.$image->getClientOriginalExtension();
        $image -> move(public_path('images'),$new_name);
        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->image = $new_name;
        $student->save();
        return redirect('student')->with('success','Data added successfully.');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $new_name   = rand().','.$image->getClientOriginalExtension();
            $image -> move(public_path('images'),$new_name);
        }
        else
        {
            $request->validate([
                'first_name'    => 'required',
                'last_name'    => 'required',
            ]);
        }

        $student = Student::findOrFail($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->image = $new_name;
        $student->save();        
        return redirect('student')->with('success','Data is successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return back()->with('success','Data is successfully deleted.');

    }
}
