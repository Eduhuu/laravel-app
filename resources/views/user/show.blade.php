<x-layout>
    <div class="h-full flex justify-center items-center">
        <div class="w-[33vw] bg-gray-200 rounded px-6 py-6 shadow flex flex-col gap-4">
            <div class="flex justify-between">
                <div class="flex gap-2">
                    <a href="/">
                        <x-iconoir-arrow-left/>
                    </a>
                    <h1>Perfil</h1>
                </div>
                @if ($user->id == session('user')->id)
                    <a href="{{ route('user.edit', $user) }}">Editar usuario</a>
                @endif
            </div>
            <div class="flex flex-col gap-0 items-center">
                <label for="">Foto de perfil</label>
                <img class="h-28 w-28 rounded-full" src="/{{$user->img}}" alt="">
            </div>
            <div class="grid grid-cols-2 gap-2">  
                <div class="flex flex-col gap-1">
                    <label for="">Nombre</label>
                    <p class="bg-white rounded px-3 py-2 border border-1 border-gray-200">
                        {{$user->name}}
                    </p>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="">Apellido</label>
                    <p class="bg-white rounded px-3 py-2 border border-1 border-gray-200">
                    {{$user->lastname}}
                </p>
                </div>
                <div class="col-span-2 flex flex-col gap-1">
                    <label for="">Correo electronico</label>
                    <p class=" bg-white rounded px-3 py-2 border border-1 border-gray-200">
                    {{$user->email}}
                </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
