<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar setor') }}
        </h2>
    </x-slot>
    <div class="bg-gray-800 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gray-700 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{route('sector.update', ['sector' => $sector->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
{{--                    @method('PUT')--}}
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Nome</label>
                        <input type="text" class="w-full rounded" name="name" @error('name') border-red-700 @enderror value="{{ $sector->name }}">
                    </div>

                    @error('name')
                    <span class="block mt-4 text-red-700 font-bold">{{$message}}</span>
                    @enderror

                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Usuário Responsável</label>
                        <input type="text" class="w-full rounded" name="user" value="{{ $sector->user }}">
                    </div>

                    <div class="w-full flex justify-end">
                        <button
                            class="mt-10 px-4 py-2 shadow rounded text-xl
                    text-white text-bold bg-green-700 hover:bg-green-900
                    transition ease-in-out duration-200">Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
