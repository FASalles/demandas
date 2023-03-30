<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciamento de posts') }}
        </h2>
    </x-slot>
    <div class="bg-gray-600 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full mb-10 flex justify-end">
                <a href="{{route('admin.posts.create')}}"
                   class="px-4 py-2 shadow rounded
                    text-white text-bold bg-green-700 hover:bg-green-900
                    transition ease-in-out duration-200">Criar Post</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full bg-white rounded shadow p-4">
                    <thead>
                        <tr>
                            <th class="px-2 py-4 text-left">#</th>
                            <th class="px-2 py-4 text-left">Título</th>
                            <th class="px-2 py-4 text-left">Criado em</th>
                            <th class="px-2 py-4 text-left">Status</th>
                            <th class="px-2 py-4 text-left">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                    @forelse($posts as $post)
                            <tr>
                                <td class="px-2 py-4 text-left">{{ $post->id }}</td>
                                <td class="px-2 py-4 text-left">{{ $post->title }}</td>
                                <td class="px-2 py-4 text-left">{{ $post->created_at }}</td>
                                <td class="px-2 py-4 text-left">
                                    <span class="font-bold {{ $post->is_active ? 'text-green-800' : 'text-red-800' }}">
                                    {{ $post->is_active ? 'Ativo' : 'Inativo' }}
                                    </span>
                                </td>
                                <td class="px-2 py-4 text-left">
                                    <a href="#"
                                       class="px-4 py-2 shadow rounded
                                                        text-white text-bold bg-blue-700 hover:bg-blue-900
                                                        transition ease-in-out duration-200">Editar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Nenhum post encontrado!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

{{--            {{ $posts->link() }}--}}
        </div>
    </div>


</x-app-layout>
