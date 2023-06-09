<div>


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

                            <span style="display: flex;">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label for="" class="block text-white mb-2 m-4">Título</label>
                                    <input type="text" class="w-full rounded" name="title" value="{{ old('title') }}">
                                </div>

                                <div style="flex: 1;">
                                    <label for="" class="block text-white mb-2 m-4">Issue associada</label>
                                    <input type="text" class="w-full rounded" name="attached_issue" value="{{ old('attached_issue') }}">
                                </div>
                            </span>

                            <div style="flex: 1;">
                                <label for="" class="block text-white mb-2 m-4">Resumo</label>
                                <textarea class="w-full rounded" name="body">{{ old('body') }}</textarea>

                                <span style="display: flex;">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label for="" class="block text-white mb-2 m-4">Horas Orçadas</label>
                                    <input type="text" class="w-full rounded" name="budgeted_hours" value="{{ old('budgeted_hours') }}">
                                </div>

                                <div style="flex: 1;">
                                    <label for="" class="block text-white mb-2 m-4">Relativa ao setor</label>
                                    <select class="select2" name="sectors_id" value="{{ old('sectors_id') }}">
                                        <option value="">SELECIONE O SETOR</option>
                                        @foreach($sectors as $sector)
                                            <option value="{{ $sector->id }}">{{$sector->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                             </span>

                                <div class="flex m-4">
                                    <div class="w-1/2">
                                        <label for="" class="block text-white mb-2">Técnico responsável</label>
                                        <select class="select2" name="users_id" value="{{ old('users_id') }}">
                                            <option value="">SELECIONE O TÉCNICO</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="w-1/2" m-4>
                                        <label for="" class="block text-white mb-2">Sistema</label>
                                        <select class="select2" name="system_id" value="{{ old('system_id') }}">
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
                                        <label for="" class="block text-white mb-2 m-4">Status</label>
                                        <div class="flex justify-start gap-3 text-white">
                                            <div><input type="radio" name="is_active" value="1" checked> Resolvida</div>
                                            <div><input type="radio" name="is_active" value="0"> Pendente</div>
                                        </div>
                                    </div>
                                </div>

{{--                                        @foreach($demands as $demand)--}}
{{--                                            <img src="{{asset('storage/' . $demand->image)}}">--}}
{{--                                            {{ $demand->title }}--}}
{{--                                        @endforeach--}}

                                <div class="form-group m-4">
                                    <div class="w-1/3">
                                        <label class="block text-white">Carregar uma imagem</label>
                                        <input type="file" name="image" wire:model.defer="image" class="form-control
                                        @error('image') is-invalid @enderror">

                                        @error('image')
                                        <strong class="block mt-4 text-red-700 font-bold">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="w-2/3">
                                        @if($image)
                                            <img src="{{$image->temporaryUrl()}}" class="sm:max-w-sm">
                                        @endif
                                    </div>
                                </div>

                                <div class="w-full flex justify-end">
                                    <button class="mt-10 px-4 py-2 shadow rounded text-xl text-white text-bold bg-green-700 hover:bg-green-900 transition ease-in-out duration-200">
                                        Criar Demanda
                                    </button>
                                </div>

                            </div>
                    </div>
                </div>
            </div>





</div>
