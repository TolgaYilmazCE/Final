<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function Save()
    {
        return view('studentsave');
    }

    function StudentInfo(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'departmant' => 'required'
        ]);

        $Student = new Student();
        $Student->name = $request->name;
        $Student->surname = $request->surname;
        $Student->departmant = $request->departmant;
        $save = $Student->save();

        if ($save) {
            return back()->with('success', 'Student saved successfully');
        } else {
            return back()->with('fail', 'Something wrong, try again.');
        }
    }
}
