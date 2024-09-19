<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Activity;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{

    public function __constructor() {
        $this->middleware('auth');
        $this->middleware('permission:index task', ['only' => ['index']]);
        $this->middleware('permission:show task', ['only' =>  ['show']]);
        $this->middleware('permission:create task', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit task', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete task', ['only' => ['delete', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = Task::with('activity', 'project', 'user')->paginate(15);

        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        $users = User::all();
        $projects = Project::all();
        $activities = Activity::all();
        return view('admin.tasks.create', [
            'users' => $users,
            'projects' => $projects,
            'activities' => $activities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @return RedirectResponse
     */
    public function store(TaskStoreRequest $request): RedirectResponse
    {
        $task = new Task();
        $task->task = $request->task;
        $task->begindate = $request->begindate;
        $task->enddate = $request->enddate;
        $task->project_id = $request->project_id;
        $task->activity_id = $request->activity_id;
        $task->user_id = $request->user_id;

        $task->save();

        return to_route('tasks.index')->with('success', 'Task has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): View
    {
        return view('admin.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        $users = User::all();
        $projects = Project::all();
        $activities = Activity::all();
        return view('admin.tasks.edit', ['task' => $task, 'users' => $users, 'projects' => $projects, 'activities' => $activities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskStoreRequest $request, Task $task): RedirectResponse
    {
        $task->task = $request->task;
        $task->begindate = $request->begindate;
        $task->enddate = $request->enddate;
        $task->project_id = $request->project_id;
        $task->activity_id = $request->activity_id;
        $task->user_id = $request->user_id;

        $task->save();

        return to_route('tasks.index')->with('success', 'Taak: Bijgewerkte Taak Beschrijving is bijgewerkt');
    }

    public function delete(Task $task): View
    {
        $users = User::all();
        $projects = Project::all();
        $activities = Activity::all();
        return view('admin.tasks.delete', ['task' => $task, 'users' => $users, 'projects' => $projects, 'activities' => $activities]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return to_route('tasks.index')->with('status', "Taak: $task->task is verwijderd");
    }
}
