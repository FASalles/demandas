<div>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Demandas') }}
        </h2>
    </x-slot>

    <div class="m-4 bg-gray-600 py-2">
        <imput class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <imput class="flex flex-row justify-end">
                <a href={{ route('demand.create')}} class="focus:ring-2 m-4 px-4 py-2 shadow rounded
                   text-white text-bold bg-green-700 hover:bg-green-900
                   transition ease-in-out duration-200">
                Criar Demanda</a>

                <input type="text" class="m-4 border rounded px-4 py-2" placeholder="pesquisar..."
                       wire:model.debounce.500ms="search">
            </imput>
            <div class="m-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <table class="m-4 w-full bg-white rounded shadow p-4 min-w-full divide-y divide-gray-200">
                    <thead class="m-4">
                    <tr class="m-4">
                        <th class="px-2 py-4 text-left">#</th>
                        <th class="px-2 py-4 text-left">Título</th>
                        <th class="px-2 py-4 text-left">Resumo</th>
                        <th class="px-2 py-4 text-left">Issue Github associada</th>
                        <th class="px-2 py-4 text-left">Horas orçadas</th>
                        <th class="px-2 py-4 text-left">Relativa ao setor</th>
                        <th class="px-2 py-4 text-left">Relativa ao usuário</th>
                        <th class="px-2 py-4 text-left">Técnico responsável</th>
                        <th class="px-2 py-4 text-left">Criada em</th>
{{--                        <th class="px-2 py-4 text-left">Status</th>--}}
                        <th class="px-2 py-4 text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if (session('success'))
                        <div class="text-center font-bold bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @forelse($demands as $demand)
                        <tr class="even:bg-white odd:bg-blue-100">
                            {{-- {{dd($demand)}} --}}
                            <td class="px-2 py-4 text-left border">{{ $demand->id }}</td>
                            <td class="px-2 py-4 text-left border">{{ $demand->title }}</td>
                            <td class="px-2 py-4 text-left border">{{ $demand->body }}</td>
                            <td class="px-2 py-4 text-left border">{{ $demand->attached_issue }}</td>
                            <td class="px-2 py-4 text-left border">{{ $demand->budgeted_hours }}</td>
                            <td class="px-2 py-4 text-left border">{{ $demand->sector ? $demand->sector->name : '' }}</td>
                            <td class="px-2 py-4 text-left border">{{ $demand->system ? $demand->system->name : '' }}</td>
                            <td class="px-2 py-4 text-left border">{{ $demand->user ? $demand->user->name : '' }}</td>
                            <td class="px-2 py-4 text-left border">{{ date('d/m/Y', strtotime($demand->created_at)) }}</td>

                            <td class="px-2 py-4 text-left border">
                                <a href="/demand/{{ $demand->id }}/edit"
                                   class="px-4 py-2 shadow rounded text-white text-bold bg-yellow-500 hover:bg-yellow-700 transition ease-in-out duration-200">Editar</a>
                            </td>
                            <td class="border">
                                <form action="{{ route('demand.destroy', ['demand' => $demand->id]) }}" method="post">
                                    @csrf
                                    {{-- @method('DELETE') --}}
                                    @can('demand:delete')
                                        <button class="px-4 py-2 shadow rounded text-white text-bold bg-red-700 hover:bg-red-900 transition ease-in-out duration-200">Remover</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="4">Nenhuma demanda encontrado!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <a href="http://localhost:10002/pdfDemands" target="_blank" class="m-4 p-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Baixar lista
                </a>

                {{$demands->links()}}
            </div>


    </div>

</div>
