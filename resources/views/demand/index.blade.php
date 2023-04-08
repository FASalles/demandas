<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciamento de demandas') }}
        </h2>
    </x-slot>
    <div class="bg-gray-600 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full mb-10 flex justify-end">
                <a href="{{route('demand.create')}}"
                   class="px-4 py-2 shadow rounded
                    text-white text-bold bg-green-700 hover:bg-green-900
                    transition ease-in-out duration-200">Criar Demanda</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full bg-white rounded shadow p-4 min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-2 py-4 text-left">#</th>
                        <th class="px-2 py-4 text-left">Título</th>
                        <th class="px-2 py-4 text-left">Resumo</th>
                        <th class="px-2 py-4 text-left">Issue associada</th>
                        <th class="px-2 py-4 text-left">Horas orçadas</th>
                        <th class="px-2 py-4 text-left">Relativa ao setor</th>
                        <th class="px-2 py-4 text-left">Técnico responsável</th>
                        <th class="px-2 py-4 text-left">Criada em</th>
                        <th class="px-2 py-4 text-left">Status</th>
                        <th class="px-2 py-4 text-left">Ações</th>
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
                            <td class="px-2 py-4 text-left">{{ $demand->id }}</td>
                            <td class="px-2 py-4 text-left">{{ $demand->title }}</td>
                            <td class="px-2 py-4 text-left">{{ $demand->attached_issue }}</td>
                            <td class="px-2 py-4 text-left">{{ $demand->budgeted_hours }}</td>
                            <td class="px-2 py-4 text-left">{{ $demand->sector_id }}</td>
                            <td class="px-2 py-4 text-left">{{ $demand->user_id }}</td>
                            <td class="px-2 py-4 text-left">{{ $demand->system_id }}</td>
                            <td class="px-2 py-4 text-left">{{ $demand->demands_type_id }}</td>

                            <td class="px-2 py-4 text-left">
                                    <span class="font-bold {{ $demand->is_active ? 'text-green-800' : 'text-red-800' }}">
                                    {{ $demand->is_active ? 'Ativo' : 'Inativo' }}
                                    </span>
                            </td>
                            <td class="px-2 py-4 text-left">
                                <a href="/demand/{{ $demand->id }}/edit"
                                   class="px-4 py-2 shadow rounded
                                                        text-white text-bold bg-yellow-500 hover:bg-yellow-700
                                                        transition ease-in-out duration-200">Editar</a>
                            </td>
                            <td>
                                <form action="{{route('demand.destroy', ['demand' => $demand->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-2 shadow rounded
                                                            text-white text-bold bg-red-700 hover:bg-red-900
                                                            transition ease-in-out duration-200">Remover</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Nenhuma demanda encontrada!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                {{$demands->links()}}
            </div>
        </div>
    </div>


</x-app-layout>

