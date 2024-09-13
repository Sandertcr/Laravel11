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
                      action="{{ route('projects.update', ['project', $project->id]) }}" method="POST"> @method('PUT')
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700">Name</span>
                        <input class="bg-gray-100 block rounded w-full p-2 mt-1 focus:border-purple-400 focus:outline-none focus: shadow-outline-purple form-input
@error('name') border-red-600 focus:border-red-400 focus: shadow-outline-red @enderror" name="name" value="{{ old('name', $project->name) }}" type="text" required/>
                    </label>
                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 rounded border-transparent active: bg-purple-600 hover:bg-purple-700 focus:outline-none focus: shadow-outline-purple">Wijzigen</button>
                </form>
            </div>
        </div>
    </div>
@endsection
