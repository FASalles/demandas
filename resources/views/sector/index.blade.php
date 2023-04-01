<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setores') }}
        </h2>
    </x-slot>
    <div class="bg-gray-600 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full mb-10 flex justify-end">
                <a href="{{route('sector.create')}}"
                   class="px-4 py-2 shadow rounded
                    text-white text-bold bg-green-700 hover:bg-green-900
                    transition ease-in-out duration-200">Criar Setor</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full bg-white rounded shadow p-4 min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-2 py-4 text-left">#</th>
                        <th class="px-2 py-4 text-left">Nome</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if (session('success'))
                        <div class="text-center font-bold bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @forelse($sectors as $sector)
                        <tr class="even:bg-white odd:bg-blue-100">
                            <td class="px-2 py-4 text-left">{{ $sector->id }}</td>
                            <td class="px-2 py-4 text-left">{{ $sector->name }}</td>
                            </td>
                            <td class="px-2 py-4 text-left">
                                <a href="#" class="px-4 py-2 shadow rounded
                                                        text-white text-bold bg-blue-700 hover:bg-blue-900
                                                        transition ease-in-out duration-200">Editar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Nenhum setor encontrado!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                {{$sectors->links()}}
            </div>

            {{--            {{ $posts->link() }}--}}
        </div>
    </div>


</x-app-layout>
