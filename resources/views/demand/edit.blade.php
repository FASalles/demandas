<x-app-layout>
    <x-slot name="header">
        <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar demanda') }}
        </h2>
    </x-slot>
    <div class="bg-gray-800 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-center items-center">
                <div class="bg-gray-700 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">

                    <form action="{{route('demand.update', ['demand' => $demand->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
{{--                        @method('PUT')--}}

                        <span style="display: flex;">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label for="" class="block text-white mb-2">Título</label>
                                    <input type="text" class="w-full rounded" name="title" value="{{ $demand->title }}">
                                </div>

                                <div style="flex: 1;">
                                    <label for="" class="block text-white mb-2">Issue associada</label>
                                    <input type="text" class="w-full rounded" name="attached_issue" value="{{ $demand->attached_issue }}">
                                </div>
                            </span>

                        <div style="flex: 1;">
                            <label for="" class="block text-white mb-2">Resumo</label>
                            <textarea class="w-full rounded" name="body">{{ $demand->body }}</textarea>

                            <span style="display: flex;">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label for="" class="block text-white mb-2">Horas Orçadas</label>
                                    <input type="text" class="w-full rounded" name="budgeted_hours" value="{{ $demand->budgeted_hours }}">
                                </div>

                                <div style="flex: 1;">
                                    <label for="" class="block text-white mb-2">Relativa ao setor</label>
                                    <select class="select2" name="sectors_id" value="{{ $demand->sectors_id }}">
                                        <option value="">SELECIONE O SETOR</option>
                                        @foreach($sectors as $sector)
                                            <option value="{{ $sector->id }}">{{$sector->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                             </span>


                            <div class="flex">
                                <div class="w-1/2">
                                    <label for="" class="block text-white mb-2">Técnico responsável</label>
                                    <select class="select2" name="users_id" value="{{ $demand->users_id }}">
                                        <option value="">SELECIONE O TÉCNICO</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="w-1/2">
                                    <label for="" class="block text-white mb-2">Sistema</label>
                                    <select class="select2" name="system_id" value="{{ $demand->system_id }}">
                                        <option value="">SELECIONE O SISTEMA</option>
                                        @foreach($systems as $system)
                                            <option value="{{ $system->id }}">{{$system->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div style="flex: 1;">
                                    <label for="" class="block text-white mb-2">Criada em:</label>
                                    <input type="date" class="w-full rounded" name="started_at" value="{{ date('Y-m-d') }}">
                                </div>
                                <div style="flex: 1;">
                                    <label for="" class="block text-white mb-2">Status</label>
                                    <div class="flex justify-start gap-3 text-white">
                                        <div><input type="radio" name="is_active" value="1" checked> Resolvida</div>
                                        <div><input type="radio" name="is_active" value="0"> Pendente</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <DIV class="COL-12 text-white my-5">
                                    Imagem Demanda
                                    <hr>
                                </DIV>
                                <div class="col-4">
                                    <img src="{{asset('storage/' . $demand->image)}}" alt="" class="img-fluid">
                                </div>
                                <div class="form-group">
                                    <label for="image">Imagem do Evento</label>
                                    <input type="file" id="image" name="image" class="from-control-file">
                                </div>
                                <div class="col-8">
                                    <div class="my-5 space-y-4 p-4 border rounded shadow">
                                        <label class="block mb-2 font-bold text-white">Carregar uma imagem na demanda</label>
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                            </div>

                            <div class="w-full flex justify-end">
                                <button class="mt-10 px-4 py-2 shadow rounded text-xl text-white text-bold bg-green-700 hover:bg-green-900 transition ease-in-out duration-200">
                                    Editar Demanda
                                </button>
                            </div>



                        </div>
                </div>
            </div>
        </div>


</x-app-layout>

