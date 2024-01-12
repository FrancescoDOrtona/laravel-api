<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.project.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.project.create', compact("types" , "technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|max:255|string',
            'title' => 'required|min:3|string',
            'type_id' => 'nullable|exists:types,id',
            'technology_id' => 'nullable|exists:technologies,id',
            'description' => 'required|min:5|max:400|string'
        ]);

        $data = $request->all();

        $new_project = Project::create($data);
        $new_project->technologies()->sync($request->input('technologies', []));

        return redirect()->route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::findorfail($id);
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $types = Type::all();
        $technologies = Technology::all();
        $project = Project::findOrFail($id);
        return view('admin.project.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'img' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'type_id' => 'nullable|exists:types,id',
            'technology_id' => 'nullable|exists:technologies,id',
            'description' => 'required|string|min:5|max:400',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validatedData);

        return redirect()->route('admin.projects.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
