@vite(['resources/css/app.css', 'resources/js/app.js'])

@forelse ($posts as $post)
    <div class="block mb-4 p-5">
        <h2 class="font-black text-x1 mb-2">{{ $post->title }} / / Criado em {{ $post->created_at->format('d/m/Y H:i:s') }}</h2>
        {{ $post->body }}
        <p>
            {{ $post->description }}
        </p>


        <a href="/posts/{{ $post->slug }}" class="mt-4 text-blue-600 hover:underline">Ver post...</a>
        <hr>
    </div>
@empty
    <h3>Nenhum post encontrado!<h3>
@endforelse

{{ $posts->links() }}
