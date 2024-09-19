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
                    <a href=" {{ route("tasks.index") }} "> <p>Tasks Overzicht </p> </a>

                    <a href=" {{ route("tasks.create") }}"> <p> Nieuw Task</p></a>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
@endsection

@section("content")

    <div class="card mt-6">
        <div clas="card-header flex flex-row justify between">
            <h1 class="h6"> Task Admin</h1>
        </div>

        <div class="py-4 px-6">
            <h2 class="text-lg font-semibold text-gray-800"> task details </h2>
            <p class="py-2 text-lg text-gray-700">ID: {{ $task->id }}</p>
            <p class="py-2 text-lg text-gray-700">Taak: {{ $task->task }}</p>
            <p class="py-2 text-lg text-gray-700">BeginDate: {{ $task->begindate }}</p>
            @if(is_null($task->enddate))
                <p class="py-2 text-lg text-gray-700">EndDate: N/A</p>
            @else
                <p class="py-2 text-lg text-gray-700">EndDate: {{ $task->enddate }}</p>
            @endif
            <p class="py-2 text-lg text-gray-700">Project naam: {{ $task->project->name }}</p>
            <p class="py-2 text-lg text-gray-700">Activity naam: {{ $task->activity->name }}</p>

            @if(is_null($task->user_id))
                <p class="py-2 text-lg text-gray-700">User: N/A</p>
            @else
                <p class="py-2 text-lg text-gray-700">User: {{ $task->user->name }}</p>
            @endif

            <p class="py-2 text-lg text-gray-700">Updated At: {{ $task->created_at }}</p>
        </div>
    </div>
@endsection
