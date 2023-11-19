<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('home');
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
}