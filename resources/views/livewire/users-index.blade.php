<div>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    <div class="m-4 bg-gray-600 py-2">
        <imput class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <imput class="flex flex-row justify-end">
                <a href="{{ route('user.create') }}" class="focus:ring-2 m-4 px-4 py-2 shadow rounded-full text-white font-bold bg-green-700 hover:bg-green-900 transition ease-in-out duration-200">
                    Criar Usuário
                </a>

                <input type="text" class="m-4 border rounded px-4 py-2" placeholder="pesquisar..."
                       wire:model.debounce.500ms="search">
                </imput>

                 @if (!empty($results))
                    <ul>
                        @foreach ($results as $result)
                            <li>{{ $result->column_name }}</li>
                        @endforeach
                    </ul>
                @endif

            <div class="m-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class=" w-full bg-white rounded shadow p-4 min-w-full divide-y divide-gray-200">
                    <thead class="m-4">
                    <tr class="m-4">
                        <th class="px-2 py-4 text-left">#</th>
                        <th class="px-2 py-4 text-left">Nome</th>
                        <th class="px-4 py-4 text-left">Email</th>
                        <th class="px-4 py-4 text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($users as $user)
                        <tr class="even:bg-white odd:bg-blue-100">
                            <td class="px-2 py-4 text-left">{{ $user->id }}</td>
                            <td class="px-2 py-4 text-left">{{ $user->name }}</td>
                            <td class="px-2 py-4 text-left">{{ $user->email }}</td>
                            </td>
                            <td class="px-2 py-4 text-right">
                                <a href="{{route('user.edit', ['user' => $user->id]) }}" class="btn
                                                        bg-yellow-500 hover:bg-yellow-700">Editar</a>
                            </td>
                            <td class="px-2 py-4 text-left">
                                <form action="{{route('user.destroy', ['user' => $user->id]) }}" method="post">
                                    @csrf
{{--                                    @method('DELETE')--}}
                                    @can('users:delete')
                                        <button class="px-4 py-2 shadow rounded
                                                        text-white text-bold
                                                        transition ease-in-out duration-200
                                                        bg-red-700 hover:bg-red-900">Remover</button>
                                    @endcan
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Nenhum usuário encontrado!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="bg-red-500">
                </div>

                <a href="http://localhost:10002/pdfUsers" target="_blank" class="m-4 p-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Baixar lista
                </a>

                {{$users->links()}}
            </div>


    </div>


</div>
