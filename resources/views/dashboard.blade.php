<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid place-items-center min-h-screen">
        <div class="p-4 max-w-5xl grid gap-4 sm:grid-cols-2 sm:p-8 md:grid-cols-4">
            <h1 class="text-4xl font-bold sm:col-span-2 sm:grid sm:gap-4
            sm:grid-cols-2 sm:grid-cols-2 md:col-span-3 md:text-5xl md:grid-cols-3">
                <spam class="md:col-span-2">Sistema de Gerenciamento de Demandas</spam>
            </h1>
            <p class="sm:row-start-2 sm:col-start-2 sm:self-center
            md:col-start-1 md:col-span-2 md:pr-12 md:text-lg">
            Lorem ipsum dolor sit amet. Atque enim magni neque vitae? Beatae illum laboriosam necessitatibus placeat sit ullam. Eos facere laudantium nobis quisquam.
            </p>
            <a href="/demands/create" class="w-32 h-32 aspect-w-1 aspect-h-1 bg-blue-500 sm:w-60 sm:h-60  text-white font-black text-center text-3xl flex items-center h-full shadow-lg hover:scale-105 transition transform duration-300">CRIAR DEMANDA</a>
            <a href="/demands" class="w-32 h-32 aspect-w-1 aspect-h-1 bg-blue-500 sm:w-60 sm:h-60  text-white font-black text-center text-3xl flex items-center h-full shadow-lg hover:scale-105 transition transform duration-300">VISUALIZAR DEMANDAS</a>
            <a href="/sector" class="w-32 h-32 aspect-w-1 aspect-h-1 bg-pink-500 sm:w-60 sm:h-60  text-white font-black text-center text-3xl flex items-center h-full shadow-lg hover:scale-105 transition transform duration-300">CRIAR UM SETOR</a>
            <a href="sector/create" class="w-32 h-32 aspect-w-1 aspect-h-1 bg-blue-500 sm:w-60 sm:h-60  text-white font-black text-center text-3xl flex items-center h-full shadow-lg hover:scale-105 transition transform duration-300">VISUALISAR SETOR</a>
            <button class="w-32 h-32 aspect-w-1 aspect-h-1 bg-pink-500 sm:w-60 sm:h-60  text-white font-black text-center text-3xl flex items-center h-full shadow-lg hover:scale-105 transition transform duration-300">CRIAR DEMANDA</button>
            <button class="w-32 h-32 aspect-w-1 aspect-h-1 bg-pink-500 sm:w-60 sm:h-60  text-white font-black text-center text-3xl flex items-center h-full shadow-lg hover:scale-105 transition transform duration-300">CRIAR DEMANDA</button>
            <button class="w-32 h-32 aspect-w-1 aspect-h-1 bg-blue-500 sm:w-60 sm:h-60  text-white font-black text-center text-3xl flex items-center h-full shadow-lg hover:scale-105 transition transform duration-300">CRIAR DEMANDA</button>
            <button class="w-32 h-32 aspect-w-1 aspect-h-1 bg-pink-500 sm:w-60 sm:h-60  text-white font-black text-center text-3xl flex items-center h-full shadow-lg hover:scale-105 transition transform duration-300">CRIAR DEMANDA</button>
            <p class="self-center md:text-lg md:col-span-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur eos inventore molestiae necessitatibus neque praesentium quisquam quos repellat. A asperiores eos incidunt minima mollitia perferendis praesentium reiciendis, repellat repudiandae rerum!
            </p>
        </div>
    </div>
</x-app-layout>
