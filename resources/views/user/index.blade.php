<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>
    <div class="bg-gray-600 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full mb-10 flex justify-end">
                <a href="{{route('user.create')}}"
                   class="px-4 py-2 shadow rounded
                    text-white text-bold bg-green-700 hover:bg-green-900
                    transition ease-in-out duration-200">Criar Usuário</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full bg-white rounded shadow p-4 min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
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

                    @forelse($users as $user)
                        <tr class="even:bg-white odd:bg-blue-100">
                            <td class="px-2 py-4 text-left">{{ $user->id }}</td>
                            <td class="px-2 py-4 text-left">{{ $user->name }}</td>
                            </td>
                            <td class="px-2 py-4 text-right">
                                <a href="{{route('user.edit', ['user' => $user->id]) }}" class="px-4 py-2 shadow rounded
                                                        text-white text-bold bg-yellow-500 hover:bg-yellow-700
                                                        transition ease-in-out duration-200">Editar</a>
                            </td>
                            <td class="px-2 py-4 text-left">
                                <form action="{{route('user.destroy', ['user' => $user->id]) }}" method="post">
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
                            <td colspan="4">Nenhum sistema encontrado!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                {{$users->links()}}
            </div>


        </div>
    </div>


</x-app-layout>
