<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Testes com Alpine</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
{{--        <script src="https://cdn.tailwindcss.com"></script>--}}

    </head>
    <body>

        <div x-data="{open:true}">
            <button type="button" x-on:click="open=!open">Abre/Fecha</button>
            <p x-show="open">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                oribus tenetur totam
            </p>
        </div>

        <div x-data="{
            name:'Felipe',
            toSlug(){
                this.name=this.name.toLowerCase()
            }
        }">
            <input type="text" x-model="name">
            <span x-text="name"></span>
            <button x-on:click="toSlug">Criar slug</button>
        </div>

        <div>

        </div>



    </body>

</html>
