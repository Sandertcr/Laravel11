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
                    <h5 class="h3 num-4 text-red-700"></h5>
                    <p>Projects </p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
@endsection

@section('content')

    @if($errors->any())
        <div class="bg-red-200 text-red-900 rounded-lg shadow-md p-6 pr-10 mb-8">

            <ul class = "mt-3 list-disc list-inside text-sm text-red-600">
                @foreach($errors->all() as $error)
                        <li> {{ $error }}} </li>
                @endforeach
            </ul>

        </div>


    @endif



    <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
        <div class="p-4">
            <form id="form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
                  action=" {{ route("projects.store") }}" method="POST">

                @csrf
                <label class="block text-sm">
                    <span class="text-gray-700">Name</span>
                    <input class="bg-gray-600 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input
                        @error('name') border-red-600  focus:shadow-outline-red @enderror"
                           name="name" value=" {{ old('name') }}" type="text" required/>
                    <span class="text-gray-700">Description</span>
                    <input class="bg-gray-600 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input
                        @error('description') border-red-600  focus:shadow-outline-red @enderror"
                           name="description" value=" {{ old('description') }}" type="text" required/>
                </label>


                <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active: bg-purple-600 hover:bg-purple-700
focus:outline-none focus: shadow-outline-purple">Toevoegen</button>


            </form>
        </div>
    </div>

@endsection
