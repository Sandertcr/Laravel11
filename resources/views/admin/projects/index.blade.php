@extends('layouts.layoutadmin');



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



@section('content')

    <div class="card mt-6">

        <div class="card-header flex flex-row justify-between">
            <h1 class="h6"> Projects Admin</h1>
        </div>

        @if(session('status'))
            <div class="card-body">
                <div class="bg-green-200 text-green-700 rounded-lg shadow-md p-6 pr-10 mb-8"> {{ session('status') }}</div>
            </div>
        @endif

        @if(session('status-wrong'))
            <div class="card-body">
                <div class="bg-green-400 text-green-800 rounded-lg shadow-md p-6 pr-10 mb-8"> {{ session('status-wrong') }}</div>
            </div>
        @endif


        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Edit</th>
                        @can('delete project')
                        <th class="px-4 py-3">Delete</th> </tr>
                        @endcan
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($projects as $project)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm" ><a href=" {{ route('projects.show', $project->id) }}"> {{ $project->id }} </a></td> <td class="px-4 py-3 text-sm"> {{ $project->name }} </td>
                            @can('edit project')
                            <td class="px-4 py-3">
                                <a href="  {{ route('projects.edit', $project->id) }} " class="fad fa-pencil text-xs mr-1"  style="color: greenyellow"></a>
                            </td>
                            @endcan

                            @can('delete project')
                            <td class="px-4 py-3">
                                <a href="{{ route('projects.delete',['project' => $project->id]) }}" class="fad fa-trash text-xs mr-1" style="color: Tomato"></a>

                            </td>
                            @endcan


                        </tr>
                    @endforeach
                    </tbody>

                </table>

            </div>

        </div>

    </div>



@endsection