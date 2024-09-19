<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use Faker\Provider\Text;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use phpDocumentor\Reflection\ProjectFactory;

class ProjectController extends Controller
{
    public function __constructor() {
        $this->middleware('auth');
        $this->middleware('permission:index project', ['only' => ['index']]);
        $this->middleware('permission:show project', ['only' =>  ['show']]);
        $this->middleware('permission:create project', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit project', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete project', ['only' => ['delete', 'destroy']]);
    }

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
     * @param ProjectStoreRequest $request
     * @return RedirectResponse
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
     * @param ProjectUpdateRequest $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        //
        $project->name = $request->name;
        $project->description =  $request->description;
        $project->save();

        return to_route('projects.index')->with('status', 'Project '.$project->name.' is gewijzigd');
    }



    public function delete(Project $project) : View
    {
        return view('admin.projects.delete',  compact('project'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();

        return to_route('projects.index')->with('status', 'Project '.$project->name.' is verwijderd');
    }
}
