<x-layout>
<div class="h-full flex justify-center items-center">
        <div class=" bg-gray-200 rounded px-6 py-4 shadow">
            <form class="grid grid-cols-2 gap-2" method="POST" action="{{ route('user.store') }}"  enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="col-span-2 flex items-center gap-4">
                    <a href="/login">
                        <x-iconoir-arrow-left/>
                    </a>
                    <h1 class="text-xl">Register</h1>
                </div>
                <div class="col-span-2 flex justify-center flex-col items-center gap-2">    
                    <label for="image">Imagen de perfil:</label>
                    <img id="img-tag" src="" class="cursor-pointer w-24 h-24 rounded-full border border-1 border-gray-300">
                    <input class="bourder border-1 border-gray-300 rounded" hidden type="file" name="image" id="image" class="form-control">
                </div>
                
                <div class="flex flex-col gap-2">
                    <label for="name">Nombre:</label>
                    <input placeholder="Nombre" class="bourder border-1 border-gray-300 rounded" type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="lastname">Apellido:</label>
                    <input placeholder="Apellido" class="bourder border-1 border-gray-300 rounded" type="text" name="lastname" id="lastname" class="form-control" required>
                </div>

                <div class="col-span-2 flex flex-col gap-2">
                    <label for="email">Correo electronico:</label>
                    <input placeholder="Correo electronico" class="bourder border-1 border-gray-300 rounded" type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="password">Contrasena:</label>
                    <input placeholder="Contrasena" class="bourder border-1 border-gray-300 rounded" type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="password_confirmation">Confirmar contrasena:</label>
                    <input placeholder="Confirmar contrasena" class="bourder border-1 border-gray-300 rounded" type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>
                <div class="col-span-2 flex justify-end">
                    <button class="border border-1 rounded border-gray-500 px-2 py-1" type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
