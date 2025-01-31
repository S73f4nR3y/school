<?php

namespace App\Http\Controllers;

use App\Student;
use App\Group;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('group')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $groups = Group::all();
        return view('students.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:5|max:100',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:15',
            'group_id' => 'required|exists:groups,id', 
        ]);

        Student::create($request->all());

        return redirect()->route('students.index');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $groups = Group::all();
        return view('students.edit', compact('student', 'groups'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:100',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'required|string|max:15',
            'group_id' => 'required|exists:groups,id',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index');
    }
}
