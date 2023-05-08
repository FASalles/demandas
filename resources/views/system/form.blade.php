<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Criar sistema') }}
        </h2>
    </x-slot>
    <div class="bg-gray-800 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

{{--            @if($errors->any())--}}
{{--                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">--}}
{{--                    <ul class="list-disc list-inside">--}}
{{--                        @foreach($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}

            <div class="bg-gray-500 dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{route('system.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Nome</label>
                        <input type="text" name="name" class="w-full rounded @error('name') border-red-700 @enderror" value="{{ old('name') }}" >

                        @error('name')
                            <span class="block mt-4 text-red-700 font-bold">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="w-full flex justify-end">
                        <button
                            class="mt-10 px-4 py-2 shadow rounded text-xl
                    text-white text-bold bg-green-700 hover:bg-green-900
                    transition ease-in-out duration-200">Criar
                            Sistema</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>

