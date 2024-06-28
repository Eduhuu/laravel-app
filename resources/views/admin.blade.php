<x-layout>
    <div class="w-full flex justify-center">
    <div class="w-[90%]">
        <div class="grid grid-cols-4 gap-2">
            <div>
                <strong>
                    Cantidad de usuarios:
                </strong>
                <p>{{$totalUsers}} </p>
            </div>
            <div class="flex gap-2">
                <div>
                    <strong>
                        Cantidad de publicaciones: 
                    </strong>
                    <p>{{$totalPublications}} </p>
                </div>
            </div>
            <div class="flex gap-2">
                <div>
                    <strong>
                        Cantidad de comentarios:
                    </strong>
                    <p>3</p>
                </div>
            </div>
            <div class="flex gap-2">
                <div>
                    <strong>
                        Usuario con mayor cantidad de publicaciones:
                    </strong>
                    <p>User1</p>
                </div>
            </div>
            <div class="flex gap-2">
                <div>
                    <strong>
                        Usuario con mayor cantidad de comentarios:
                    </strong>
                    <p>User1</p>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="mt-4 w-full flex justify-center">
        <div class="w-[90%] bg-gray-100 rounded px-10 py-8">
            <h2>Usuarios cargados en la aplicacion</h2>
            <table class="w-full bg-white shadow">
                <tr class="border border-1 border-gray-500 rounded text-center">
                    <th class="py-2">Nombre de usuario</th>
                    <th class="py-2">Apellido de usuario</th>
                    <th class="py-2">Correo electrinico</th>
                    <th class="py-2">Acciones</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td class="px-4">
                        <strong>
                            {{$user->name}}
                        </strong>
                    </td>
                    <td class="px-4">
                        <strong>
                            {{$user->lastname}}
                        </strong>
                    </td>
                    <td class="px-4">
                        <strong>
                            {{$user->email}}
                        </strong>
                    </td>
                    <td class="px-4">
                        <div class="flex justify-center gap-2">
                            <form action="{{route("user.destroy", $user)}}" class="flex gap-2 items-center" method="POST">
                                @csrf
                                @method("DELETE")
                                <button>
                                    <x-iconoir-trash />
                                </button>
                            </form>
                            <form action="{{route('users.block', $user)}}" class="flex gap-2 items-center" method="POST">
                                @csrf
                                <input hidden type="text" name="title" id="title">
                                <button>
                                    @if(!$user->blocked)
                                        <x-iconoir-xbox-x />
                                    @endif    
                                    @if($user->blocked)
                                        <x-iconoir-check-circle />
                                    @endif  
                                </button>
                            </form>
                            <a href="{{route('user.edit', $user)}}">
                                    <x-iconoir-edit-pencil />
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
            <h2 class="mt-8">Publicaciones cagadas en la aplicacion</h2>
            <table class="w-full bg-white shadow">
                <tr class="border border-1 border-gray-500 rounded text-center">
                    <th class="py-2">Titulo publicacion</th>
                    <th class="py-2">Contenido</th>
                    <th class="py-2">Cantidad comentarios</th>
                    <th class="py-2">Acciones</th>
                </tr>
                @foreach ($publications as $publication)
                <tr>
                    <td class="px-4">
                        <strong>
                            {{$publication->title}}
                        </strong>
                    </td>
                    <td class="px-4">
                        <strong>
                            {{$publication->content}}
                        </strong>
                    </td>
                    <td class="px-4">
                        <strong>
                            {{$publication->commentCant()}}
                        </strong>
                    </td>
                    <td class="px-4">

                            <div class="flex justify-center gap-2">

                            <form action="{{route("publication.destroy", $publication)}}" class="flex gap-2 items-center" method="POST">
                                @csrf
                                @method("DELETE")
                                <button>
                                    <x-iconoir-trash />
                                </button>
                            </form>
                            <form action="{{route('publication.block', $publication)}}" class="flex gap-2 items-center" method="POST">
                                @csrf
                                <input hidden type="text" name="title" id="title">
                                <button>
                                    @if(!$publication->blocked)
                                        <x-iconoir-xbox-x />
                                    @endif    
                                    @if($publication->blocked)
                                        <x-iconoir-check-circle />
                                    @endif  
                                </button>
                            </form>
                            <a href="{{route('publication.edit', $publication)}}">
                                    <x-iconoir-edit-pencil />
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-layout>