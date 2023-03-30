<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar demanda') }}
        </h2>
    </x-slot>
    <div class="bg-gray-800 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-gray-700 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{route('admin.posts.store')}}" method="post">
                    @csrf
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Título</label>
                        <input type="text" class="w-full rounded" name="title">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Resumo</label>
                        <input type="text" class="w-full rounded"name="description">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Issue associada</label>
                        <input type="text" class="w-full rounded" name="body">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Horas orçadas</label>
                        <input type="text" class="w-full rounded" name="title">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Relaiva ao setor</label>
                        <input type="text" class="w-full rounded"name="description">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Técnico responsável</label>
                        <input type="text" class="w-full rounded" name="body">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Criada em:</label>
                        <input type="text" class="w-full rounded" name="body">
                    </div>
                    <div class="w-full mb-6">
                        <label for="" class="block text-white mb-2">Status</label>
                        <div class="flex justify-start gap-3 text-white">
                            <div><input type="radio" name="is_active" value="1" checked> Resolvida</div>
                            <div><input type="radio" name="is_active" value="0"> Pendente</div>
                        </div>
                    </div>


                    <div class="w-full flex justify-end">
                        <button
                            class="mt-10 px-4 py-2 shadow rounded text-xl
                    text-white text-bold bg-green-700 hover:bg-green-900
                    transition ease-in-out duration-200">Criar
                            Demanda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>

