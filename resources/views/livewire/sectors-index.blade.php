<div>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setores') }}
        </h2>
    </x-slot>

    <div class="m-4 bg-gray-600 py-2">
        <imput class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <imput class="flex flex-row justify-end">
                <a href={{ route('sector.create')}} class="focus:ring-2 m-4 px-4 py-2 shadow rounded-full
                   text-white text-bold bg-green-700 hover:bg-green-900
                   transition ease-in-out duration-200">
                Criar Setor</a>

                <input type="text" name="search" class="m-4 border rounded px-4 py-2" placeholder="pesquisar..."
                       wire:model.debounce.500ms="search">
            </imput>
            <div class="m-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class=" w-full bg-white rounded shadow p-4 min-w-full divide-y divide-gray-200">
                    <thead class="m-4">
                    <tr class="m-4">
                        <th class="px-2 py-4 text-left">#</th>
                        <th class="px-2 py-4 text-left">Nome</th>
                        <th class="px-4 py-4 text-right">Ações</th>
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
                            <td class="px-2 py-4 text-right">
                                <a href="{{route('sector.edit', ['sector' => $sector->id]) }}" class="px-4 py-2 shadow rounded
                                                        text-white text-bold bg-yellow-500 hover:bg-yellow-700
                                                        transition ease-in-out duration-200">Editar</a>
                            </td>
                            <td class="px-2 py-4 text-left">
                                <form action="{{route('sector.destroy', ['sector' => $sector->id]) }}" method="post">
                                    @csrf
                                    {{--                                    @method('DELETE')--}}
                                    @can('sector:delete')
                                        <button class="px-4 py-2 shadow rounded
                                                        text-white text-bold bg-red-700 hover:bg-red-900
                                                        transition ease-in-out duration-200">Remover</button>
                                    @endcan
                                </form>

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


    </div>
</div>
