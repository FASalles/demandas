<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar usuário') }}
        </h2>
    </x-slot>
    <div class="bg-gray-800 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-gray-700 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Nome</label>
                        <input type="text" class="w-full rounded" name="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">E-mail</label>
                        <input type="text" class="w-full rounded" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Senha</label>
                        <input type="text" class="w-full rounded" name="password">
                    </div>

                    <div class="w-full flex justify-end">
                        <button
                            class="mt-10 px-4 py-2 shadow rounded text-xl
                    text-white text-bold bg-green-700 hover:bg-green-900
                    transition ease-in-out duration-200">Criar
                            Usuário</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>

