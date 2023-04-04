<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar demanda') }}
        </h2>
    </x-slot>
    <div class="bg-gray-800 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-center items-center">
                <div class="bg-gray-700 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                    <form action="{{route('demand.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div style="flex: 1;">
                            <label for="" class="block text-white mb-2">Resumo</label>
                            <textarea class="w-full rounded" name="body"></textarea>

                            <span style="display: flex;">
                    <div style="flex: 1; margin-right: 10px;">
                        <label for="" class="block text-white mb-2">Título</label>
                        <input type="text" class="w-full rounded" name="title">
                    </div>
                    <div style="flex: 1;">
                        <label for="" class="block text-white mb-2">Issue associada</label>
                        <input type="text" class="w-full rounded" name="attached_issue">
                    </div>
                </span>

                            <span style="display: flex;">
                    <div style="flex: 1; margin-right: 10px;">
                        <label for="" class="block text-white mb-2">Horas Orçadas</label>
                        <input type="text" class="w-full rounded" name="budgeted_hours">
                    </div>
                    <div style="flex: 1;">
                        <label for="" class="block text-white mb-2">Relativa ao setor</label>
{{--                        <input type="text" class="w-full rounded" name="sector_id">--}}
                        <select class="select2">
                            <option value="">SELECIONE O SETOR</option>
                            @foreach($sectors as $sector)
                                <option value="{{$sector->id}}">{{$sector->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </span>

                            <div style="flex: 1;">
                                <label for="" class="block text-white mb-2">Técnico responsável</label>
                                <select class="select2">
                                    <option value="">SELECIONE O TÉCNICO</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div style="flex: 1;">
                                <label for="" class="block text-white mb-2">Sistema</label>
                                <select class="select2">
                                    <option value="">SELECIONE O SISTEMA</option>
                                    @foreach($systems as $system)
                                        <option value="{{$system->id}}">{{$system->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div style="flex: 1;">
                                <label for="" class="block text-white mb-2">Criada em:</label>
                                <input type="date" class="w-full rounded" name="started_at">
                            </div>
                            <div style="flex: 1;">
                                <label for="" class="block text-white mb-2">Status</label>
                                <div class="flex justify-start gap-3 text-white">
                                    <div><input type="radio" name="is_active" value="1" checked> Resolvida</div>
                                    <div><input type="radio" name="is_active" value="0"> Pendente</div>
                                </div>
                            </div>
                        </div>
                    </form>
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

