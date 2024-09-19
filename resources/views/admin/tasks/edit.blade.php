@extends('layouts.layoutadmin')


@section('topmenu')
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">

                <!-- top -->
                <div class="flex flex-row justify-between items-center">

                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-3">
                    <h5 class="h3 num-4"></h5>
                    <a href=" {{ route("projects.index") }} "> <p>Projecten Overzicht </p> </a>

                    <a href=" {{ route("projects.create") }}"> <p> Nieuw Project</p></a>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
@endsection

@section("content")

    <div class="card mt-6">
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Project Admin</h1>
        </div>

        @if($errors->any())

            <div class="bg-red-200 text-red-900 rounded-lg shadow-md p-6 pr-10 mb-8">
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>

        @endif


        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <form id="form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
                      action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST"> @method('PUT')
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700">Taak</span>
                        <input class="bg-gray-100 block rounded w-full p-2 mt-1 focus:border-purple-400 focus:outline-none focus: shadow-outline-purple form-input
@error('name') border-red-600 focus:border-red-400 focus: shadow-outline-red @enderror" name="task" value="{{ old('task', $task->task) }}" type="text" required/>
                    </label>


                    <label class="block text-sm">
                        <span class="text-gray-700">Begin Datum</span>
                        <input class="bg-gray-100 block rounded w-full p-2 mt-1 focus:border-purple-400 focus:outline-none focus: shadow-outline-purple form-input
@error('name') border-red-600 focus:border-red-400 focus: shadow-outline-red @enderror" name="begindate" value="{{ old('task', $task->begindate) }}" type="date" required/>
                    </label>


                    <label class="block text-sm">
                        <span class="text-gray-700">Eind Datum</span>
                        <input class="bg-gray-100 block rounded w-full p-2 mt-1 focus:border-purple-400 focus:outline-none focus: shadow-outline-purple form-input
@error('name') border-red-600 focus:border-red-400 focus: shadow-outline-red @enderror" name="enddate" value="{{ old('task', $task->enddate) }}" type="date" required/>
                    </label>


                    <span class="text-gray-700"> Project </span>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                        focus:outline-none focus:shadow-outline" name="project_id" id="project_id" required>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}"@selected($project->id == old('project_id', $task->project_id))>{{ $project->name }}</option>
                        @endforeach
                    </select>


                    <span class="text-gray-700"> Activity </span>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                        focus:outline-none focus:shadow-outline" name="activity_id" id="activity_id" required>
                        @foreach($activities as $activity)
                            <option value="{{ $activity->id }}"@selected($activity->id == old('activity_id', $task->activity_id))>{{ $activity->name }}</option>
                        @endforeach
                    </select>


                    <span class="text-gray-700"> User </span>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                        focus:outline-none focus:shadow-outline" name="user_id" id="user_id" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}"@selected($user->id == old('user_id', $task->user_id))>{{ $user->name }}</option>
                        @endforeach
                    </select>


                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 rounded border-transparent active: bg-purple-600 hover:bg-purple-700 focus:outline-none focus: shadow-outline-purple">Verwijderen</button>
                </form>
            </div>
        </div>
    </div>
@endsection