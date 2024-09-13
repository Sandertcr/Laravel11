<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
use Faker\Provider\Text;
use Illuminate\Http\Request;
use Illuminate\View\View;
use phpDocumentor\Reflection\ProjectFactory;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        //

        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View;
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->description =  $request->description;
        $project->save();

        return to_route('projects.index')->with('status', 'Project A valid project name is aangemaakt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project) : View
    {
        return view('admin.projects.show',  compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project) : View
    {
        return view('admin.projects.edit',  compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
