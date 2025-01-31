<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'semester' => 'required|string|max:255',
            'group' => 'required|string|max:255',
            'shift' => 'required|string|max:255',
        ]);

        Group::create($request->all());

        return redirect()->route('groups.index');
    }

    public function show($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.show', compact('group'));
    }


    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'semester' => 'required|string|max:255',
            'group' => 'required|string|max:255',
            'shift' => 'required|string|max:255',
        ]);

        $group = Group::findOrFail($id);
        $group->update($request->all());

        return redirect()->route('groups.index');
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('groups.index');
    }

    public function showStudents($groupId)
    {
        $group = Group::findOrFail($groupId);
        $students = $group->students;
        return view('groups.students', compact('group', 'students'));
    }

}
