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
        <div clas="card-header flex flex-row justify between">
            <h1 class="h6"> Project Admin</h1>
        </div>

        <div class="py-4 px-6">
            <h2 class="text-lg font-semibold text-gray-800"> Project details </h2>
            <p class="py-2 text-lg text-gray-700">Naam: {{ $project->name }}</p>
            <p class="py-2 text-lg text-gray-700">ID: {{ $project->id }}</p>
            <p class="py-2 text-lg text-gray-700">Description: {{ $project->description }}</p>
            <p class="py-2 text-lg text-gray-700">Created At: {{ $project->created_at }}</p>
            <p class="py-2 text-lg text-gray-700">Updated At: {{ $project->updated_at }}</p>
        </div>
    </div>
@endsection
