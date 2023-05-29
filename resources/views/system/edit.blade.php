<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar sistema') }}
        </h2>
    </x-slot>
    <div class="bg-gray-800 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gray-700 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{route('system.update', ['system' => $system->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
{{--                    @method('PUT')--}}
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Nome</label>
                        <input type="text" class="w-full rounded" @error('name') border-red-700 @enderror" name="name" value="{{ $system->name }}">
                    </div>

                    @error('name')
                    <span class="block mt-4 text-red-700 font-bold">{{$message}}</span>
                    @enderror

                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Analista responsável</label>
                        <input type="text" name="developer" class="w-full rounded" value="{{ $system->developer }}" >
                    </div>

                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Usuário responsável</label>
                        <input type="text" name="user" class="w-full rounded" value="{{ $system->user }}" >
                    </div>

                    <div class="flex">
                        <span class="w-full mb-6 mx-2">
                            <label for="" class="block text-white mb-2">Versão Laravel e PHP</label>
                            <input type="text" name="laravelVersion" class="w-full rounded" value="{{ $system->laravelVersion }}" >
                        </span>

                        <div class="w-full mb-6 mx-2">
                            <label for="" class="block text-white mb-2">Demais tecnologias</label>
                            <input type="text" name="otherTecs" class="w-full rounded" value="{{ $system->otherTecs }}" >
                        </div>
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
