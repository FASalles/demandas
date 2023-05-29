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

                    <form action="{{route('demand.store')}}, {{ route('demand.add') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <span style="display: flex;">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label for="" class="block text-white mb-2">Título</label>
                                    <input type="text" class="w-full rounded" name="title" id="notification_title" value="{{ old('title') }}">
                                </div>

                                <div style="flex: 1;">
                                    <label for="" class="block text-white mb-2">Issue associada</label>
                                    <input type="text" class="w-full rounded" name="attached_issue" value="{{ old('attached_issue') }}">
                                </div>
                            </span>

                        <div style="flex: 1;">
                            <label for="" class="block text-white mb-2">Resumo</label>
                            <textarea class="w-full rounded" name="body" id="notification_body">{{ old('body') }}</textarea>

                            <span style="display: flex;">
                                <div style="flex: 1; margin-right: 10px;">
                                    <label for="" class="block text-white mb-2">Horas Orçadas</label>
                                    <input type="text" class="w-full rounded" name="budgeted_hours" value="{{ old('budgeted_hours') }}">
                                </div>

                                <div style="flex: 1;">
                                    <label for="" class="block text-white mb-2">Relativa ao setor</label>
                                    <select class="select2" name="sectors_id" value="{{ old('demands_id') }}">
                                        <option value="">SELECIONE O SETOR</option>
                                        @foreach($demands as $demand)
                                            <option value="{{ $demand->id }}">{{$demand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                             </span>


                            <div class="flex">
                                <div class="w-1/2">
                                    <label for="" class="block text-white mb-2">Técnico responsável</label>
                                    <select class="select2" name="user_id" id="user_id">
                                    <option value="">SELECIONE O TÉCNICO</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="w-1/2">
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
                                <label for="" class="block text-white mb-2">Status</label>
                                <div class="flex justify-start gap-3 text-white">
                                    <div><input type="radio" name="is_active" value="1" checked> Resolvida</div>
                                    <div><input type="radio" name="is_active" value="0"> Pendente</div>
                                </div>
                            </div>
                        </div>

                        <div class="my-5 space-y-4 p-4 border rounded shadow">
                            <label class="block mb-2 font-bold text-white">Carregar uma imagem na demanda</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="w-full flex justify-end">
                            <button class="mt-10 px-4 py-2 shadow rounded text-xl text-white text-bold bg-green-700 hover:bg-green-900 transition ease-in-out duration-200">
                                Criar Demanda
                            </button>
                        </div>

                            @foreach($demands as $demand)
                                <img src="{{asset('storage/' . $demand->image)}}">
                                {{ $demand->title }}
                            @endforeach

                        <div class="mb-5">
                            <div class="w-1/3">
                                <label class="block">Capa</label>

                                <input type="file" wire:model.defer="image" class="w-full">

{{--                                @error('image')--}}
{{--                                <strong class="block mt-4 text-red-700 font-bold">{{$message}}</strong>--}}
{{--                                @enderror--}}
                            </div>
                            <div class="w-2/3">
                                @if($image)
                                    <img src="{{$cover->temporaryUrl()}}" alt="">
                                @endif
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>

