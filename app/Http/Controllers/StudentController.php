<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $all_students = Student::get();
        return view('home', compact('all_students'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();
        // return redirect()->back();

        return redirect()->route('home')->with('success', 'Student data has been added');
    }

    public function edit($id)
    {
        $student_single = Student::where('id', $id)->first();
        return view('edit', compact('student_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $student = Student::where('id', $id)->first();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->update();

        return redirect()->route('home')->with('success', 'Student data has been updated');
    }
}
